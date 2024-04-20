@extends('layout.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Penerbit Buku</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Input Data Penerbit Buku
            </h6>
            <br>
            <a href="/lihatpenerbit" class="btn btn-warning pull-right"> <span class="fa fa-undo"></span> Kembali</a>
        </div>
        <div class="card-body">
            <form action="/penerbit" method="POST">
                @csrf
                <div class="form form-group">
                </div>
            <span>Nama Penerbit</span>
            <input type="text" name="nama_penerbit" id="" class="form form-control"  value="{{old ('nama_penerbit')}}">
            @error('nama_penerbit')
                <small>{{$message}}</small>
            @enderror
            <span>Keterangan</span>
            <input type="text" name="keterangan" id=""  class="form form-control" value="{{old('keterangan')}}">
            @error('keterangan')
                <small>{{$message}}</small>
            @enderror
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
@endsection
