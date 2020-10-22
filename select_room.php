<!DOCTYPE html>
	<head>
		<title> Select Room </title>
		<meta charset = "utf-8"/>
		<link rel = "Stylesheet" type = "text/css" href = "select_room.css">
		<script type = "text/javascript" src = "emphasize.js"></script>
	</head>
	<body>
		<?php
		include 'user_login_check.php';
            	// Check whether the user is already logged in
            	if (checkLoggedIn() == false) {
                	header("Location: login.php"); 
            	}
			$roomtype = $_GET["roomType"];
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
		?>
		<div class = "box">
			<div class = "box-logo">
			<h2> Select The Specific Room </h2>
			</div>
			<?php
				if($rows != NULL && $rows->rowCount() != 0) {
			?>
			<form action = 'bookroom.php' method = "GET">
			<div class = "form-item">
				<select name = "room" size = "1">
					<?php 
							foreach ($rows as $row) {
								$roomNo = $row['roomNo'];
					?>
					<option> <?php echo $roomNo?> </option>
					<?php }?>
				</select>
			</div>
			<input type = "hidden" name = "roomInfo" value = "<?php echo $roomtype?>">
			<input type = "hidden" name = "startdate" value = "<?php echo $startdate?>">
			<input type = "hidden" name = "enddate" value = "<?php echo $enddate?>">
			<div class = "form-button">
     			<input type = "submit" value = "BOOK" onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)">
			</div>
			</form>
			<div class = "option">
				<?php echo("<a href= \"random_book.php?roomInfo=$roomtype&startdate=$startdate&enddate=$enddate\"><button>RAMDOM BOOKING</button></a>")?>
			</div>
			<?php } else {
				echo("Ooops, no rooms in this hotel... <br>");
				echo("<a href=\"userpage.php\">BACK</a>");
			}?>
			<a class = "GoBack" href = "userpage.php"> BACK</a>
		</div>
	</body>
</html>