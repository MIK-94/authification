<?php 
if ( $_SERVER["REQUEST_METHOD"] == "GET" ) {
$i = 0; 
include("includes/connection.php"); 
   $sql = "SELECT * FROM lobby";
   $result = $con->query($sql); 
      while ($row = $result->fetch_assoc()) {
      	$i = $row['id_lobby']; // для того что бы пользоватеь мог получить id группы
        echo "<p><input name='lobbys_radio' type='radio' value='$i'>".$row['name_lobby']."</p><br>";
      } 
//$con->close();

} else { echo "ooops"; }
 ?>
