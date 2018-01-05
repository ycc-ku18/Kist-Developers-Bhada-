<?php
$servername = SERVER;
$dbname = DBNAME;


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", DBUSER, DBPASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "sucess";
    }
catch(PDOException $e)
    {
    echo "Error In Connection". $e->getMessage();
    }

?>