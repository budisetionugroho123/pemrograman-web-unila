<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    public function add_aktivitas(Request $request){

        $validate_data=$request->validate([
            'kategori' => 'required',
            'nama_kegiatan' => 'required',
            'jam_kegiatan' =>'required'
        ],['kategori.required'=>'Kategri harus diisi.']);
        $validate_data['user_id']= $request->user_id;
        $validate_data['hari']=$request->hari;
        Todolist::create($validate_data);
        return redirect('/aktivitas')->with('status','Aktivitas berhasil ditambah!');

    }
    public function hapus_aktivitas($id){
        Todolist::where('id',$id)->delete();
        return back()->with('status','Aktivitas berhasil dihapus!');
    }
    public function ubah_aktivitas(Request $request){
        // dd($request->input());
        $validate_data=$request->validate([
            'kategori' => 'required',
            'nama_kegiatan' => 'required',
            'jam_kegiatan' =>'required',
            'hari'=>'required',
            'user_id'=>'required'
        ]);
        Todolist::where('id', $request->id)->update($validate_data);
        return redirect('/aktivitas')->with('status','Aktivitas berhasil diubah!');
    }
}
