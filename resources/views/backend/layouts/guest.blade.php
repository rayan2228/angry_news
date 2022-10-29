<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('backend') }}/assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/css/bootstrap-extended.css" rel="stylesheet" />
    {{-- <link href="{{ asset('backend') }}/assets/css/style.css" rel="stylesheet" /> --}}
    @vite(['public/backend/assets/css/style.css'])
    <link href="{{ asset('backend') }}/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('backend') }}/assets/css/pace.min.css" rel="stylesheet" />


    <title>News 24 - Dashboard</title>
</head>

<body>

    @yield('content')
    <!--plugins-->
    <script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pace.min.js"></script>


</body>

</html>
