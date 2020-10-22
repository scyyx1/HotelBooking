<!DOCTYPE html>
	<head>
		<title> Login Confirming </title>
		<link rel = "Stylesheet" type = "text/css" href = "confirm.css">
		<script type = "text/javascript" src = "emphasize.js"></script>
	</head>
	<body>
		<?php
		include 'user_login_check.php';
		if (userInDB($_POST["username"], $_POST["password"]) == true) {
			setcookie("username", $_POST["username"], time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("password", $_POST["password"], time() + (86400 * 30), "/"); // 86400 = 1 day
			header("Location: userpage.php");
		} else { ?>
		<div class = "box">
		<h2> <?php echo("Sorry Incorrect Password Or Username"); ?></h2>
    		<?php echo('<a href="login.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)">Login Again</button></a>'); }?>
		</div>
	</body>
</html>
