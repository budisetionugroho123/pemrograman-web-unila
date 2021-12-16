<?php

namespace App\Http\Controllers;

use App\Models\Joins;
use Illuminate\Http\Request;

class JoinsController extends Controller
{
    public function join_kegiatan(Request $req)
    {

        // dd($req->input());
        if (isset($_POST['join'])) {
            if (Joins::where('id_group', $req->id)->where('id_user', auth()->user()->id)->first()) {
                return back()->with('status_gagal', 'Anda tidak bisa mendaftar lagi');
            }
            Joins::create([
                'id_group' => $req->id,
                'id_user' => auth()->user()->id
            ]);
            $req->session()->put('key', 'value');
            return back()->with('status', 'Anda berhasil gabung');
        }
    }
    public function cancel_kegiatan(Request $req)
    {
        if (isset($_POST['cancel'])) {
            if (!Joins::where('id_group', $req->id)->where('id_user', auth()->user()->id)->first()) {
                return back()->with('status_gagal', 'Anda belum terdaftar');
            }
            Joins::where('id_group', $req->id)->where('id_user', auth()->user()->id)->delete();
            $req->session()->forget('key', 'value');
            return back()->with('status', 'Anda tidak terdaftar lagi sebagai peserta');
        }
    }
}
