<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/ubahbuku/{{$databuku->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <small>Judul Buku</small> <br>
        <input type="text" name="judul_buku" id="" value="{{$databuku->judul_buku}}"> <br>
        @error('judul_buku')
            <small>{{$message}}</small> <br>
        @enderror
        <small>Picture</small>
        <input type="file" name="photo"><br>
        <small>Penulis</small> <br>
        <input type="text" name="penulis" id="" value="{{$databuku->penulis}}"> <br>
        @error('penulis')
            <small>{{$message}}</small> <br>
        @enderror
        <small>Penerbit</small><br>
        <select name="penerbit_id" id="penerbit_id">
            <option value="">Silahkan pilih penerbit</option>
            @foreach ($penerbit as $item)
            <option value="{{$item->id}}">{{$item->nama_penerbit}}</option>
            @endforeach
        </select> <br>
        <small>Tahun Terbit</small> <br>
        <input type="text" name="tahun_terbit" id="" value="{{$databuku->tahun_terbit}}"> <br>
        @error('tahun_terbit')
            <small>{{$message}}</small> <br>
        @enderror
        <small>Kategori</small> <br>
        <select name="kategori_id" id="kategori_id">
            <option value="">Silahkan pilih kategori</option>
            @foreach ( $kategori as $item)
                <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
            @endforeach
        </select> <br>
        <button type="submit">Simpan</button>

    </form>
</body>
</html>
