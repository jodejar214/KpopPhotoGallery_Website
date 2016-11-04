<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link href='../style/style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<?php include "../components/navbar.php";?>
	<div id = "desc">
		<h1>Image/Album Search</h1>
			<form id="search" action="search.php" method="POST">
				<input type="text" name="search" placeholder="Type Search Here..." required>
				<br><br>
				<label class="fheader">Search By:</label>
				<br>
				<input type="checkbox" name="aName" value="aName" checked><label>Album Name</label>
				<br>
				<input type="checkbox" name="iName" value="iName" checked><label>Image Name</label>
				<br>
				<input type="checkbox" name="gName" value="gName" checked><label>Group Name</label>
				<br>
				<input type="checkbox" name="gender" value="gender" checked><label>Gender</label>
				<br><br>
				<input class="submit" type="submit" name="doSearch" value="Search">
				<br><br>
			</form>

			<?php
				require_once '../components/config.php';
				$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
				if ($mysqli->connect_error) {
				    die("Connection failed: " . $mysqli->connect_error);
				} 

				if(isset($_POST['search'])){
					$sid = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

					//Album Search
					echo "<h1>Albums related to ".$sid."</h1>";
					if(isset($_POST['aName']) && $_POST['aName'] === 'aName'){
						$sql = "SELECT * FROM albums WHERE aName LIKE '%$sid%'";
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
						    echo "0 albums match the search";
						}
					}
					else{
						echo "Did not specify Album Search";
					}

					//Image Search
					echo "<h1>Images related to ".$sid."</h1>";
					if(isset($_POST['iName']) && $_POST['iName'] === 'iName' && isset($_POST['gName']) && $_POST['gName'] === 'gName' && isset( $_POST['gender']) && $_POST['gender'] === 'gender'){
						$sql = "SELECT * FROM images WHERE iName LIKE '%$sid%' OR GroupName LIKE '%$sid%' OR Gender LIKE '%$sid%'";
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
					else if(isset($_POST['iName']) && $_POST['iName'] === 'iName' && isset($_POST['gName']) && $_POST['gName'] === 'gName'){
						$sql = "SELECT * FROM images WHERE iName LIKE '%$sid%' OR GroupName LIKE '%$sid%'";
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
					else if(isset($_POST['gName']) && $_POST['gName'] === 'gName' && isset($_POST['gender']) && $_POST['gender'] === 'gender'){
						$sql = "SELECT * FROM images WHERE GroupName LIKE '%$sid%' OR Gender LIKE '%$sid%'";
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
					else if(isset($_POST['iName']) && $_POST['iName'] === 'iName' && isset($_POST['gender']) && $_POST['gender'] === 'gender'){
						$sql = "SELECT * FROM images WHERE iName LIKE '%$sid%' OR Gender LIKE '%$sid%'";
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
					else if(isset($_POST['iName']) && $_POST['iName'] === 'iName'){
						$sql = "SELECT * FROM images WHERE iName LIKE '%$sid%'";
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
					else if(isset($_POST['gName']) && $_POST['gName'] === 'gName'){
						$sql = "SELECT * FROM images WHERE GroupName LIKE '%$sid%'";
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
					else if(isset($_POST['gender']) && $_POST['gender'] === 'gender'){
						$sql = "SELECT * FROM images WHERE Gender = '$sid'";
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
					else{
						echo "Did not specify Image Search";
					}
					
				}
			?>
	</div>
</body>
</html>