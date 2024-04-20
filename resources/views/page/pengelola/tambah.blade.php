@extends('layout.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengelola</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Input Data Pengelola
            </h6><br>
        <a href="/indexpengelola" class="btn btn-warning pull-right"> <span class="fa fa-undo"></span> Kembali</a>
        </div>
        <div class="card-body">
            <form action="/pengelola" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form form-group">
                </div>
                <small>Nama Lengkap</small>
                <input type="text" name="name" id="" class="form form-control" value="{{old('name')}}">
                @error('name')
                    <small>{{$message}}</small>
                @enderror
                <small>Email</small>
                <input type="text" name="email" id="" class="form form-control" value="{{old('email')}}">
                @error('email')
                    <small>{{$message}}</small>
                @enderror
                <small>Password</small>
                <input type="password" name="password" id="" class="form form-control">
                @error('password')
                    <small>{{$message}}</small>
                @enderror
                <small>Jenis Kelamin</small> <br>
                <input type="radio" name="jenis_kelamin" id="" value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'checked' : ''}}> laki-laki
                <input type="radio" name="jenis_kelamin" id="" value="perempuan" {{ old('jenis_kelamin') == 'perempuan'? 'checked' : ''}}> perempuan
                @error('jenis_kelamin')
                    <small>{{$message}}</small>
                @enderror
                <input type="file" name="photos"> <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
@endsection
