<!--
	Didn't include css as it doesn't mentioned in the assignment as required. But I will add CSS later.
-->

<!DOCTYPE html>
<?php
	if(isset($_POST['cancel'])){
		header("Location: index.php");
		return;
	}

$salt= 'XyZzy12*_';
$salted_hash= "1a52e17fa899cf40fb04cfc42e6352f1";

$failure= false;
if(isset($_POST['who']) && isset($_POST['pass'])){
	if(strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1){
		$failure= "User name and password are required";
	}
	else{
		$check= hash('md5', $salt.$_POST['pass']);
		if($check == $salted_hash){
			header('Location: game.php?name='.urlencode($_POST['who']));
			return;
		}
		else{
			$failure= "Incorrect Password";
		}
	}
}

 ?>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<?php 
			if($failure !== false){
				echo("<p style='color: red;'>".htmlentities("$failure")."</p>\n");
			}
		 ?>
		 <form method="POST">
		 	<label for="name">Username</label>
		 	<input type="text" placeholder="Enter Your Name" name="who" id="name"><br>
		 	<label for="pwd">Password</label>
		 	<input type="password" placeholder="Enter php123" name="pass" id="pwd"><br><br>

		 	<input type="submit" name="submit" value="Log In">
		 	<input type="submit" name="cancel" value="Cancel">

		 </form>
	</div>
</body>
</html>