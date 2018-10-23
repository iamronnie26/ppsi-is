<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PPSI Integrated Software</title>

     <link rel="icon" type="image/png" href="{{URL::to('PPSILOGO.png')}}"/>
    <link rel="icon" type="images/png" href="{{asset('images/PPSILOGO.png')}}"/>

    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/datatable.css">
    <link rel="stylesheet" type="text/css" href="js/datatable.js">

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

      #backnav a:hover
      {
          background-color: #e2686d;
          padding: 0px 0px;
      }
      #maintnav a:hover
      {
          background-color: #e2686d;
          margin: 0px 0px;
          font-weight: bold;
          font-size: 14pt;
      }
     #maintnav, #backnav
      {
          background-color: rgba(255,255,255,0.2);
          padding: 0px 0px;
      }
    </style>
  </head>
<body>

<ul id="slide-out" class="side-nav fixed" style="width:300px; background-color: #f5f5f5; background-size: 1500px; background-repeat: no-repeat;">
        <li><div class="userView">
            <li style="background-color: #3299BB;"><a href="" class="brand-logo">&nbsp; <font color="white" size="3"><strong> &nbsp; &nbsp; &nbsp;  PPSI Integrated Software </strong></font></a></li>
            <li><div class="divider" style = "width: 100%;"></div></li>
            <center style = "margin-top: 15px; margin-bottom: 15px;"><img src="{{URL::to('/images/sam.jpg')}}" 
                         alt=""
                         class="circle responsive-img" 
                         style="width:250px;height:250px"></center>
            <li style = "background-color:#3299bb;"><a style = "" href=""><span class="black-text name"><strong><i 
                                              class="material-icons"><font color = "white">face</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>  Samantha Siao</b></font></strong></span></a></li>
        </div></li>
        <li id = "backnav" style="background-color: #f5f5f5;"><a class="waves-effect" 
                                               href="/dashboard"><font 
                                               color="black"><i 
                                              class="material-icons">&nbsp; &nbsp;<b>dashboard</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Backup Database</b></font></a></li><br>
        <font style = "padding-top: 5px; color: #bdbdbd; font-size: 15pt;">&nbsp;&nbsp;&nbsp;<b>Maintenance</b></font></a>
        <li><div class = "divider" style = "margin-top: 12px;"></div></li>


       
        <!-- INSERT NAVS HERE -->

        <li id = "maintnav" style="background-color: #f5f5f5;"><a class="waves-effect" 
                                               href="#"><font 
                                               color="black"><i 
                                              class="material-icons">&nbsp; &nbsp;<b>person_add</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add Applicant</b></font></a></li>
        <li id = "maintnav" style="background-color: #f5f5f5;"><a class="waves-effect" 
                                               href="#"><font 
                                               color="black"><i 
                                              class="material-icons">&nbsp; &nbsp;<b>person_add</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add User</b></font></a></li>
        <li id = "maintnav" style="background-color: #f5f5f5;"><a class="waves-effect" 
                                               href="#"><font 
                                               color="black"><i 
                                              class="material-icons">&nbsp; &nbsp;<b>date_range</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add Year</b></font></a></li>
        <li id = "maintnav" style="background-color: #f5f5f5;"><a class="waves-effect" 
                                               href="#"><font 
                                               color="black"><i 
                                              class="material-icons">&nbsp; &nbsp;<b>contacts</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add Contact Person</b></font></a></li>
        <li id = "maintnav" style="background-color: #f5f5f5;"><a class="waves-effect" 
                                               href="/siteEndorse"><font 
                                               color="black"><i 
                                              class="material-icons">&nbsp; &nbsp;<b>add_location</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add Site Endorsed</b></font></a></li>
        <li id = "maintnav" style="background-color: #f5f5f5;"><a class="waves-effect" 
                                               href="/department"><font 
                                               color="black"><i 
                                              class="material-icons">&nbsp; &nbsp;<b>group_add</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add Department</b></font></a></li> 
        <li id = "maintnav" style="background-color: #f5f5f5;"><a class="waves-effect" 
                                               href="#"><font 
                                               color="black"><i 
                                              class="material-icons">&nbsp; &nbsp;<b>person_pin_circle</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add Designation</b></font></a></li> 
        <li id = "maintnav" style="background-color: #f5f5f5;"><a class="waves-effect" 
                                               href="#"><font 
                                               color="black"><i 
                                              class="material-icons">&nbsp; &nbsp;<b>people_outline</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add Business Partner</b></font></a></li>
                </b>      
              </ul>
            </div>
          </li>
        </ul>
    </ul>
@yield('content')
</div>
</body>
</html>
