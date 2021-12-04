@extends('layouts.template')
@section('login','active')
@section('content')
    <div class="container mt-3">
        <h1 class="text-center mt-5">Login</h1>
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
                    <form method="POST" action="/login">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <div class="row justify-content-center text-center mb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">login</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mb-3 text-center">
                        <div class="col">
                            <span>Belum punya akun?</span><a href="/register" class="text-decoration-none"> daftar disini</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
