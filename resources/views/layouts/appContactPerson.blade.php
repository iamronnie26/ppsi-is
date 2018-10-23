<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="icon" type="image/png" href="{{URL::to('PPSILOGO.png')}}"/>
    <link rel="icon" type="images/png" href="{{asset('images/PPSILOGO.png')}}"/>
    <link rel = "stylesheet"href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script type="text/javascript" src="{{asset('ajax.googleapis.com\ajax\libs\jquery\3.2.1\jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

   
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navigation">
        <div class="nav-wrapper">
            <a class="brand-logo left" href="{{route('poc.dashboard')}}">PPSI Integrated Software | Contact Person Dashboard</a>
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
        @include('components.navAdmin')
    </div>
    <div class="col s12 m12 l9 mainpanel">
        @yield('content')
    </div>
</div>
</body>
</html>
