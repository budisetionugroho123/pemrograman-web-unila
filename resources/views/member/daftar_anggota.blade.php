@extends('layouts.template')
@section('daftar-anggota','active')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2  class="text-center mt-3 mb-3">Daftar Anggota</h2>
                <form class="form-inline mb-3" action='/daftar-anggota'>
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Search" name="keyword">
                    {{-- <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button> --}}
                </form>
                @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif
                @if ($users->count())

                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                                $i=1;
                                @endphp
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row" class="text-center">@php
                                echo $i++;
                                @endphp</th>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['alamat']}}</td>
                            <td class="text-center">{{ date('d F Y',strtotime($user['tanggal_lahir'])) }}</td>
                            <td class="text-center"><a class="btn btn-danger" href="/hapus-anggota/{{$user['id']}}" onclick="return confirm('yakin?')"><i class="fas fa-trash-alt "></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="float-right">
                    {{$users->links()}}
                </span>
                @else
                    <p class="text-center">Member tidak ada</p>
                @endif
            </div>
        </div>
    </div>

@endsection
