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
        $username = $_COOKIE["username"];
        $roomNo = $_GET["room"];
        $roomInfo = $_GET["roomInfo"];
        $startdate = $_GET["startdate"];
        $enddate = $_GET["enddate"];
        try {
            $conn = new PDO("mysql:host=localhost;dbname=scyyx1",
                            "scyyx1", "XYJlove520@");
            $conn->setAttribute(PDO::ATTR_ERRMODE,
                                PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT roomNo FROM guests WHERE roomNo = $roomNo AND (('$startdate' < enddate)&&('$enddate' > startdate));";
            $rows = $conn->query($sql);
            if ($rows != NULL && $rows->rowCount() != 0){
                $conn = NULL;
        ?>
            <div class = "box">
                <h1><?php    echo("Room $roomNo Is Already Been Booked"); ?></h1>
                <a href="userpage.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)">Go Back To User Page</button></a><br>
                <div class = "Continue">
                    <?php   echo("<a href = \"select_room.php?roomType=$roomInfo&startdate=$startdate&enddate=$enddate\"> Re-Book The Room </a>");?>
                </div>
                <div class = "ToHome">
                    <a href = "home.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)"> HOME </button></a>
                </div>
            </div>
        <?php
            }
            else{
                $sql = "INSERT INTO guests (username, roomNo, roomInfo, startdate, enddate) VALUES('$username', $roomNo, '$roomInfo', '$startdate', '$enddate');";
                $conn->query($sql);
                $conn = NULL;
        ?>
                <div class = "box">
                    <h1><?php    echo("Successful Booking Room $roomNo"); ?></h1>
                    <a href="userpage.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)">Go Back To User Page</button></a><br>
                    <div class = "Continue">
                        <?php echo("<a href=\"select_room.php?roomType=$roomInfo&startdate=$startdate&enddate=$enddate\"> Continue Booking </a>")?>
                    </div>
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