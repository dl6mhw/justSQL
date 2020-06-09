<?php
#error_reporting(E_ALL);
#ini_set("display_errors", 1);

session_start();
$conn = new mysqli("localhost", "xxx", "xxx", "xxx");
$nutz=strip_tags($_SESSION['nutz']);
$result = $conn->query("insert into donot(wer) values('$nutz')");

print '  <!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="0; index.php">  ';
exit;
