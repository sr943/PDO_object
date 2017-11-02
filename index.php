<?php 

ini_set('display_errors', 'On');
error_reporting(E_ALL);
$servername = "sql1.njit.edu";
$username = "sr943";
$password = "SuVvKQn4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=sr943", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h3>Connected successfully </h3><br>";  //conection message
    $stmt = $conn->prepare("SELECT * FROM accounts where id < 6"); 
    $stmt->execute();

      $result = $stmt->fetchAll(); 
      
      echo "<table style='border: 1px solid black'>";
foreach ($result as $row) {
   echo "<tr>";
   foreach ($row as $column) {
      echo "<td style='border: 1px solid black'>$column</td>";
   }
   echo "</tr>";
}    
echo "</table>";
    
    }
catch(PDOException $e)
    {
    echo "<h3>Connection failed:</h3> <br>" . $e->getMessage();
    }

$conn = null;


?>