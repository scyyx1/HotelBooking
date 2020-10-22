<!DOCTYPE html>
    <head>
        <title> Confirming </title>
        <meta charset = "utf-8"/>
        <link rel = "Stylesheet" type = "text/css" href = "confirm.css">
        <script type = "text/javascript" src = "emphasize.js"></script>
    </head>
    <body>
        <?php
	   include 'user_login_check.php';
            // Check whether the user is already logged in
            if (checkLoggedIn() == false) {
                header("Location: login.php"); 
            }
        $roomNo = $_GET["room"];
        $startdate = $_GET["startdate"];
        $enddate = $_GET["enddate"];
        try {
            $conn = new PDO("mysql:host=localhost;dbname=scyyx1",
                           "scyyx1", "XYJlove520@");
            $conn->setAttribute(PDO::ATTR_ERRMODE,
                                PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT roomNo FROM guests WHERE roomNo = $roomNo AND startdate = '$startdate' AND enddate = '$enddate';";
            $rows = $conn->query($sql);
            if ($rows->rowCount() == 0){
                $conn = NULL;
        ?>
            <div class = "box">
                <h1><?php    echo("Room $roomNo Is Already Been Canceled"); ?></h1>
                <a href="userpage.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)">Go Back To User Page</button></a><br>
                <div class = "Continue">
                    <?php   echo("<a href = \"cancel_room.php\"> Re-Cancel The Room </a>");?>
                </div>
                <div class = "ToHome">
                    <a href = "home.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)"> HOME </button></a>
                </div>
            </div>
        <?php
            }
            else{
                    $sql = "DELETE FROM guests WHERE roomNo = $roomNo AND startdate = '$startdate' AND enddate = '$enddate';";
                $conn->query($sql);
                $conn = NULL;
        ?>
            <div class = "box">
                <h1><?php    echo("Successful Cancel Room $roomNo "); ?></h1>
                <a href="userpage.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)">Go Back To User Page</button></a><br>
                <br /><a class = "Continue" href = "cancel_room.php"> Continue Canceling</a>
                <div class = "ToHome">
			    		<a href = "home.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)"> HOME </button></a>
			    </div>
            </div>
        <?php
            }
        } catch (PDOException $e) {
            echo 'Error!: ' . $e->getMessage() . '<br />';
        }
        ?>
    </body>
</html>