<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function update_biodata(Request $req)
    {
        $validateData = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'tanggal_lahir' => 'required'
        ]);
        User::where('id', $req->id)->update($validateData);
        return back()->with('status', 'Data berhasil diubah');
    }
}
