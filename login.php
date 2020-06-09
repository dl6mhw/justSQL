<?php
#error_reporting(E_ALL);
#ini_set("display_errors", 1);
session_start();
if (isset($_POST['nutz']) and isset($_POST['zitrone'])) {
  $nutz=strip_tags($_POST['nutz']);
  $zitrone=strip_tags($_POST['zitrone']);
  $conn = new mysqli("localhost", $nutz, $zitrone, $nutz);

  // Check connection
  if ($conn->connect_error) {
    $fehler="Login nicht erfolgreich" . $conn->connect_error;
  } else {
  session_start();
  $_SESSION['nutz']=$nutz;
  $_SESSION['zitrone']=$zitrone;

print '  <!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="0; index.php">  ';
exit;
}}	
?><!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="Michael Höding ... Bootstrap: Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Just SQL</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
	.container{
    max-width:2600px;
    margin:0 auto;/*make it centered*/
}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: .5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
  </head>
   <body>
    <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Einfaches SQL Interface zum Üben (2020).</p>
        </div>
      </div>
    </div>
  </div>

  <div class="navbar navbar-dark bg-warning shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
	  <img alt="" class="img-responsive" src="thb_logo.gif" width="40px">
        <h2>   .... Just SQL@FBW</h2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main role="main">

  <div class="container">
    <div class="row">
      <div class="col-2">
      </div>
      <div class="col-7">
        <h2>Login</h2>   
<?php


print "<div>
<h4>$fehler</h4>
<form  method=POST>
Account:<br>
<input name='nutz'><br>
Passwort:<br>
<input type=password name='zitrone'>
<p><input type=submit value=Anmelden></p>
</form>
</div>
";
?>

      </div>
      <div class="col-3">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
