<?php  
	session_start();
	include_once("config/koneksi.php");

	if ($kon->connect_error) {
		die("Koneksi gagal: " . $kon->connect_error);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql =  "SELECT id, username, password FROM users WHERE username = '$username' AND password = '$password'";
		$result = $kon->query($sql);

		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();

			$_SESSION["id"] = $row["id"];
			$_SESSION["username"] = $row["username"];

			header("Location: public/dashboard/dashboard.php");
		} else {
			echo "Login gagal. Silahkan coba lagi.";
		}
	}

	$kon->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST" action="">
		<label for="username">Username: </label>
		<input type="text" name="username" required=""><br><br>
		<label for="password">Password: </label>
		<input type="password" name="password" required=""><br><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>