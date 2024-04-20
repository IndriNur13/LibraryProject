@extends('layout.master')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Buku</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Edit Data Buku
            </h6>
            <br>
            <a href="/lihatdatabuku" class="btn btn-warning pull-right"><span class="fa fa-undo"></span> Kembali</a>
        </div>
        <div class="card-body">
            <form action="/ubahbuku/{{$databuku->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form form-group"></div>
                <span>Judul Buku</span>
                <input type="text" name="judul_buku" id="" class="form form-control" value="{{$databuku->judul_buku}}">
                @error('judul_buku')
                    <small>{{$message}}</small>
                @enderror
                <span>Picture</span>
                <input type="file" name="photo" class="form form-control" >
                <span>Penulis</span>
                <input type="text" name="penulis" id="" class="form form-control" value="{{$databuku->penulis}}">
                @error('penulis')
                    <small>{{$message}}</small>
                @enderror
                <span>Penerbit</span><br>
                <select name="penerbit_id" id="penerbit_id" class="form form-control">
                    <option value="">Silahkan pilih penerbit</option>
                    @foreach ($penerbit as $item)
                    <option value="{{$item->id}}">{{$item->nama_penerbit}}</option>
                    @endforeach
                </select>
                <small>Tahun Terbit</small>
                <input type="text" name="tahun_terbit" id="" class="form form-control" value="{{$databuku->tahun_terbit}}">
                @error('tahun_terbit')
                    <small>{{$message}}</small>
                @enderror
                <small>Kategori</small> <br>
                <select name="kategori_id" id="kategori_id" class="form form-control">
                    <option value="">Silahkan pilih kategori</option>
                    @foreach ( $kategori as $item)
                        <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                    @endforeach
                </select> <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
