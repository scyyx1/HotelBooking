<?php
            include 'user_login_check.php';
            // Check whether the user is already logged in
            if (checkLoggedIn() == false) {
                header("Location: login.php"); 
            }
	$roomtype = $_GET["roomInfo"];
	$startdate = $_GET["startdate"];
	$enddate = $_GET["enddate"];
	try {
		$conn = new PDO("mysql:host=localhost;dbname=scyyx1",
						"scyyx1", "XYJlove520@");
		$conn->setAttribute(PDO::ATTR_ERRMODE,
							PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM rooms WHERE roomInfo = '$roomtype' AND roomNo != ALL(SELECT roomNo FROM guests WHERE roomInfo = '$roomtype' AND (('$startdate' < enddate)&&('$enddate' > startdate)));";
		$rows = $conn->query($sql);
		$conn = NULL;
	} catch (PDOException $e) {
		echo 'Error!: ' . $e->getMessage() . '<br />';
	}
	if ($rows != NULL && $rows->rowCount() != 0) {
        foreach($rows as $row){
            $roomNo = $row['roomNo'];
        }
		header("Location: bookroom.php?room=$roomNo&roomInfo=$roomtype&startdate=$startdate&enddate=$enddate"); 
    }
    else{
        echo("Ooops, no rooms in this hotel... <br>");
		echo("<a href=\"userpage.php\">Go back to home page</a>");
    }
?>