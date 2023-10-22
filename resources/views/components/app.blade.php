<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <title>ارسال کننده ایمیل</title>
</head>
<body class="bg-light">
@if(session('success'))
<div class="col-md-4 p-4 position-absolute z-3 message">
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
</div>
@endif
    {{$slot}}

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>

</body>
</html>
