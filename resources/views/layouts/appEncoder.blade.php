<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script type="text/javascript" src="{{asset('ajax.googleapis.com\ajax\libs\jquery\3.2.1\jquery.min.js')}}"></script>

    <link rel="icon" type="image/png" href="{{URL::to('PPSILOGO.png')}}"/>
    <link rel="icon" type="images/png" href="{{asset('images/PPSILOGO.png')}}"/>
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">

    <script type="text/javascript" src="{{asset('ajax.googleapis.com\ajax\libs\jquery\3.2.1\jquery.min.js')}}"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->

    
    <title>@yield('title')</title>
    <style type="text/css">
        tr{
            white-space: nowrap!important;
        }
    </style>
</head>
<body>
    <nav class="navigation">
        <div class="nav-wrapper">
            <a class="brand-logo left" href="{{route('poc.dashboard')}}">PPSI Integrated Software | Encoder Dashboard</a>
            <a class="brand-logo right" id="menu" href="#"><i class="material-icons">menu</i></a>            
        </div>
    </nav>
    <script type="text/javascript">
        $(function(){
            $('#menu').click(function(){
                $('#sidenav').toggle();
            });
        });
    </script>
   <div class="row app">
    <div id="sidenav" class="col s12 sidepanel l3">
        @include('components.navEncoder')
    </div>
    <div class="loader"></div>
    <div class="col s12 m12 l9 mainpanel">
        @yield('content')
    </div>
</div> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('select').formSelect();
    });
</script>
</body>
</html>