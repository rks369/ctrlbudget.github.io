<?php
$db=mysqli_connect("localhost","root","","budget") or die(mysqli_error($db));
if(!isset($_SESSION)){
      session_start();
    }
?>