<?php
session_start();
session_destroy();
header('location:trafficlogin.php');
?>