<!DOCTYPE html>
    <html>
        <head>
            <title> Book Room </title>
            <meta charset = "utf-8"/>
            <link rel = "Stylesheet" type = "text/css" href = "userpage.css">
            <script type = "text/javascript" src = "userpage.js"></script>
        </head>
    <body>
        <?php
            include 'user_login_check.php';
            // Check whether the user is already logged in
            if (checkLoggedIn() == false) {
                header("Location: login.php"); 
            }
            function welcome(){
                $username = $_COOKIE["username"];
                echo "Welcome user $username";
            }
        ?>
        <div class = "logo">
            <h1> Sunny Isle </h1>
            <h4><?php welcome() ?></h4>
            <div class = "logout">
                <a href = "logout.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)">Log out</button></a>
            </div>
        </div>
	<div class = "main">
        	<div class = "box">
            		<div class = "box-logo">
                		<h1> BOOKING </h1>
            		</div>
            		<form action = "select_room.php" method = "GET" name = "myform" onsubmit = "return check()">
                		<div class = "form-item">
                	    	<p> Check-in Date </p>
                	    	<input type = "date" name = "startdate" placeholder = "Enter the check-in date" >
                		</div> 
                		<div class = "form-item">
                			<p> Check-out Date </p>
                	    		<input type = "date" name = "enddate" placeholder = "Enter the check-out date">
                		</div>
                		<div class = "form-item">
                    			<p>Select Room Type</p>
                    			<select name = roomType size = "1">
                        			<option>Large double bedroom</option>
                        			<option>Large single bedroom</option>
                        			<option>Small single bedroom</option>
                        			<option>VIP bedroom</option>
                    			</select>
                		</div>
                		<div class = "form-button">
                    			<input type = "submit" value = "SUBMIT" onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)">
                		</div>
            		</form>
			<div class = "option">
                		<a href = "cancel_room.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> Cancel Booking </button></a>
           		</div>
            		<div class = "ToHome">
				<a href = "home.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> HOME </button></a>
			</div>   
        	</div>
	</div>
    </body>
</html>