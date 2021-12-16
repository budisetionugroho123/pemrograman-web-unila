<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class groupController extends Controller
{
    //
    function tambah_kegiatan(Request $req)
    {
        $validateData = $req->validate([
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'berakhir' => 'required'
        ]);
        Group::create($validateData);
        return back()->with('status', 'Aktivitas berhasil ditambah');
    }
    function ubah_kegiatan(Request $req)
    {

        $validateData = $req->validate([
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'berakhir' => 'required'
        ]);
        Group::where('id', $req->id)->update($validateData);
        return back()->with('status', 'Aktivitas berhasil diubah');
    }
}
