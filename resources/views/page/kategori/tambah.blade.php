@extends('layout.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kategori Buku</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Input Data Kategori Buku
            </h6>
            <br>
            <a href="/indexkategori" class="btn btn-warning pull-right"> <span class="fa fa-undo"></span> Kembali</a>
        </div>
        <div class="card-body">
            <form action="/kategori" method="POST" >
                @csrf
                <div class="form form-group">
                </div>
            <span>Nama Kategori</span>
            <input type="text" name="nama_kategori" id="" class="form form-control"  value="{{old ('nama_kategori')}}">
            @error('nama_kategori')
                <small>{{$message}}</small>
            @enderror
            <span>Keterangan</span>
            <input type="text" name="keterangan" id=""  class="form form-control" value="{{old('keterangan')}}">
            @error('keterangan')
                <small>{{$message}}</small>
            @enderror
            @if (auth()->user()->role=="pengelola")
            <button type="submit" class="btn btn-primary">Simpan</button>
            @endif
        </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
@endsection
