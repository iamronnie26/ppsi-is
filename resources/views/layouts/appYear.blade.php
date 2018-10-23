<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PPSI Integrated Software</title>

  <link rel="icon" type="image/png" href="PPSILOGO.png"/>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="css/footer.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

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

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  
    <a class="navbar-brand" href="#">PPSI Integrated Software</a>


  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Database</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="/applicants">View Applicant</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Maintenance
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/posts">Add User</a>
        <a class="dropdown-item" href="/years">Add Year</a>
        <a class="dropdown-item" href="/contactPersons">Add Contact Person</a>
        <a class="dropdown-item" href="/siteEndorses">Add Site Endorsed</a>
        <a class="dropdown-item" href="/department">Add Department</a>
        <a class="dropdown-item" href="/designation">Add Designation</a>
        <a class="dropdown-item" href="/businessPartner">Add Business Partner</a>
      </div>
    </li>
  </ul>
</nav>
<br><br/>
<div class="container">
  <div class="card" style="max-width: 100rem;">
  <h3 class="card-header" style="background-color:#004B8D;text-align: center;"><font color="white">Year Maintenance</font></h3>
<div class="card-body">
<h4 class="card-title"></h4>
<p class="card-text">@yield('content')</p>
</div>
</div>
</div>
</div>


@extends('layouts.footer')
</div>
</body>
</html>
