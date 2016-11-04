<?php
	//get directory of current page to set url of links
	$currentPage = basename($_SERVER['PHP_SELF']);
	$indexLink = "";
	$pageLink = "";
	if($currentPage == "index.php"){
		$pageLink = "pages/";
	}
	else{
		$indexLink = "../";
	}
?>

<div id = "links">
	<ul>
		<li><a href = "<?php echo $indexLink;?>index.php"> Home </a></li> 
		<li><a href = "<?php echo $pageLink;?>images.php"> Images </a></li> 
		<li><a href = "<?php echo $pageLink;?>albums.php"> Albums </a></li>
		<li><a href = "<?php echo $pageLink;?>editselect.php"> Edit </a></li> 
		<li><a href = "<?php echo $pageLink;?>add.php"> Add </a></li> 
		<li><a href = "<?php echo $pageLink;?>del.php"> Delete </a></li> 
		<li><a href = "<?php echo $pageLink;?>search.php"> Search </a></li>
		<li><a href = "<?php echo $pageLink;?>login.php"> Login </a></li>
		<li><a href = "<?php echo $pageLink;?>logout.php"> Logout </a></li>
	</ul>
</div>