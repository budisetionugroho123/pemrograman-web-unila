<?php

use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\groupController;
use App\Http\Controllers\JoinsController;
use App\Http\Controllers\MemberController;
use App\Models\Category;
use App\Models\Todolist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Group;
use App\Models\Joins;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home.home', [
        'title' => 'Home'
    ]);
})->name('login')->middleware('guest');
Route::get('/beranda', function () {
    if (auth()->user()->role == "admin") {
        $data = Group::all();
        return view('home.dashboard_admin', [
            'title' => 'beranda',
            'data' => $data
        ]);
    } else {
        $data = Group::all();
        return view('home.dashboard', [
            'title' => 'beranda',
            'data' => $data
        ]);
    }
})->middleware('auth');
Route::get('/login', function () {
    return view('auth.login', [
        'title' => 'Halaman Login'
    ]);
})->middleware('guest');
Route::get('/register', function () {
    return view('auth.register', [
        'title' => 'Halaman Registrasi'
    ]);
});
Route::post('register', [AuthController::class, 'register']);
Route::get('/aktivitas', function () {
    $data = Todolist::where('user_id', auth()->user()->id)->paginate(5);
    return view('aktivitas.aktivitas', [
        'title' => 'Aktivitas',
        'activities' => $data,
        'categories' => $data
    ]);
})->middleware('is_member');
Route::get('/add_aktivitas', function () {

    return view('aktivitas.tambah_aktivitas', [
        'title' => 'Tambah Aktivitas'
    ]);
})->middleware('is_member');
Route::get('/aktivitas/{kategori}', function ($kategori) {

    $data = Todolist::where('kategori', $kategori)
        ->where('user_id', auth()->user()->id)
        ->paginate();
    $category = Todolist::where('user_id', auth()->user()->id)->get();
    return view('aktivitas.aktivitas', [
        'title' => 'aktivitas',
        'activities' => $data,
        'categories' => $category
    ]);
});
Route::get('/ganti-password', function () {
    return view('auth.ganti-password', [
        'title' => 'Ganti Password'
    ]);
});
Route::put('/ganti-password', [AuthController::class, 'ganti_password'])->middleware('auth');
Route::post('/add_aktivitas', [AktivitasController::class, 'add_aktivitas'])->middleware('is_member');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/hapus-aktivitas/{id}', [AktivitasController::class, 'hapus_aktivitas'])->middleware('auth');
Route::get('/ubah-aktivitas/{id}', function ($id) {
    $data = Todolist::where('id', $id)->first();
    return view('aktivitas.ubah_aktivitas', [
        'aktivitas' => $data,
        'title' => 'Form Ubah'
    ]);
})->middleware('is_member');
Route::post('/ubah-aktivitas', [AktivitasController::class, 'ubah_aktivitas'])->middleware('is_member');

Route::get('/daftar-anggota', function () {
    $anggota = User::where('role', 'member')->paginate(5);
    if (request('keyword')) {
        $anggota = User::where('role', 'member')
            ->where('name', 'like', '%' . request('keyword') . '%')
            ->paginate();
    }
    return view('member.daftar_anggota', [
        'title' => 'Anggota',
        'users' => $anggota
    ]);
})->middleware('is_admin');
Route::get('/hapus-anggota/{id}', function ($id) {
    if ($id == 1) {
        abort(403);
    }
    User::where('id', $id)->delete();
    return back()->with('status', 'Anggota berhasil di hapus.');
});
Route::get('/out', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('auth');
Route::get('/biodata', function () {
    $data = User::where('id', auth()->user()->id)->first();
    return view('member.biodata', [
        'title' => 'Biodata',
        'data' => $data
    ]);
});
Route::post('/update-biodata', [MemberController::class, 'update_biodata'])->middleware('auth');


// kegiatan bersama
Route::post('/tambah-kegiatan-bersama', [groupController::class, 'tambah_kegiatan'])->middleware('is_admin');
Route::get('/detail-kegiatan-bersama/{id}', function ($id) {
    $data = Group::where('id', $id)->first();
    $jumlah = Joins::where('id_group', $id)->get();
    return view('aktivitas_bersama.detail', [
        'title' => 'Detail Kegiatan',
        'data' => $data,
        'daftar' => $jumlah->count()
    ]);
});
Route::put('/ubah-kegiatan-bersama', [groupController::class, 'ubah_kegiatan'])->middleware('is_admin');
Route::get('/hapus-kegiatan-bersama/{id}', function ($id) {
    Group::where('id', $id)->delete();
    return redirect('/beranda')->with('status', 'Kegiatan berhasil dihapus');
});
Route::post('/join-kegiatan', [JoinsController::class, 'join_kegiatan'])->middleware('is_member');
Route::post('/cancel-kegiatan', [JoinsController::class, 'cancel_kegiatan'])->middleware('is_member');
// Route::get('/detail-peserta/{id}', [JoinsController::class, 'detail_peserta'])->middleware('is_admin');
