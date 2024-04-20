<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Data Buku</h3>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $databuku as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->judul_buku}}</td>
                <td><img src="/imagebuku/{{$item->pictures}}" alt="" width="50px"></td>
                <td>{{$item->penulis}}</td>
                <td>{{$item->penerbit->nama_penerbit}}</td>
                <td>{{$item->tahun_terbit}}</td>
                <td>{{$item->kategori->nama_kategori}}</td>
                <td>{{$item->status}}</td>
                <td><a href="/buku/edit/{{$item->id}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
