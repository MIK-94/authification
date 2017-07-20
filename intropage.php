<?php //здесь проблема переадресации
session_start();
if(!isset($_SESSION["session_username"])):
header("location:index.php");
else:
?> 
	
<?php include("includes/header.php"); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style type="text/css">
.button{
	border: solid 1px #da7c0c;
	background: #f78d1d;
	background: -webkit-gradient(linear, left top, leftbottom, from(#faa51a), to(#f47a20));
	background: -moz-linear-gradient(top,  #faa51a, #f47a20);
  	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
   color: #fff;
	padding: 7px 12px;
	-webkit-border-radius:4px;
	moz-border-radius:4px;
 border-radius:4px;
	cursor: pointer;
	width: 133px;
	}
	#welcome{
		width: 100%;
		margin-top: 0;
	}
	.users{
		position: absolute;
		left: 400px;
		width: 400px;
		height: 600px;
		border: 1px solid #777;
		background: #fff;

	}
	.lobby{
		position: absolute;
		left: 900px;
		width: 400px;
		height: 600px;
		border: 1px solid #777;
		background: #fff;
	}
</style>
<div id="welcome">
<h2>Wellcome, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="logout.php">Exit</a> from system</p>
</div>
<div class="users">LIst of users online:
<div id="users"></div></div>
<script type="text/javascript">
 function show_users() {
	$.ajax({
		type: "GET",
		url: "https://mechanikus.000webhostapp.com/users.php",
           success: function(html){
           $("#users").html(html);
		}
	});
}
$(document).ready(function(){
            show_users();
            setInterval('show_users()',1000);
        });
</script>



<div class="lobby">


<input class="button" name="exit" value="exit" type="button" style="margin-top: 0;" onclick="exit()"> 
<input class="button" name="select" value="select lobby" type="button" style="margin-top: 0;" onclick="select()"> 
<input class="button" name="addlobby" value="add lobby" type="button" style="margin-top: 0;" onclick="addlobby()">  <br>
<p><label for="name_lobby" style="margin-left: 10px;">Name lobby<br>
<input class="input" id="name_lobby" name="name_lobby"size="20"
type="text" value="" style="margin-left: 10px;"></label></p>
<script type="text/javascript">
	function addlobby() {
		 var name_lobby = document.getElementById('name_lobby').value;
		$.ajax({
			type: "POST",
			url: "https://mechanikus.000webhostapp.com/includes/add_lobby.php",
			data: {name_lobby: name_lobby},
			success: function(unsere) {
				alert(unsere);
			}
		});
}

	function select() {
		 var id_lobby = document.getElementById('lobbys_radio').value;
		$.ajax({
			type: "POST",
			url: "https://mechanikus.000webhostapp.com/includes/use_lobby.php",
			data: {id_lobby: id_lobby},
			success: function(unsere) {
				alert(unsere);
			}
		});
}

	function exit() {
		$.ajax({
			type: "GET",
			url: "https://mechanikus.000webhostapp.com/includes/exit_lobby.php",
			success: function(unsere) {
				alert(unsere);
			}
		});
}
</script>

List available lobby:
<div id="lobby"> </div>
</div>	
<script type="text/javascript">
show_lobby();

function show_lobby() { 
	$.ajax({
		type: "GET",
		url: "https://mechanikus.000webhostapp.com/lobby.php",
           success: function(html){
           $("#lobby").html(html);
		}
	});
}
$(document).ready(function(){
            show_lobby();
            setInterval('show_lobby()',15000);
});

</script>


</body>
</html>

<?php endif; ?>