<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link href='../style/style.css' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="../script/script.js"></script>
</head>

<body>
	<?php include "../components/navbar.php";?>
	<div id = "desc">
		<h1>Edit Image/Album</h1>
		<?php 
			if (isset($_SESSION['logged_user_by_sql'])){
		?>
			<form action="editform.php" method="POST">
				<select id="editOpt" name="edit" required>
					<option value = "" disabled selected>--Edit Album/Image--</option>
					<option value = "editAlbum">Edit Album</option>
					<option value = "editImage">Edit Image</option>
				</select>

				<div id = "editAlbum" class="edit">
					<?php
						require_once '../components/config.php';
						$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
						if ($mysqli->connect_error) {
						    die("Connection failed: " . $mysqli->connect_error);
						}

						$sql = "SELECT * FROM albums";
						$result = $mysqli->query($sql);
						if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
						    	echo "<div class = 'albums'><br>";
						    	echo "<img class = 'thumbnail' src = '".$row["aImage"]."' alt = '".$row["aName"]."'>";
						        echo "<br>";
						        echo $row["aName"];
						        echo "<br>";
						        echo "<input class='editradio' type='radio' name='radioBut' value='".$row["aName"]."'>";
						        echo "</div>";
						    }
						} 
						else {
						    echo "Cannot edit albums.";
						}
						$mysqli->close();
					?>
				</div>

				<div id = "editImage" class="edit">
					<?php
						require_once '../components/config.php';
						$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
						if ($mysqli->connect_error) {
						    die("Connection failed: " . $mysqli->connect_error);
						}

						$sql = "SELECT * FROM images";
						$result = $mysqli->query($sql);
						if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
						    	echo "<div class = 'albums'><br>";
						    	echo "<img class = 'thumbnail' src = '".$row["URL"]."' alt = '".$row["iName"]."'>";
						        echo "<br>";
						        echo "<input class='editradio' type='radio' name='radioBut' value='".$row["iID"]."'>";
						        echo "</div>";
						    }
						} 
						else {
						    echo "Cannot edit images.";
						}
						$mysqli->close();
					?>
				</div>
				<br><br>
				<input id="editsubmit" class="submit" type="submit" name="editOpt" value="Edit" disabled>
			</form>
		<?php
			}
			else{
				echo "<p>You are not logged in.<br>You need to be logged in to edit images or albums.</p>";
			}
		?>
	</div>
</body>
</html>