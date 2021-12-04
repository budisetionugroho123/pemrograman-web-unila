@extends('layouts.template')
@section('beranda','active')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mt-3 text-center">Selamat datang {{auth()->user()->name}}</h2>

            </div>
        </div>
    </div>
@endsection
