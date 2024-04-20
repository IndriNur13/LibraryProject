<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/ceklogin" method="POST">
        @csrf
        <h3>Username</h3> <br>
        <input type="text" name="email" id=""> <br>
        <h3>password</h3> <br>
        <input type="password" name="password" id=""> <br>
        <button type="submit">login</button> <br>
        <small>Jika belum mempunyai account silahkan click<a href="/register">disini</a></small>
    </form>
</body>
</html>
