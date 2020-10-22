<!DOCTYPE html>
    <head>
        <meta charset = "utf-8"/>
        <title>Sign up</title>
        <link rel = "Stylesheet" type = "text/css" href = "register.css">
        <script type = "text/javascript" src = "register.js"></script>
    </head>
    <body>
        <div class = "box">
            <div class = "box-logo">
				<h1> Sign Up </h1>
			</div>
            <form action = "user_register_check.php" method = "POST" name = "myform"  onsubmit = "return check_register();">
                <div class = "form-item">
                    <input class = "username" name = "username" type = "text" placeholder = "Enter a new username">
                </div>
                <div class = "form-item">
                    <input class = "password" name = "password" type = "password" placeholder = "Enter new password">
                </div>
                <div class = "form-item">
                    <input name = "realname" type = "text" placeholder = "Enter your real name">
                </div>
                <div class = "form-item">
                    <input name = "passport" type = "text" placeholder = "Enter your passport">
                </div>
                <div class = "form-item">
                    <input name = "tele" type = "text" placeholder = "Enter your telephone number">
                </div>
                <div class = "form-item">
                    <input name = "email" type = "text" placeholder = "Enter your email">
                </div>
                <div class = "form-button">
                    	<input type = "submit" name = "Regsub" value = "Register" onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)"/>
                </div>
            </form>
			<div class = "options">
                <div class = "option">
                    <a href = "login.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)">ALREADY HAVE AN ACCOUNT</button></a><br />
                </div>
            </div>
            <div class = "ToHome">
					<a href = "home.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> HOME </button></a>
			</div>
        </div>
    </body>
</html>