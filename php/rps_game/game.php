<?php 
if(!isset($_GET['name']) || strlen($_GET['name'])<1){
	die("<p style='color:red;'>Name parameter missing</p>");
}
if(isset($_POST['logout'])){
	header('Location: index.php');
}

//Need to be fix: when you logout it will logout but when you press the back button it login automatically withot entering the password.
//Basically it doesn't log out properly just redirect to index.php and that needs to be fix. I'm working on that.

$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST['human']) ? $_POST['human']+0 : -1;
$computer= rand(0, 2);

function check($computer, $human){
	if($human == $computer){
		return "Tie";
	}
	else if (($human == 0 && $computer == 2)||($human == 1 && $computer == 0)||($human == 2 && $computer == 1) ){
			return "You Win!";
	}
	else{
		return "You Lose.";
	}
	return false;
}

$result = check($computer, $human);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sachin Kumar</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="container">
		<h1>Rock Paper Scissors</h1>
		<p>Welcome: <?php echo htmlentities($_REQUEST['name']); ?></p>
		<form method="post">
		<select name="human">
			<option value="-1">select</option>
			<option value="0">Rock</option>
			<option value="1">Paper</option>
			<option value="2">Scissor</option>
			<option value="3">Test</option>
		</select>
		<input type="submit" value="Play">
		<input type="submit" name="logout" value="Logout">
		</form>
			<?php 
			if($human == -1){
				print "\n Plese select a strategy and press play \n";
			}
			else if($human == 3){
				for($x=0; $x<3; $x++){
					for($n=0; $n<3; $n++){
						$r= check($x, $n);
						print("<pre> Human= $names[$n] Computer= $names[$x] Result: $r \r\n</pre>");
					}
				}
			}
			else{
    			print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
			}
			?>
		
	</div>
</body>
</html>