@extends('layouts.template')
@section('biodata','active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5" style="width: 24rem;margin-left: auto;margin-right: auto">
                @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
            <div class="card-body">
                <h5 class="card-title">{{$data['name']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$data['email']}}</h6>
                <p class="card-text">{{$data['alamat']}}</p>
                <p class="card-text">{{ date('d F Y',strtotime($data['tanggal_lahir'])) }}</p>
                <a href="#" class="card-link" data-toggle="modal" data-target="#exampleModal">ubah</a>
            </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update-biodata" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{old('nama',$data['name'])}}" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{old('email',$data['email'])}}" >
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat',$data['alamat'])}}">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir',$data['tanggal_lahir'])}}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
