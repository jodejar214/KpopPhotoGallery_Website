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
		<div id = "editForms">
			<h1>Edit Image/Album</h1>
			<!--edit album-->
			<?php
				if(isset($_POST['edit']) && $_POST['edit'] === "editAlbum" && isset($_POST['radioBut'])){
					$aName = $_POST['radioBut'];
					require_once '../components/config.php';
					$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
					if ($mysqli->connect_error) {
					    die("Connection failed: " . $mysqli->connect_error);
					}
					//Display old info
					echo "<h3>Current Album Information</h3>";
					$sql = "SELECT * FROM albums WHERE aName = '".$_POST["radioBut"]."'";
					$result = $mysqli->query($sql);
					while($row = $result->fetch_assoc()){
						echo "<img class='fullpic' src='".$row["aImage"]."' alt='".$row["aName"]."'><br><br>";
				        echo "Album Name: ".$row["aName"]."<br>";
				        echo "Cover Image Credit: <a href = '".$row["aCredit"]."'>Link</a><br>";
					}
			?>
				<h3>Edit Album Title</h3>
				<?php echo "<form action='editform.php?id=$aName' method='post'>";?>
					<label>Album Title:</label>
					<br>
					<input type ="text" name="title" required>
					<br><br>
					<input class="submit" type="submit" name="edittitle" value="Edit Album">
				</form>

				<h3>Edit Album Cover</h3>
				<?php echo "<form action='editform.php?id=$aName' method='post' enctype='multipart/form-data'>";?>
					<label>Album Cover Source:</label>
					<br>
					<input type = "text" name="isource" required>
					<br>
					<label>Album Cover:</label>
					<br>
					<input class="pfile" type="file" name="newphoto" required>
					<br><br>
					<input class="submit" type="submit" name="editcover" value="Edit Album">
				</form>

				<h3>Add Image to Album</h3>
				<?php echo "<form action='editform.php?id=$aName' method='post' enctype='multipart/form-data'>";?>
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
					<label>Image Source</label>
					<br>
					<input type = "text" name="source" required>
					<br>
					<label>Image:</label>
					<br>
					<input class="pfile" type="file" name="newphoto" required>
					<br><br>
					<input class = "submit" type="submit" name="addimg" value="Add Image">
				</form>

				<h3>Delete Images From Album</h3>
				<?php echo "<form action='editform.php?id=$aName' method='post'>";?>
					<?php
						$pid = $_POST['radioBut'];
						$sql = "SELECT DISTINCT * FROM images INNER JOIN relationship ON images.iID = relationship.iID WHERE relationship.aName = '".$pid."'";
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
						    echo "0 images to display";
						}
						$mysqli->close();
					?>
					<br><br>
					<input class="submit" type="submit" name="delimg" value="Delete Image(s)">
				</form>

			<!--edit image-->
			<?php
				}
				else if(isset($_POST['edit']) && $_POST['edit'] === "editImage" && isset($_POST['radioBut'])){
					$iid = $_POST['radioBut'];
					require_once '../components/config.php';
					$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
					if ($mysqli->connect_error) {
					    die("Connection failed: " . $mysqli->connect_error);
					}
					//Display old info
					$sql = "SELECT * FROM images WHERE iID = '".$_POST["radioBut"]."'";
					$result = $mysqli->query($sql);
					echo "<h3>Current Album Information</h3>";
					while($row = $result->fetch_assoc()){
						echo "<img class='fullpic' src='".$row["URL"]."' alt='".$row["iName"]."'><br><br>";
				        echo "Image Name: ".$row["iName"]."<br>";
				        echo "Group Name: ".$row["GroupName"]."<br>";
				        echo "Gender: ".$row["Gender"]."<br>";
				        echo "Image Credit: <a href = '".$row["Credit"]."'>Link</a><br>";
						
					}
					$mysqli->close();
			?>
				<h3>Edit Image Information</h3>
				<?php echo "<form action='editform.php?id=$iid' method='post'>";?>
					<label>Image Name:</label>
					<br>
					<input type ="text" name="name">
					<br>
					<label>Group:</label>
					<br>
					<input type = "text" name="group">
					<br>
					<label>Gender:</label>
					<p class = "subtext">(if multiple genders in a group, select "None")</p>
					<select name = "gender">
						<option value = "" disabled selected>--Choose a Gender--</option>
						<option value = "Male">Male</option>
						<option value = "Female">Female</option>
						<option value = "None">None</option>
					</select>
					<br><br>
					<input class="submit" type="submit" name="editimg" value="Edit Image">
				</form>
			<?php
				}

				if(isset($_POST['editcover'])){
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

							$aName = $_GET['id'];
							$src = filter_input(INPUT_POST, 'isource', FILTER_SANITIZE_STRING);
							$cred = mysqli_real_escape_string($mysqli1, $src);
							$img = "../images/cover/$originalName";

							$sql1 = "UPDATE albums SET aImage='$img', aCredit='$cred', DateMod=CURRENT_TIMESTAMP WHERE aName='$aName'";
							$result1 = $mysqli1->query($sql1);
							$mysqli1->close();
						} 
						else {
							print("<p>Error: The file $originalName was not uploaded.</p>");
						}
					}
				}
				else if(isset($_POST['edittitle'])){
					require_once '../components/config.php';
					$mysqli1 = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
					if ($mysqli1->connect_error) {
					    die("Connection failed: " . $mysqli1->connect_error);
					} 

					$oldName = $_GET['id'];
					$newname = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
					//check if no album is same name
					$sql = "SELECT * FROM albums WHERE aName='$newname'";
					$result = $mysqli1->query($sql);
					if($result->num_rows > 0){
						echo "There is already an album titled $newname.<br>The album name cannot be changed.";
					}
					else{
						$sql1 = "UPDATE albums SET aName='$newname', DateMod=CURRENT_TIMESTAMP WHERE aName='$oldName'";
						$result1 = $mysqli1->query($sql1);
						$sql2 = "UPDATE relationship SET aName='$newname' WHERE aName='$oldName'";
						$result2 = $mysqli1->query($sql2);
						$mysqli1->close();
						echo "Changed the title of the album from $oldName to $newname";
					}
				}
				else if(isset($_POST['addimg'])){
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

							$aName = $_GET['id'];
							$imgName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
							$group = filter_input(INPUT_POST, 'group', FILTER_SANITIZE_STRING);;
							$gender = $_POST['gender'];
							$src = filter_input(INPUT_POST, 'source', FILTER_SANITIZE_STRING);
							$source = mysqli_real_escape_string($mysqli1,$src);
							$img = "../images/$originalName";

							$sql1 = "UPDATE albums SET DateMod=CURRENT_TIMESTAMP WHERE aName='$aName'";
							$result1 = $mysqli1->query($sql1);
							$sql2 = "INSERT INTO images (iName, GroupName, Gender, URL, Credit) VALUES ('".$imgName."','".$group."','".$gender."','".$img."','".$source."')";
							$result2 = $mysqli1->query($sql2);
							$sql3 = "SELECT MAX(iID) FROM images";
							$result3 = $mysqli1->query($sql3);
							$iid = 0;
							if($result3->num_rows > 0){
								while($row = $result3->fetch_assoc()) {
							    	$iid = $row['MAX(iID)'];
							    }
							}
							$sql4 = "INSERT INTO relationship VALUES ('".$aName."','".$iid."')";
							$result4 = $mysqli1->query($sql4);
							$mysqli1->close();
						} 
						else {
							print("<p>Error: The file $originalName was not uploaded.</p>");
						}
					}
				}
				else if(isset($_POST['delimg'])){
					$aName = $_GET['id'];
					$clist = $_POST['checklist'];
					$len = count($clist);
					if($len === 0){
						echo "Did not choose images to delete from album";
					}
					else{
						$numDel = 0;
						require_once '../components/config.php';
						$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
						if ($mysqli->connect_error) {
						    die("Connection failed: " . $mysqli->connect_error);
						}
						for($i=0;$i<$len;$i++){
							$sql = "DELETE FROM relationship WHERE aName='$aName' AND iID = '".$clist[$i]."'";
							$result = $mysqli->query($sql);
							$numDel++;
						}
						$mysqli->close();
						echo "<br>Deleted $numDel Image(s)";
					}
				}
				else if(isset($_POST['editimg'])){
					$iid = $_GET['id'];
					require_once '../components/config.php';
					$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
					if ($mysqli->connect_error) {
					    die("Connection failed: " . $mysqli->connect_error);
					}
					if(isset($_POST['name']) && !empty($_POST['name'])){
						$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
						$sql = "UPDATE images SET iName='$name' WHERE iID=$iid";
						$result = $mysqli->query($sql);
						echo "<p>Changed image name.</p>";
					}
					else{
						echo "<p>Did not change image name.</p>";
					}
					if(isset($_POST['group']) && !empty($_POST['group'])){
						$group = filter_input(INPUT_POST, 'group', FILTER_SANITIZE_STRING);
						$sql = "UPDATE images SET GroupName='$group' WHERE iID=$iid";
						$result = $mysqli->query($sql);
						echo "<p>Changed the group name.</p>";
					}
					else{
						echo "<p>Did not change group name.</p>";
					}
					if(isset($_POST['gender']) && !empty($_POST['gender'])){
						$gender = $_POST['gender'];
						$sql = "UPDATE images SET Gender='$gender' WHERE iID=$iid";
						$result = $mysqli->query($sql);
						echo "<p>Changed the gender.</p>";
					}
					else{
						echo "<p>Did not change gender.</p>";
					}
				}
			?>
		</div>
	</div>
</body>
</html>