<!DOCTYPE html>
	<head>
		<meta charset = "utf-8"/>
    			<meta name = "keywords" content = "hotel, Sunny Isles"/>
    			<title> Staff Login </title>
				<link rel = "Stylesheet" type = "text/css" href = "form.css">
				<script type = "text/javascript" src = "login.js"></script>
	</head>
	<body>
		<?php
			include 'staff_login_check.php';
			// Check whether the staff is already logged in
			if (staffcheckLoggedIn() == true) {
				$username = $_COOKIE["username"];
				echo("Welcome back $username <br>");
				header("Location: staffpage.php"); 
			}  
        ?>
	<div class = "main">
        <div class = "box">
            <div class = "box-logo">
				<h1> STAFF LOGIN </h1>
			</div>
        	<form class = "form" action = "staff_login.php" method = "POST" name = "myform" onsubmit = "return check();">
            	<div class = "form-item">
                    <img src = "user.png" width = 20px height = 20px alt = "" />
                    <input name = "username" type = "text" placeholder = "Enter your username">
                </div>
            	<div class = "form-item">
                    <img src = "password.png" width = 20px height = 20px alt = "" />
                	<input  name = "password" type = "password" placeholder = "Enter your password">
            	</div>
                <div class = "form-button">
                    <input type = "submit" name = "StaffLogsub" value = "Login" onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)"/>
                </div>
            </form>
			<div class = "option">
				<a href = "login.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> SWITCH TO USER </button></a>
			</div>
			<div class = "ToHome">
					<a href = "home.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> HOME </button></a>
			</div>         
		</div>
	</div>
	</body>
</html>