<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script type="text/javascript" src="{{asset('ajax.googleapis.com\ajax\libs\jquery\3.2.1\jquery.min.js')}}"></script>

    <link rel="icon" type="image/png" href="{{URL::to('PPSILOGO.png')}}"/>
    <link rel="icon" type="images/png" href="{{asset('images/PPSILOGO.png')}}"/>
    <link rel="stylesheet" media="all" href="https://printjs-4de6.kxcdn.com/print.min.css"/>
    <script type="text/javascript" src="{{asset('ajax.googleapis.com\ajax\libs\jquery\3.2.1\jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="icon" type="images/png" href="{{('images/PPSILOGO.png')}}"/>

    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "stylesheet" href = "{{asset('css/materialize.min.css')}}" media="all">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Quicksand:500,700');
body {
  font-family: Quicksand;
  background: linear-gradient(45deg,#EBF0F5,#EBF0F5);
  height:100vh;
}
.calendar-box {
  box-shadow: 3px 3px 10px #888888;
  width:150px;
  height:150px;
  border-radius: 20px;
  background: white;
  position:absolute;
  left:50%;
  top:155%;
  transform: translateY(-50%) translateX(-50%);
}
.calendar-header {
  color:white;
  text-align: center;
  background: red;
  height:75px;
  border-top-left-radius: 20px 20px;
  border-top-right-radius: 20px 20px;
}
.calendar-month {
  padding:5%;
  font-size:35px;
  text-transform:uppercase;
  letter-spacing: 2px;
}
.calendar-body {
  margin:5%;
  text-align: center;
  color:black;
}
.calendar-day {
  letter-spacing: 2px;
  font-size:20px;
}
.calendar-day-text {
  font-size: 25px;
}
    </style>
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navigation">
        <div class="nav-wrapper">
            <a class="brand-logo left" href="{{route('recept.index')}}">PPSI Integrated Software | Reception Dashboard</a>
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
        @include('components.navReceptionist')
    </div>
    <div class="col s12 m12 l9 mainpanel">
        @yield('content')
    </div>
</div>
</body>
</html>