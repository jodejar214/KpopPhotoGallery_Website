<!DOCTYPE html>
<html>
<head>
	<title>Images</title>
	<link href='../style/style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<?php include "../components/navbar.php";?>
	<div id = "desc">
		<h1>Image Gallery</h1>
		<?php
			require_once '../components/config.php';
			$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
			if ($mysqli->connect_error) {
			    die("Connection failed: " . $mysqli->connect_error);
			}

			if(isset($_GET['id'])){
				$pid = $_GET['id'];
				//get picture and information
				$sql1 = "SELECT * FROM images WHERE iID = '".$pid."'";
				$result1 = $mysqli->query($sql1);
				if ($result1->num_rows > 0) {
				    while($row = $result1->fetch_assoc()) {
				        echo "<img class ='fullpic' src = '".$row["URL"]."' alt = '".$row["iName"]."'><br><br>";
				        echo "Image Name: ".$row["iName"]."<br>";
				        echo "Group Name: ".$row["GroupName"]."<br>";
				        echo "Gender: ".$row["Gender"]."<br>";
				        echo "Image Credit: <a href = '".$row["Credit"]."'>Link</a><br>";
				    }
				} 
				else {
				    echo "No image and information to display";
				}
				echo "<h3>Albums This Image is In</h3>";
				//get albums image is in
				$sql2 = "SELECT * FROM relationship WHERE iID = '".$pid."'";
				$result2 = $mysqli->query($sql2);
				if ($result2->num_rows > 0) {
				    while($row = $result2->fetch_assoc()) {
				        echo $row["aName"]."<br>";
				    }
				} 
				else {
				    echo "No album information to display for image";
				}
			}
			else{
				$sql = 'SELECT * FROM images';
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				        echo "<div class = 'albums'><br>";
					    $iid = urlencode($row["iID"]);
					    echo "<a href = 'images.php?id=".$iid."'>";
					    echo "<img class ='thumbnail' src = '".$row["URL"]."' alt = '".$row["iName"]."'>";
					    echo "</a>";
					    echo "</div>";
				    }
				 } else {
				    echo "0 images to display";
				}
			}
			
			$mysqli->close();
		?>
	</div>
</body>
</html>