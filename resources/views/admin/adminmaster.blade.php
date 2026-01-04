<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
</head>

<body id="page-top">
    @include('admin.sidebar')
    @yield('users')
</body>
@include('admin.adminscript')

</html>
