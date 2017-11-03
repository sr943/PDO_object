<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
 $obj = new main();
 
 
class main {
  public function __construct(){
 

$servername = "sql1.njit.edu";
$username = "sr943";
$password = "SuVvKQn4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=sr943", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h3>Connected successfully </h3><br>";    //conection message
    echo "<hr>";
    $sel = new select();   //creating an object
    $sel->fetch($conn);    // calling function
   


     }
catch(PDOException $e)
    {
    echo "<h3>Connection failed:</h3> <br>" . $e->getMessage();
    }
 
}

}





class select{
  public function fetch($conn){

    $stmt = $conn->prepare("SELECT * FROM accounts where id < 6");    //fetching data from DB
    $stmt->execute();



      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);       // using associative array  
      $co = new count();
      $co->counting($result);



echo  "<table style='border: 1px solid black'>";
      foreach ($result as $row) {
    
      echo  "<tr>";

      foreach ($row as $column) {
      echo "<td style='border: 1px solid black'>$column </td>";
      
   }
  echo  "</tr>";
}    
echo  "</table>";

    
  

$conn = null;
}
}

class count{
  public function counting($result){


echo "<h3>Number of rows are:</h3>";
print_r(count($result));
echo"<hr>";

  }


}


?>