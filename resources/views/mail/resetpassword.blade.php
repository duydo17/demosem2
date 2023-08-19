<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@php
    $token = session('tokenreset');
@endphp
    <h1>Quên Mật Khẩu</h1>
    <h3>Mã OTP của bạn là: {{$token}}</h3>
    

</body>
</html>