<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PPSI Integrated Software</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("images/bg1.jpg");
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: right top;
                margin-right: 200px;
                background-attachment: fixed;

                /*background-color: #fff;*/
                color: #636b6f;
                font-family: 'Segoe Bold', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

                            html {
                font-family: "Nunito";
                }

                h1, h2, h3, h4, h5, h6 {
                font-family: "Raleway";
                }

                .card-title {
                font-weight: bolder;
                }

                .background-image {
                background:url("https://static.pexels.com/photos/30732/pexels-photo-30732.jpg");
                background-position: center;
                background-size: cover;
                display: block;
                left: 0;
                position: fixed;
                right: 0;
                z-index: 1;
                height: 100%;
                }

                .title h3 {
                margin: 0;
                padding: 40px 0;
                position: relative;
                z-index: 2;
                }

                .card {
                top: 40px;
                position: relative;
                z-index: 2;
                }

        </style>
    </head>
    <body>


    <!-- Modal Trigger -->
    <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                    <a href="{{ url('/login') }}">Home</a>
                    @else
    <a class="waves-effect waves-light btn blue darken-1 modal-trigger" href="#demo-modal"><font color="white">Login</font></a>
                    @endif
                </div>
            @endif

    <!-- Modal Structure -->
    <div id="demo-modal" class="modal">
    <div class="modal-content">
        <div class="panel-body">
                    <br/>
                    <div class="card-content">
                    <h4 class="card-title center-align">Please Login with your credentials</h4><br/>
                    </div>
                    
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                         <div class="row">
                            <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>

                            <input type="text" id="username" class="validate" name="username" value="{{ old('username') }}" required autofocus/>

                            <label for="username">Username</label>
                            </div>
                        </div>
                    </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="row">
                            <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>

                            <input type="password" id="password"  name="password" class="validate" required/>

                            <label for="email">Password</label>
                            </div>
                        </div>
                    </div>
                      

                                <div class="row center-align">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Login
                                    <i class="material-icons right">send</i>
                                    </button>
                                    <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-red btn red lighten-1">Close</a>
                                </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                         <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Invalid Details</h4>
      @if ($errors)
         {{$errors->first()}}
    @endif
    </div>
    <div class="modal-footer">
      <a href="javascript:void(0);" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>
        
        
        <div class="content">
                <div class="title m-b-md">
                    PPSI Integrated Software
                </div> 

                <div class="links">
                <a href="team">About the programmer and PPSI Integrated Software </a>
                </div>
            </div>
        </div>
        
        <script>
        $(document).ready(function(){
            $('.modal').modal();
            @if(count($errors) > 0)
            $("#modal1").modal("open");
    @endif
            
        })
        </script>
    </body>
</html>
