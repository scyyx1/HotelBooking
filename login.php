<!DOCTYPE html>
	<head>
		<meta charset = "utf-8"/>
    	<title> Login </title>
		<link rel = "Stylesheet" type = "text/css" href = "form.css">
		<script type = "text/javascript" src = "login.js"></script>
	</head>	
	<body>
		<?php
			include 'user_login_check.php';
			// Check whether the user is already logged in
			if (checkLoggedIn() == true) {
				header("Location: userpage.php"); 
			}
			// Check whether the staff is aleady logged in
			include 'staff_login_check.php';
			if (staffcheckLoggedIn() == true) {
				header("Location: staffpage.php"); 
			} 
		?>
		<!-- the login box which ask the to input correct username and password in order to login -->
		<div class = "main">
			<div class = "box">
				<div class = "box-logo">
					<h1> LOGIN </h1>
				</div>
            			<form action = "user_login.php" method = "POST" name = "myform" onsubmit = "return check();">
            			<div class = "form-item">
					<img src = "user.png" width = 20px height = 20px alt = "" />
                			<input name = "username" type = "text" placeholder = "Enter your username">
            			</div>
            			<div class = "form-item">
					<img src = "password.png" width = 20px height = 20px alt = "" />
                    			<input name = "password" type = "password" placeholder = "Enter your password">
                		</div>
                		<div class = "form-button">
                			<input type = "submit" name = "Logsub" value = "Login" onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)"/>
                		</div>
				</form>
				<div class = "option">
					<a href = "register.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> CREATE A NEW ACCOUNT </button></a><br />
					<a href = "staffLogin.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> STAFF LOGIN </button></a>
				</div>
				<div class = "ToHome">
					<a href = "home.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> HOME </button></a>
				</div>
			</div>
		</div>
	</body>
</html>

