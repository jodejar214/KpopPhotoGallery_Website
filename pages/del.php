<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<link href='../style/style.css' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="../script/script.js"></script>
</head>

<body>
	<?php include "../components/navbar.php";?>
	<div id = "desc">
		<h1>Delete Image/Album</h1>
		<?php 
			if (isset($_SESSION['logged_user_by_sql'])){
		?>
			<form id="delForm" action="delsubmit.php" method="POST">
				<select id="delOpt" name="delete" required>
					<option value = "" disabled selected>--Delete Album/Image--</option>
					<option value = "delAlbum">Delete Album</option>
					<option value = "delImage">Delete Image</option>
				</select>

				<div id = "delAlbum" class="delete">
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
						        echo "<input class='delcheck' type='checkbox' name='checklist[]' value='".$row["aName"]."'>";
						        echo "</div>";
						    }
						} 
						else {
						    echo "0 albums to delete";
						}
						$mysqli->close();
					?>
				</div>

				<div id = "delImage" class="delete">
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
						        echo "<input class='delcheck' type='checkbox' name='checklist[]' value='".$row["iID"]."'>";
						        echo "</div>";
						    }
						} 
						else {
						    echo "0 images to delete";
						}
						$mysqli->close();
					?>
				</div>
				<br><br>
				<input id="delsubmit" class="submit" type="submit" name="deleteOpt" value="Delete" disabled>
			</form>
		<?php
			}
			else{
				echo "<p>You are not logged in.<br>You need to be logged in to delete images or albums.</p>";
			}
		?>
	</div>
</body>
</html>