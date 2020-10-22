<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8"/>
    	<title> Login </title>
        <link rel = "Stylesheet" type = "text/css" href = "confirm.css">
        <script type = "text/javascript" src = "emphasize.js"></script>
    </head>	
    <body>
        <?php
            $username = $_POST["username"];
            $password = $_POST["password"];
            $realname = $_POST["realname"];
            $passport = $_POST["passport"];
            $tele = $_POST["tele"];
            $email = $_POST["email"];
            try{
                $conn = new PDO("mysql:host=localhost;dbname=scyyx1",
                                    "scyyx1", "XYJlove520@");
                $conn->setAttribute(PDO::ATTR_ERRMODE,
                               PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT username FROM users WHERE username = '$username';";
                $rows = $conn->query($sql);
                if ($rows->rowCount() != 0){ 
        ?>
                    <div class = "box">
                        <h2> Username has already exist</h2>
                        <a href="register.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)">Go back to sign up again</button></a> <?php $conn = NULL; } else {?>
                    </div>    
                    <?php
                                $password = md5($password);
                                $sql = "INSERT INTO users (username, password, realname, passport, tele, email) VALUES('$username', '$password', '$realname', '$passport', '$tele', '$email');";
                                $conn->query($sql);
                                $conn = NULL;?>
                                <div class = "box">
                                    <h2> Create Successfully</h2>
                                    <a href="login.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)">Go To Login</button></a> <?php } }    catch (PDOException $e) {?>
                                </div>
                    <?php
                echo 'Error!: ' . $e->getMessage() . '<br />';
            }?>
    </body>
    </html>