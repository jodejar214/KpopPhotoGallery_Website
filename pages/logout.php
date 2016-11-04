<?php
	//Need to start a session in order to access it to be able to end it
	session_start();
	
	if (isset($_SESSION['logged_user_by_sql'])) {
		$olduser = $_SESSION['logged_user_by_sql'];
		unset($_SESSION['logged_user_by_sql']);
	} else {
		$olduser = false;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link href='../style/style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<?php include "../components/navbar.php";?>
	<div id = "desc">
		<?php
			//echo '<pre>' . print_r( $_SESSION, true ) . '</pre>';
			if ( $olduser ) {
				print("<p>Thanks for using our page, $olduser!</p>");
				print("<p>Return to the <a href='login.php'>login page</a></p>");
			} else {
				print("<p>You haven't logged in.</p>");
				print("<p>Go to our <a href='login.php'>login page</a></p>");
			}
		?>
	</div>
</body>
</html>