<?php
  include 'config/call.php';
  session_start();
  if(!isset($_SESSION['id']))
    header('location:trafficlogin.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" >

  <div class="container-fluid" >
    <div class="navbar-header"  >
      <a class="navbar-brand" href="#">ADMIN</a>
    </div>
    <!-- <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li align="right"><a href="#">Page 3</a></li>
    </ul> -->

   <ul class="nav navbar-nav navbar-right">
          <li class="dropdown" id="menuLogin">

            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><span class="glyphicon glyphicon-user"></span><?php echo  $_SESSION['username'] ?></a>
            <div class="dropdown-menu">
            <a href="trafficlogout.php"><span class="glyphicon glyphicon-user"></span>logout</a>
            </div>
          </li>
        </ul>
  </div>
</nav>