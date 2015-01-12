<?php
//Code for Header and Search Bar
function headerAndSearcgCode() {
	$defaultText = htmlentities($_GET['keywords']);
	
	echo '
		<header id="main_header">
			<div id="rightAlign">
	';
	
	//Links will be here
	echo "
			</div>
			<a href=\"index.php\"><img src=\"images/mainLogo.png\"></a>
	";
} 	
	
?>