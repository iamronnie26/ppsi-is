<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PPSI Integrated Software</title>
    <link rel="icon" type="image/png" href="{{URL::to('PPSILOGO.png')}}"/>
    <link rel="icon" type="images/png" href="{{asset('images/PPSILOGO.png')}}"/>

    <link rel="stylesheet" type="text/css" href="css/footer.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"> -->
    <link rel="icon" type="images/png" href="{{('images/PPSILOGO.png')}}"/>

    <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
      
    <script>
         $(document).ready(function() {
            $('select').material_select();
         });
    </script>

    <style type="text/css">
       .material-icons, .icon-text {
      vertical-align: middle;
    }

      #dashnav a:hover
      {
          background-color: rgba(255,255,255,0.2);
          padding: 0px 0px;
      }
      #intnav a:hover
      {
          background-color: rgba(255,255,255,0.2);
          padding: 0px 0px;
      }
      #appnav a:hover
      {
          background-color: rgba(255,255,255,0.2);
          padding: 0px 0px;
      }
    </style>
  </head>
<body>

<ul id="slide-out" class="side-nav fixed" style="width:300px; background-color: #F0F0F0; background-size: 1500px; background-repeat: no-repeat;">
        <li><div class="userView">
            <li style="background-color:#3299BB"><a href="" class="brand-logo">&nbsp; <font color="white" size="3"><strong>  PPSI Integrated Software </strong></font></a></li>
           <!--  <center><img src="{{URL::to('/images/logo.png')}}" 
                         alt="" 
                         class="circle responsive-img" 
                         style="width:250px;height:250px"></center> --><br/>
            <li style="background-color:#3299BB;" ><a href=""><span class="black-text name"><strong><i 
                                              class="material-icons"><font color = "white">face</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Domenic Jerome Uguil</font></strong></span></a></li>
        </div></li>
        <li><div class="divider"></div></li>
      <div id = "fornavs">  
        <li id = "appnav" style="background-color: rgba(255,255,255,0.7); "><a class="waves-effect" 
                                               href="/recept"><font 
                                               color="black"><i 
                                               class="material-icons">person_add</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b> Showups </b></font></a></li>

        <li id = "intnav" style="background-color: rgba(255,255,255,0.7) "><a class="waves-effect" 
                                              href="/interview"><font 
                                              color="black"><i 
                                              class="material-icons">person_add</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>  Interview</b></font></a></li>

        </div>
    </ul>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            @yield('content')
        </div>
      </div>
    </div>
</body>
</html>
