<?php 
if ( $_SERVER["REQUEST_METHOD"] == "GET" ) {

include("includes/connection.php"); 
   $sql = "SELECT * FROM users WHERE online = 1";
   $result = $con->query($sql); 
   echo "<ul>";
      while ($row = $result->fetch_assoc()) {
        echo "<li><font color='red' style='margin-left: 10px;'>".$row['login']."</font></li>";
      } 
      echo "</ul>";
//$con->close();

} else { echo "ooops"; }
 ?>
