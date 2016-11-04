<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href='../style/style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<?php include "../components/navbar.php";?>
	<div id = "desc">
		<?php
			if(isset($_SESSION['logged_user_by_sql'])){
				echo "<p>You are already logged in.</p>";
			}
			else{
				$post_username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
				$post_password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
				if ( empty( $post_username ) || empty( $post_password ) ) {
		?>
				<h1>Log in</h1>
				<form action="login.php" method="post">
					Username: <input type="text" name="username">
					<br>
					Password: <input type="password" name="password">
					<br><br>
					<input class="submit" type="submit" value="Login">
				</form>
				
		<?php

				} else {
					require_once '../components/config.php';
					$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
					if ($mysqli->connect_error) {
					    die("Connection failed: " . $mysqli->connect_error);
					}

					$hashed_password = password_hash("$post_password", PASSWORD_DEFAULT);
					
					$query = "SELECT * FROM users WHERE username = '$post_username'";
					$result = $mysqli->query($query);

					if ($result && $result->num_rows == 1) {
						
						$row = $result->fetch_assoc();
						
						$db_hash_password = $row['hashpassword'];
						$db_fname = $row['fName'];
						$db_lname = $row['lName'];
						
						if( password_verify( $post_password, $db_hash_password ) ) {
							$db_username = $row['username'];
							$_SESSION['logged_user_by_sql'] = $db_username;
						}
					} 
					
					$mysqli->close();

					if ( isset($_SESSION['logged_user_by_sql'] ) ) {
						$fullname = $db_fname." ".$db_lname;
						print("<p>Hello $fullname!<br>You have logged in to the website.<p>");
					} else {
						echo '<p>You did not login successfully.</p>';
						echo '<p>Please <a href="login.php">try</a> again.</p>';
					}	
				}
			}
		?>
	</div>
</body>
</html>