<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PPSI Integrated Software</title>

  <link rel="icon" type="image/png" href="PPSILOGO.png"/>

  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    
  <style type="text/css">
    h1{font-size:23px;}
    .pull-left h2{margin-top:0;font-size:20px;}
  </style>

  <style>
body {
  margin: 0;
  font-family: Arial;
}

.top-container {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
}

.header {
  padding: 10px 16px;
  background: #555;
  color: #f1f1f1;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}
</style>
</head>
<body>

<div class="container">
@yield('content')
</div>
@extends('layouts.footer')
</div>
</body>
</html>
