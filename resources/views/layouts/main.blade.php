
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link  rel="icon" href="{{asset('/storage/files/system/icon1.png')}}" type=”image/x-icon”>

</head>
<body>
@include('includes.header')
@yield('content')
</body>
</html>

<style>
    .box-shadow{
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125)
    }
    a,a:hover{
        text-decoration: none;
        color:black;
    }
    .container{
        padding:15px;
    }
    .hide {
        display: none;
    }
</style>
