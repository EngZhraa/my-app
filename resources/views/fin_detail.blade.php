<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقاصيل المشروع</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalart2.min.css') }}">
    <script data-require="bootstrap@3.3.2" data-semver="3.3.2" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
    @livewireStyles
</head>
@include('layouts.navigation')
<body>

    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-6 offset-md-2">
                <h4>تفاصيل المشروع</h4>
                {{ $Fdet }}

            </div>
        </div>  
    </div>
   
    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    @livewireScripts
  
</body>
</html>
