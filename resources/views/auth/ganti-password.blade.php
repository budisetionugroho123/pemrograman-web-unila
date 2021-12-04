@extends('layouts.template')
@section('ganti_password','active')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h2 class="text-center mt-3 mb-3">Ganti Password</h2>
            </div>
        </div>
        @if (session()->has('status'))
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

            </div>
        </div>
        @endif
        @if (session()->has('failed'))
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('failed')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

            </div>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-4 col-11 border">
                    <form method="POST" action="/ganti-password">
                        @method('put')
                        @csrf
                        <div class="form-group mt-3">
                            <label for="password_sekarang">Password sekarang</label>
                            <input type="password" class="form-control" id="password_sekarang" name="password_sekarang">
                             @error('password_sekarang')
                            <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New password</label>
                            <input type="password" class="form-control" id="newPassword" name="password">
                             @error('password')
                            <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="konfirmasiPassword">konfirmasi password</label>
                            <input type="password" class="form-control" id="konfirmasiPassword" name="konfirmasi_password">
                             @error('konfirmasi_password')
                            <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row justify-content-center text-center mb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Ganti Password</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @endsection
