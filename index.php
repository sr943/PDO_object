<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
 $obj = new main();

 class globals
        {
            
            public static function all($html)

            {
              echo "$html"; 
            }


          }
 
 
class main {
  public function __construct(){
 

$servername = "sql1.njit.edu";
$username = "sr943";
$password = "SuVvKQn4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=sr943", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $html="";
    $html.= "<h3>Connected successfully </h3><hr>";    //conection message
    globals :: all($html);
    $sel = new select();   //creating an object
    $sel->fetch($conn);    // calling function
    


     }
catch(PDOException $e)
    {
    $html.= "<h3>Connection failed:</h3> <br>" . $e->getMessage();
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

$html="";
        
        $html.="<h3>IDs less then 6 from accounts table are: </h3><br>";

        $html.="<table style='border: 1px solid black'>";          
      foreach ($result as $row) {
    
      $html.="<tr>";

      foreach ($row as $column) {
      $html.="<td style='border: 1px solid black'>$column </td>";
      
   }
  $html.="</tr>";
}    
$html.="</table>";

globals :: all($html);

    
  $conn = null;
}
}

class count{
  public function counting($result){

$count=count($result);
$html="";


$html.= "<h3>Number of rows are:</h3>";
$html.= "<b>$count</b>";                      //counting rows
$html.="<hr>";
globals :: all($html);

  }


}


?>