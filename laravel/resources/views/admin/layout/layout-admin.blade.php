<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.head') 
</head>

<body>
    @include('templates.header') 

    @include('admin.include.sidebar')

    @yield('content') 

    @include('templates.footer')
</body>

</html>