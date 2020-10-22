<?php
function checkLoggedIn()
{
	if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
		return userInDB($_COOKIE["username"], $_COOKIE["password"]);
	} else {
		return false;
	}
}

function userInDB($username, $password)
{
	try {
		$conn = new PDO("mysql:host=localhost;dbname=scyyx1",
						"scyyx1", "XYJlove520@");
		$conn->setAttribute(PDO::ATTR_ERRMODE,
							PDO::ERRMODE_EXCEPTION);
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
		$rows = $conn->query($sql);
		$conn = NULL;
		if ($rows->rowCount() != 0) {
			return true;
		} else {
			return false;
		}
	} catch (PDOException $e) {
		echo 'Error!: ' . $e->getMessage() . '<br />';
	}
}
?>