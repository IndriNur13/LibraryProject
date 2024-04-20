<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Data Kategori</h3> <br>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penerbit</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datapenerbit as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nama_penerbit}}</td>
                <td>{{$item->status}}</td>
                <td><a href="/penerbit/edit/{{$item->id}}">Edit</td>
              </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
