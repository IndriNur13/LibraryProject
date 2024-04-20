@extends('layout.master')
@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengelola Buku</h1>
    <p class="mb-4"></p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables Pengelola Buku
            </h6>
            <br>
            <a href="/tambahpengelola" class="btn btn-primary pull-right">Tambah Pengelola Buku</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pengelola</th>
                            <th>Gambar</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Pengelola</th>
                            <th>Gambar</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($datapengelola as $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->name}}</td>
                          <td><img src="/imagepengelola/{{$item->pictures}}" alt="" width="50px"></td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->jenis_kelamin}}</td>
                          <td>  <a href="/pengelola/edit/{{$item->id}}">Edit
                                <a href="/pengelola/hapus/{{$item->id}}">Hapus</a>
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
