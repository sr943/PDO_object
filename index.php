<?php 
$servername = "sql1.njit.edu";
$username = "sr943";
$password = "SuVvKQn4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=sr943", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h3>Connected successfully </h3><br>"; 

   
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }




?>