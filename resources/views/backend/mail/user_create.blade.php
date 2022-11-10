<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Banned</title>
</head>

<body>
    <h2 style="color: red">Congratulations!!!</h2>
    <p> <b>{{ $user_name }}</b> admin created your account</p>
    <p>Email: <b> {{ $user_email }}</b></p>
    <p>Password: <b> {{ $user_password }}</b></p>
    <p>Role: <b> {{ $user_role }}</b></p>
</body>

</html>
