@extends('layouts.template')
@section('aktivitas','active')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2 class="text-center mt-3">Daftar Aktivitas</h2>
        </div>
    </div>
    <div class="row text-center text-table">
        <div class="col">
           <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                kategori
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/aktivitas">semua</a>
                @foreach ($categories as $category)
                    <a class="dropdown-item" href="/aktivitas/{{$category['kategori']}}">{{$category['kategori']}}</a>
                @endforeach
            </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12 ">
            <div class="row text-center mt-3">
                <div class="col">
                    <a href="/add_aktivitas" class="btn btn-primary mb-3 text-table"><i class="fas fa-plus"></i> Tambah daftar aktivitas</a>

                </div>
            </div>
            @if ($activities->count())
            @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <table class="table table-bordered text-table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">hari</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aktivitas</th>
                        <th scope="col">Jam Aktivitas</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                      @php
                        $i=1
                        @endphp
                    @foreach ($activities as $aktivitas)

                    <tr>
                        <th scope="row">@php
                            echo $i++
                        @endphp</th>
                        <td>{{$aktivitas['hari']}}</td>
                        <td>{{$aktivitas['kategori']}}</td>
                        <td>{{$aktivitas['nama_kegiatan']}}</td>
                        <td class="text-center">{{$aktivitas['jam_kegiatan']}} WIB</td>
                        <td class="text-center"><a href="/ubah-aktivitas/{{$aktivitas['id']}}" class="text-success"><i class="fas fa-edit"></i></a> | <a href="/hapus-aktivitas/{{$aktivitas['id']}}" class="text-danger" onclick="return confirm('yakin?')"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="float-right">
                    {{$activities->links()}}
                </span>
            @else
            <p class="text-center">Aktivitas tidak ditemukan</p>
            @endif
        </div>
    </div>
</div>
@endsection
