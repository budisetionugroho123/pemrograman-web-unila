@extends('layouts.template')
@section('beranda','active')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 mt-5 ">
                <h4 class="text-center mb-4">Daftar Kegiatan</h4>
                <a href="" class="btn btn-primary mb-3 d-block text-center" data-toggle="modal" data-target="#form"><i class="fas fa-plus"></i> Tambah Kegiatan</a>
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


<!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/tambah-kegiatan-bersama">
            @csrf
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Mulai</label>
                <input type="time" class="form-control" id="inputEmail4"  name="mulai">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Selesai</label>
                <input type="time" class="form-control" id="inputPassword4" placeholder="Password" name="berakhir">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
