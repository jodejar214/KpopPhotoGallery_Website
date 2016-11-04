<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add</title>
	<link href='../style/style.css' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="../script/script.js"></script>
</head>

<body>
	<?php include "../components/navbar.php";?>
	<div id = "desc">
		<h1>Add Image/Album</h1>
		<?php 
			if (isset($_SESSION['logged_user_by_sql'])){
		?>
			<h3>Add Album</h3>
			<div class = "add_form">
				<form action = "add.php" method= "post" enctype="multipart/form-data">
					<label>Album Title:</label>
					<br>
					<input type ="text" name="title" required>
					<br>
					<label>Album Cover Source:</label>
					<br>
					<input type = "text" name="isource" required>
					<br>
					<label>Album Cover:</label>
					<br>
					<input class="pfile" type="file" name="newphoto" required>
					<br>
					<input type="submit" name="upalbum" value="Upload Album">
				</form>
			</div>
			
			<br>

			<h3>Add Image</h3>
			<div class = "add_form">
				<form action = "add.php" method= "post" enctype="multipart/form-data">
					<label>Image Name:</label>
					<br>
					<input type ="text" name="name" required>
					<br>
					<label>Group Name:</label>
					<p class = "subtext">(if not related to a group, type "None")</p>
					<input type ="text" name="group" required>
					<br>
					<label>Gender:</label>
					<p class = "subtext">(if multiple genders in a group, select "None")</p>
					<select name = "gender" required>
						<option value = "" disabled selected>--Choose a Gender--</option>
						<option value = "Male">Male</option>
						<option value = "Female">Female</option>
						<option value = "None">None</option>
					</select>
					<br>
					<label>Album Name:</label>
					<br>
					<select name = "album" required>
						<option value = "" disabled selected>--Choose an Album--</option>
						<?php
							$albums = array();
							require_once '../components/config.php';
							$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
							if ($mysqli->connect_error) {
							    die("Connection failed: " . $mysqli->connect_error);
							} 
							$sql = 'SELECT DISTINCT aName FROM albums';
							$result = $mysqli->query($sql);
							if ($result->num_rows > 0) {
							    while($row = $result->fetch_assoc()) {
							    	$albums[] = $row['aName'];
							    }
							} 
							else {
							    $albums[] = "No albums to choose from";
							}
							foreach($albums as $choice){
								echo "<option value = \"$choice\">$choice</option>";
							}
							$mysqli->close();
						?>
						<option value = "None">None</option>
					</select>
					<br>
					<select id="album2" name="album2">
						<option value = "" disabled>--Choose an Album--</option>
						<?php
							$albums = array();
							require_once '../components/config.php';
							$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
							if ($mysqli->connect_error) {
							    die("Connection failed: " . $mysqli->connect_error);
							} 
							$sql = 'SELECT DISTINCT aName FROM albums';
							$result = $mysqli->query($sql);
							if ($result->num_rows > 0) {
							    while($row = $result->fetch_assoc()) {
							    	$albums[] = $row['aName'];
							    }
							} 
							else {
							    $albums[] = "No albums to choose from";
							}
							foreach($albums as $choice){
								echo "<option value = \"$choice\">$choice</option>";
							}
							$mysqli->close();
						?>
						<option value = "None" selected>None</option>
					</select>
					<button id="more" type="button">Add to Another Album</button>
					<br>
					<button id="less" type="button">Show Less</button>
					<br>
					<label>Image Source</label>
					<br>
					<input type = "text" name="source" required>
					<br>
					<label>Image:</label>
					<br>
					<input class="pfile" type="file" name="newphoto" required>
					<br>
					<input type="submit" name="upimg" value="Upload Image">
				</form>
			</div>
			<?php
				if(isset($_POST['upalbum'])){
					if (!empty( $_FILES['newphoto'])){
						$newPhoto = $_FILES['newphoto'];
						$originalName = $newPhoto['name'];
						if ( $newPhoto['error'] == 0 ) {
							$tempName = $newPhoto['tmp_name'];
							move_uploaded_file( $tempName, "../images/cover/$originalName");
							$_SESSION['photos'][] = $originalName;
							print("<p>The file $originalName was uploaded successfully.</p>");
							
							require_once '../components/config.php';
							$mysqli1 = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
							if ($mysqli1->connect_error) {
							    die("Connection failed: " . $mysqli1->connect_error);
							} 

							$name = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
							$src = filter_input(INPUT_POST, 'isource', FILTER_SANITIZE_STRING);
							$cred = mysqli_real_escape_string($mysqli1, $src);
							$img = "../images/cover/$originalName";

							$sql1 = "INSERT INTO albums (aName, aImage, aCredit) VALUES ('$name','$img','$cred')";
							$result1 = $mysqli1->query($sql1);
							$mysqli1->close();
						} 
						else {
							print("<p>Error: The file $originalName was not uploaded.</p>");
						}
					}
				}

				if(isset($_POST['upimg'])){
					if (!empty( $_FILES['newphoto'])){
						$newPhoto = $_FILES['newphoto'];
						$originalName = $newPhoto['name'];
						if ( $newPhoto['error'] == 0 ) {
							$tempName = $newPhoto['tmp_name'];
							move_uploaded_file( $tempName, "../images/$originalName");
							$_SESSION['photos'][] = $originalName;
							print("<p>The file $originalName was uploaded successfully.</p>");
							
							require_once '../components/config.php';
							$mysqli1 = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
							if ($mysqli1->connect_error) {
							    die("Connection failed: " . $mysqli1->connect_error);
							} 

							$imgName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
							$group = filter_input(INPUT_POST, 'group', FILTER_SANITIZE_STRING);;
							$gender = $_POST['gender'];
							$src = filter_input(INPUT_POST, 'source', FILTER_SANITIZE_STRING);
							$source = mysqli_real_escape_string($mysqli1,$src);
							$album = $_POST['album'];
							$album2 = $_POST['album2'];
							$img = "../images/$originalName";

							$sql1 = "INSERT INTO images (iName, GroupName, Gender, URL, Credit) VALUES ('".$imgName."','".$group."','".$gender."','".$img."','".$source."')";
							$result1 = $mysqli1->query($sql1);

							if($album !== "None"){
								$sql2 = "SELECT MAX(iID) FROM images";
								$result2 = $mysqli1->query($sql2);
								$iid = 0;
								if($result2->num_rows > 0){
									while($row = $result2->fetch_assoc()) {
								    	$iid = $row['MAX(iID)'];
								    }
								}
								$sql3 = "INSERT INTO relationship VALUES ('".$album."','".$iid."')";
								$result3 = $mysqli1->query($sql3);
								$sql4 = "UPDATE albums SET DateMod = CURRENT_TIMESTAMP WHERE aName = '".$album."'";
								$result4 = $mysqli1->query($sql4);

								if($album2 !== "None"){
									$sql5 = "INSERT INTO relationship VALUES ('".$album2."','".$iid."')";
									$result5 = $mysqli1->query($sql5);
									$sql6 = "UPDATE albums SET DateMod = CURRENT_TIMESTAMP WHERE aName = '".$album2."'";
									$result6 = $mysqli1->query($sql6);
								}
							}
							$mysqli1->close();
						} 
						else {
							print("<p>Error: The file $originalName was not uploaded.</p>");
						}
					}
				}
			}
			else{
				echo "<p>You are not logged in.<br>You need to be logged in to add images or albums.</p>";
			}
		?>
	</div>
</body>
</html>