<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
  

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
       
  
        <h1 class="team">MEET OUR TEAM</h1>
        <style>
            .team{
            text-shadow: horizontal-offset vertical-offset blur color;
            text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
            font-family: 'Raleway',sans-serif;
            font-weight: 800; 
            line-height: 72px; 
           margin-top:10%;
            text-align: center;

            }
        </style>
    
      </div>
    </div>
    <div class="parallax"><img src="{{asset('images/background1.jpg')}}" alt="Unsplashed background img 1" style="width:2%;"></div>
  </div>




    <style>
        #center {
    display: block;
    
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
    </style>
    <div class="container services">
        <div class="row">

            <div class="col s12 m6 l3 center-align">
                <br>
              <div class="card">
                  <div class="card-content">
                  <i><img src="{{asset('images/background1.jpg')}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;" id="center"></i>	
                      <h5>Samantha Siao</h5>
                      <p>We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                      <p>
                  </div>
              </div>  
            </div>

             <div class="col s12 m6 l3 center-align">
                 <br>
              <div class="card">
                  <div class="card-content">
                  <i><img src="{{asset('images/background2.jpg')}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;" id="center"></i>	
                      <h5>Ronnie</h5>
                      <p>We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                      <p>
                  </div>
              </div>  
            </div>

             <div class="col s12 m6 l3 center-align">
                 <br>
              <div class="card">
                  <div class="card-content">
                  <i><img src="{{asset('images/background3.jpg')}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;" id="center"></i>	
                      <h5>Samantha Siao</h5>
                      <p>We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                      <p>
                  </div>
              </div>  
            </div>

             <div class="col s12 m6 l3 center-align">
                 <br>
              <div class="card">
                  <div class="card-content">
                  <i><img src="{{asset('images/background3.jpg')}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;" id="center"></i>	
                      <h5>Mark Gil Nieto</h5>
                      <p>We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                      <p>
                  </div>
              </div>  
            </div>

        </div>
    </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
      </div>
    </div>
    <div class="parallax"><img src="{{asset('images/background2.jpg')}}" alt="Unsplashed background img 2" style="width:2%;"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>PPSI Integrated Software</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
      </div>
    </div>
    <div class="parallax"><img src="{{asset('images/background3.jpg')}}" alt="Unsplashed background img 3" style=width:2%;></div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">PPS Inc.</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
       
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
