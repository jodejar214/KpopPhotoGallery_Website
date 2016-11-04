<!DOCTYPE html>
<html>
<head>
	<title>Albums</title>
	<link href='../style/style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<?php include "../components/navbar.php";?>
	<div id = "desc">
		<?php
			require_once '../components/config.php';
			$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
			if ($mysqli->connect_error) {
			    die("Connection failed: " . $mysqli->connect_error);
			} 

			if(isset($_GET['id'])){
				$pid = $_GET['id'];
				echo "<h1>".$pid." Images</h1>";
				$sql = "SELECT DISTINCT * FROM images INNER JOIN relationship ON images.iID = relationship.iID WHERE relationship.aName = '".$pid."'";
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
				} 
				else {
				    echo "0 images to display";
				}
				$sql = "SELECT * FROM albums WHERE aName = '".$pid."'";
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				    	echo "<p>Date Created: ".$row["DateCreated"];
				    	echo "<br>Date Modified: ".$row["DateMod"]."</p>";
				    }
				} 
				else {
				    echo "0 images to display";
				}
			}
			else{
				echo "<h1>Albums</h1>";
				$sql = 'SELECT * FROM albums';
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				    	echo "<div class = 'albums'><br>";
				    	$aid = urlencode($row["aName"]);
				    	echo "<a href = 'albums.php?id=".$aid."'>";
				    	echo "<img class = 'thumbnail' src = '".$row["aImage"]."' alt = '".$row["aName"]."'>";
				    	echo "</a>";
				        echo "<br>".$row["aName"];
				        echo "</div>";
				    }
				} 
				else {
				    echo "0 albums to display";
				}
			}

			$mysqli->close();
		?>
	</div>
</body>
</html>