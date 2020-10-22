<!DOCTYPE html>
<head>
	<title> Empty Room </title>
	<meta charset = "utf-8"/>
    <link rel = "Stylesheet" type = "text/css" href = "list.css">
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
    $sql = "SELECT roomNo, roomInfo FROM rooms WHERE roomNo != ALL(SELECT roomNo FROM guests);";
    $rows = $conn->query($sql);
    $conn = NULL;
} catch (PDOException $e) {
    echo 'Error!: ' . $e->getMessage() . '<br />';
}
?>
<div class = "main">
<div class = "box">
    <div class = "box-logo">
        <h2> Empty room List </h2>
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
                <th> Guest Name </th>
                <th> Check-in Date </th>
                <th> Check-out Date</th>
            </tr>
            <?php foreach ($rows as $row) {
                $roomNo = $row['roomNo'];
                $roomInfo = $row['roomInfo'];
            ?>
            <tr>
                <td> <?php echo $roomNo ?> </td>
                <td> <?php echo $roomInfo ?> </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
            </tr>
        <?php } ?>
        </table>
    </div>
    <div class = "box-option">
        <?php echo('<a href= "staffpage.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)">Go Back To Staff Page</button></a><br>')?>
    </div>
    <?php } else {
        echo(" There is no empty room left <br>");
        echo('<div class = "box-option">
                <a href = "staffpage.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)">Go Back To Staff Page</button></a>
                </div>');
    } ?>
    <div class = "ToHome">
		<a href = "home.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)"> HOME </button></a>
	</div>
</div>
</div>
</body>
</html>