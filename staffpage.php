<!DOCTYPE html>
<html>
<head>
    <title> Booking </title>
    <meta charset = "utf-8"/>
    <link rel = "Stylesheet" type = "text/css" href = "staffpage.css">
    <script type = "text/javascript" src = "emphasize.js"></script>
</head>
<body>
<?php
    include 'staff_login_check.php';
    if (staffcheckLoggedIn() == false) {
        header("Location: staffLogin.php"); 
    } 
    function welcome(){
        $username = $_COOKIE["username"];
        echo "Welcome staff $username";
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
	try {
		$conn = new PDO("mysql:host=localhost;dbname=scyyx1",
						"scyyx1", "XYJlove520@");
		$conn->setAttribute(PDO::ATTR_ERRMODE,
							PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM guests;";
		$rows = $conn->query($sql);
		$conn = NULL;
	} catch (PDOException $e) {
		echo 'Error!: ' . $e->getMessage() . '<br />';
	}
    ?>
<div class = "main">
<div class = "box">
    <div class = "box-logo">
        <h2> Booking status </h2>
    </div>
    <?php
        if ($rows != NULL && $rows->rowCount() != 0) {
    ?>
    <div class = "box-table">
        <table border = "1">
            <caption> Room List </caption>
            <tr>
                <th> Guest Name </th>
                <th> Room Number </th> 
                <th> Room Type </th>
                <th> Check-in Date </th>
                <th> Check-out Date</th>
            </tr>
            <?php foreach ($rows as $row) {
                $username = $row['username'];
                $roomNo = $row['roomNo'];
                $roomInfo = $row['roomInfo'];
                $startdate = $row['startdate'];
                $enddate = $row['enddate'];
            ?>
            <tr>
                <td> <?php echo $username ?> </td>
                <td> <?php echo $roomNo ?> </td>
                <td> <?php echo $roomInfo ?> </td>
                <td> <?php echo $startdate ?> </td>
                <td> <?php echo $enddate ?> </td>
            </tr>
        <?php } ?>
        </table>
    </div>
    <div class = "box-option">
		<?php echo('<a href= "searchroom.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)" > Search Specific Room</button></a>')?>
    </div>
    <?php } else {
        echo("Ooops, no booked rooms in this hotel... <br>");
    } ?>
    <a class = "func" href = "emptyroom.php">Empty Room</a>
    <div class = "ToHome">
		<a href = "home.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> HOME </button></a>
	</div>
</div>
</div>
</body>
</html>