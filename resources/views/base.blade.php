<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas @yield('pageTitle')</title>
    <link rel="icon" href="{{ url('/') }}/public/img/icono.ico">

    {{-- <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/bootstrap.min.css"> --}}

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/css/fixedHeader.dataTables.min.css">
    
    	
</head>
<body>

    

    <div class="container-fluid">

        @include('menu')

        @yield('content')
        
    </div>

    <script type="text/javascript" src="{{ url('/') }}/public/js/jquery-3.4.1.min.js" ></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/bootstrap.bundle.min.js" ></script>
    
    <script type="text/javascript" src="{{ url('/') }}/public/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/jszip.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/vfs_fonts.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/public/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/dataTables.select.min.js"></script>
    
    <script type="text/javascript" src="{{ url('/') }}/public/js/dataTables.fixedHeader.min.js"></script>
    
	<script type="text/javascript" src="{{ url('/') }}/public/js/main.js"></script>

</body>
</html>