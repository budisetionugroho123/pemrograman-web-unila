@extends('layouts.template')
@section('aktivitas','active')
@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-bottom: 120px">
        <div class="col-lg-4 col-11 mt-5 border border-3">
            <h2 class="text-center mt-3 mb-3">Tambah Aktivitas</h2>

            <form action="/add_aktivitas" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="form-group">
                    <label for="hari mt-3" class="d-block">Hari</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="hari">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </Select>
                    @error('hari')
                         <span class="text-danger font-italic">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{old('kategori')}}">
                     @error('kategori')
                         <span class="text-danger font-italic">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namaKegiatan">Nama Aktivitas</label>
                    <input type="text" class="form-control" id="namaKegiatan" name="nama_kegiatan">
                     @error('nama_kegiatan')
                         <span class="text-danger font-italic">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jamAktivitas">Jam Aktivitas</label>
                    <input type="time" class="form-control" id="jamAktivitas" name="jam_kegiatan">
                     @error('nama_aktivitas')
                         <span class="text-danger font-italic">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-3">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection
