@extends('layouts.template')
@section('beranda','active')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 mt-5 ">
                <h4 class="text-center mb-4">Daftar Kegiatan Yang Dapat Diikuti</h4>
                @if ($data->count())
                @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
                <ul class="list-group">
                    @foreach ($data as $d)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{  $d['nama_kegiatan'] }}
                            <span class="badge badge-primary badge-pill"><a style="text-decoration: none" href="/detail-kegiatan-bersama/{{ $d['id'] }}">Detail</a></span>
                        </li>
                    @endforeach
                </ul>
                @else
                    <p class="text-center text-danger">Data tidak ada</p>
                @endif
            </div>
        </div>
    </div>
@endsection
