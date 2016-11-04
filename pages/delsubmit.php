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
				if(isset($_POST['delete']) && $_POST['delete'] === "delAlbum" && isset($_POST['checklist']) && !empty($_POST['checklist'])){
					$clist = $_POST['checklist'];
					$len = count($clist);
					$numDel = 0;
					require_once '../components/config.php';
					$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
					if ($mysqli->connect_error) {
					    die("Connection failed: " . $mysqli->connect_error);
					}
					for($i=0;$i<$len;$i++){
						$sql = "DELETE FROM albums WHERE aName = '".$clist[$i]."'";
						$result = $mysqli->query($sql);
						$sql2 = "DELETE FROM relationship WHERE aName = '".$clist[$i]."'";
						$result2 = $mysqli->query($sql2);
						$numDel++;
					}
					echo "Deleted $numDel Album(s)";
					$mysqli->close();
				}
				else if(isset($_POST['delete']) && $_POST['delete'] === "delImage" && isset($_POST['checklist']) && !empty($_POST['checklist'])){
					$clist = $_POST['checklist'];
					$len = count($clist);
					$numDel = 0;
					require_once '../components/config.php';
					$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
					if ($mysqli->connect_error) {
					    die("Connection failed: " . $mysqli->connect_error);
					}
					for($i=0;$i<$len;$i++){
						$sql = "DELETE FROM images WHERE iID = '".$clist[$i]."'";
						$result = $mysqli->query($sql);
						$sql2 = "UPDATE albums INNER JOIN relationship ON albums.aName = relationship.aName AND relationship.iID =".$clist[$i]." SET DateMod = CURRENT_TIMESTAMP";
						$result2 = $mysqli->query($sql2);
						$sql3 = "DELETE FROM relationship WHERE iID = '".$clist[$i]."'";
						$result3 = $mysqli->query($sql3);
						$numDel++;
					}
					echo "Deleted $numDel Image(s)";
					$mysqli->close();
				}
				else{
					echo "Error: Should not be able to get here.";
				}
			}
			else{
				echo "<p>You are not logged in.<br>You need to be logged in to delete images or albums.</p>";
			}
		?>
	</div>
</body>
</html>