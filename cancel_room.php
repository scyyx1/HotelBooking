<!DOCTYPE html>
    <head>
        <title>Cancel room</title>
        <meta charset = "utf-8"/>
        <link rel = "Stylesheet" type = "text/css" href = "list.css">
        <script type = "text/javascript" src = "emphasize.js"></script>
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
        <?php
            $username = $_COOKIE["username"];
	        try {
                $conn = new PDO("mysql:host=localhost;dbname=scyyx1",
                                "scyyx1", "XYJlove520@");
                $conn->setAttribute(PDO::ATTR_ERRMODE,
                                    PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM guests WHERE username = '$username';";
                $rows = $conn->query($sql);
                $conn = NULL;
            } catch (PDOException $e) {
                echo 'Error!: ' . $e->getMessage() . '<br />';
            }
        ?>
	<div class = "main">
        <div class = "box">
            <div class = "box-logo">
                <h2> Cancel the specific room: </h2>
            </div>
            <?php
                if ($rows != NULL && $rows->rowCount() != 0) {
            ?>
            <div class = "box-table">
                <table border = "1">
                    <caption> Room List </caption>
                    <tr>
                        <th> Room Number </th> 
                        <th> Room Type </th>
                        <th> Check-in Date </th>
                        <th> Check-out Date</th>
                        <th> Cancel </th>
                    </tr>
                    <?php foreach ($rows as $row) {
                        $roomNo = $row['roomNo'];
                        $roomInfo = $row['roomInfo'];
                        $startdate = $row['startdate'];
                        $enddate = $row['enddate'];
                    ?>
                    <tr>
                        <td> <?php echo $roomNo ?> </td>
                        <td> <?php echo $roomInfo ?> </td>
                        <td> <?php echo $startdate ?> </td>
                        <td> <?php echo $enddate ?> </td>
                        <td> <?php echo("<a href=\"cancel.php?room=$roomNo&startdate=$startdate&enddate=$enddate\">Cancel it!</a>") ?></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
            <div class = "box-option">
                <a href = "userpage.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)">Go Back To User Page</button></a>
            </div>
            <?php } else {
                echo("Ooops, no bookedrooms in this hotel... <br>");
                echo('<div class = "box-option">
                        <a href = "userpage.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)">Go Back To Booking Page</button></a>
                        </div>');
            } ?>
            <div class = "ToHome">
					<a href = "home.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> HOME </button></a>
			</div>
        </div>
	</div>
    </body>
</html>