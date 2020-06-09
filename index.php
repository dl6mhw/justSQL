<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
if (isset($_GET['logout'])) unset($_SESSION['nutz']);
if (!isset($_SESSION['nutz']) or !isset($_SESSION['zitrone'])) {
print '  <!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="0; login.php">  ';
exit;
}	

$conn = new mysqli("localhost", $_SESSION['nutz'], $_SESSION['zitrone'], $_SESSION['nutz']);

// Check connection
if ($conn->connect_error) {
print '  <!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="0; login.php">  ';
exit;
}	


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
          <p class="text-muted">Einfaches SQL Interface zum Üben (2020 - M. Höding) <br>Unbeding Passwort ändern mit: <pre>SET PASSWORD = PASSWORD('123dabei')</pre></p>
        </div>
      </div>
    </div>
  </div>

  <div class="navbar navbar-dark bg-warning shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
	  <img id="thblogo" alt="" class="img-responsive" src="thb_logo.gif" style="padding-right:10px" width="50px">
        <h2 class="text-primary">   .... Just SQL@FBW</h2>
      </a>
      <?php
	     if (isset($_SESSION['nutz'])) print "Angemeldet als: ".$_SESSION['nutz']."<a href=index.php?logout=1>(Abmelden)</a>	";
		 
	  ?>
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
        <h2>Tabellen</h2>   
<?php


if (isset($_GET['delhist'])) $_SESSION['hist'] = array();
if (!isset($_SESSION['hist'])) {
$_SESSION['hist'] = array();
} 



$result = $conn->query('show tables');
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_row()) {
	  $s=$row[0];;	
      print "<div class='text-primary' onclick=\"describe('$s')\"><u>$s</u></div><p>";
	}
} else {
    echo "0 Tabelle";
}


print "<form action='donot.php'>
	<button type=submit class=\"btn btn-primary btn-sm\">Do not Press</button>
	</form>";


?>
      </div>
      <div class="col-7">
        <h2>SQL</h2>   
<?php

if (isset($_GET['sql'])) $sql=strip_tags($_GET['sql']);
else $sql = "SELECT * FROM WEINE";

print "<div>
<form>
Groß- Kleinschreibung beachten! (z.B. WEINE und ERZEUGER) 
<p><textarea name=sql  id='SQL' cols=80 rows=5>$sql</textarea></p>
<input type=submit>
</form>
</div>
";



$hist=$_SESSION['hist'];
$hist[]=$sql;
$_SESSION['hist']=$hist;

/*
if (preg_match('/INSERT/',strtoupper($sql))) {print "INSERT nicht erlaubt<br>";exit;}
if (preg_match('/DELETE/',strtoupper($sql))) {print "DELETE nicht erlaubt<br>";exit;}
if (preg_match('/DROP/',strtoupper($sql))) {print "DROP nicht erlaubt<br>";exit;}
if (preg_match('/UPDATE/',strtoupper($sql))) {print "UPDATE nicht erlaubt<br>";exit;}
if (preg_match('/CREATE/',strtoupper($sql))) {print "CREATE nicht erlaubt<br>";exit;}
if (preg_match('/ALTER/',strtoupper($sql))) {print "ALTER nicht erlaubt<br>";exit;}
*/
print "<pre>$sql</pre><br>";


if (!$result=$conn->query($sql)) {
  printf("Fehler: %s\n", $conn->error);
}
else {
	
if (preg_match('/DESCRIBE/',strtoupper($sql)) or preg_match('/SELECT/',strtoupper($sql))or preg_match('/SHOW/',strtoupper($sql))) {	
 print "<table border=1>";
 if ($result->num_rows > 0) {
    // output data of each row
	$l=0;
    while($row = $result->fetch_assoc()) {
		$l++;
		print "<tr>";
        #echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		if ($l%10==1) { 
	    	foreach ($row as $n=>$f) {
			 print "<th>".utf8_encode($n)."</th>";
		    }	 
		print "</tr><tr>";
		}		
		foreach ($row as $n=>$f) {
			 print "<td>".utf8_encode($f)."</td>";
		}	 
		print "</tr>\n";
    }
 } else {echo "0 results";}
 print "</table>\n";
 }
 }

$conn->close();



?>

      </div>
      <div class="col-3">
        <h2>History</h2>
<a href="index.php?delhist=1">Löschen</a>		
<?php		
$hist=$_SESSION['hist'] ;
$hist=array_reverse($hist);
$hz=1;
foreach($hist as $s) {
	print "<div class='border border-primary' style=\"padding:2px\">
<button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"change('$hz')\">copy</button><span id=h$hz>$s</span></div>";
$hz++;
}

?>
     </div>
    </div>
  </div>

</main>

<script>
 
//Javascript
setTimeout(function(){ rotate() }, 60000);
grad=0;
function rotate(){
	var img=document.getElementById('thblogo');
	grad=grad+6;
	img.setAttribute('style','transform:rotate('+grad+'deg)');
    if (grad<360) setTimeout(function(){ rotate() }, 10);
	else {grad=0;setTimeout(function(){ rotate() }, 5000);}
}

function change(cmd){
   neu=$('#h'+cmd).text();
   $("#SQL").val(neu); 
 };
 function describe(tab){
   $("#SQL").val('describe '+tab); 
 };
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
