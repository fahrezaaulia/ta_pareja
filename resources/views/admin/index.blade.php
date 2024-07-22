<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Hajatan</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .dashboard-link:hover {
            background-color: #926537;
            color: white
        }

        .dashboard-link.active {
            background-color: #926537;
            color: white;
        }

        .btn-nav:focus {
            background-color: #D9AD81;
        }
    </style>
</head>

<body style="background-color: #EEDDCC">
    @include('admin.layout.navbar')
    @yield('content')
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/animejs"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
