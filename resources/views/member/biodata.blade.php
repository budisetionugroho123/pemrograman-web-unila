@extends('layouts.template')
@section('biodata','active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5" style="width: 18rem;margin-left: auto;margin-right: auto">
            <div class="card-body">
                <h5 class="card-title">{{$data['name']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$data['email']}}</h6>
                <p class="card-text">{{$data['alamat']}}</p>
                <p class="card-text">{{$data['tanggal_lahir']}}</p>
                <a href="#" class="card-link">ubah</a>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
