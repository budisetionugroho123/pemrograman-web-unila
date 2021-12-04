@extends('layouts.template')
@section('login','active')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h1 class="text-center mt-3">Registrasi</h1>

            </div>
        </div>
        <div class="row justify-content-center"  style="margin-bottom: 200px">
            <div class="col-lg-4 col-11 border">

                    <form method="POST" action="/register">
                        @csrf

                        <div class="form-group mt-3">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukkan nama" name="name" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email" name="email" value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan password" name="password">
                            @error('password')
                            <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi">Confirm password</label>
                            <input type="password" class="form-control" id="konfirmasi" placeholder="Masukkan konfirmasi password" name="konfirmasi_password">
                            @error('konfirmasi_password')
                            <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat" value="{{old('alamat')}}">
                            @error('alamat')
                            <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="ttl">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="ttl"  name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                            @error('tanggal_lahir')
                            <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row justify-content-center text-center mb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mb-3 text-center">
                        <div class="col">
                            <a href="/login" class="text-decoration-none">Kembali ke login</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
