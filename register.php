<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<?php
	
	if(isset($_POST["register"])){
	
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
 $username=htmlspecialchars($_POST['username']);
 $password=htmlspecialchars($_POST['password']);
 $query=$con->query("SELECT * FROM users WHERE login='".$username."'");
  $numrows=mysqli_num_rows($query);
if($numrows==0)
   {
$sql="INSERT INTO users(login,password) VALUES('$username', '$password')";
  $result=$con->query($sql);
 if($result){
	$message = "Account Successfully Created";
			} else {$message = "Failed to insert data information!";}
		} else {$message = "That username already exists! Please try another one!";}
	} else {$message = "All fields are required!";}
}
?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

<div class="container mregister">
<div id="login">
 <h1>Registration</h1>
<form action="register.php" id="registerform" method="post"name="registerform">
<p><label for="user_pass">Nik name<br>
<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
<p><label for="user_pass">password<br>
<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
	  <p class="regtext">You are already registered? <a href= "index.php">Enter your nik name</a>!</p>
 </form>
</div>
</div>
<?php include("includes/footer.php"); ?>
