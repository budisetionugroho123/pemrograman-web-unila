@extends('layouts.template')
@section('beranda','active')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-6 col-11" style="margin-top: 100px">
                 @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif

                 @if (session()->has('status_gagal'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('status_gagal')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif
                <div class="card">
                    {{-- <p>{{ $daftar }}</p> --}}
                    <div class="card-header">
                        {{ $data['nama_kegiatan'] }}
                        @if (session()->has('key'))
                            <span class="text-info">(Anda sudah terdaftar)</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ date('d F Y',strtotime($data['tanggal'])) }}</h5>
                        <p class="card-text">{{ date('H:i',strtotime($data['mulai'])) }} - {{ date('H:i',strtotime($data['berakhir'])) }} WIB</p>
                        <p class="card-text">{{ $data['deskripsi'] }}</p>
                        @if (auth()->user()->role=="admin")

                        <p class="card-text">Jumlah Anggota : {{ $daftar }} </p>

                        @endif

                        <a href="/beranda" class="btn btn-primary"><i class="fas fa-step-backward"></i></a>
                        @if (auth()->user()->role=="admin")
                        <a href="/hapus-kegiatan-bersama/{{ $data['id'] }}" class="btn btn-danger"  onclick="return confirm('Hapus?')"><i class="fas fa-trash-alt"></i></a>
                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#form"><i class="fas fa-edit"></i></a>
                        @else
                        <form action="/cancel-kegiatan" method="post" class="d-inline-block">
                            @csrf
                            <input type="hidden" value="{{ $data['id'] }}" name="id">
                            <button type="submit" class="btn btn-danger" name="cancel"><i class="fas fa-sign-in-alt"></i> Batal</button>
                        </form>
                        <form action="/join-kegiatan" method="post" class="d-inline-block">
                            @csrf
                            <input type="hidden" value="{{ $data['id'] }}" name="id">
                            <button type="submit" class="btn btn-primary" name="join"><i class="fas fa-sign-in-alt"></i> Gabung</button>
                        </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- modal --}}
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="/ubah-kegiatan-bersama" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{old('nama_kegiatan',$data['nama_kegiatan'])}}" required>
                @error('nama_kegiatan')
                         <span class="text-danger font-italic">{{$message}}</span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control" required>{{old('deskripsi',$data['deskripsi'])}}</textarea>
                 @error('deskripsi')
                         <span class="text-danger font-italic">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{old('tanggal',$data['tanggal'])}}" required>
                 @error('tanggal')
                         <span class="text-danger font-italic">{{$message}}</span>
                    @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="mulai">Mulai</label>
                <input type="time" class="form-control" id="mulai"  name="mulai" value="{{old('mulai',$data['mulai'])}}" required>
                 @error('mulai')
                         <span class="text-danger font-italic">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                <label for="berakhir">Selesai</label>
                <input type="time" class="form-control" id="berakhir" placeholder="Password" name="berakhir" value="{{old('berakhir',$data['berakhir'])}}" required>
                 @error('berakhir')
                         <span class="text-danger font-italic">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
              <button type="submit" class="btn btn-primary">ubah</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
