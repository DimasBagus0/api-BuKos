<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="dashboard-content">
        <div class="sidebar">
            <h1>Admin Dashboard</h1>
            <ul>
                {{-- <li><a href="{{ route('dashboard') }}">Dashboard</a></li> --}}
                <li><a href="{{ route('users') }}">All Users</a></li>
                <li><a href="{{ route('unapprovedProducts') }}">Unapproved Products</a></li>
                <li><a href="{{ route('approvedProducts') }}">Approved Products</a></li>
                <li><a href="{{ route('allProducts') }}">All Products</a></li>
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
