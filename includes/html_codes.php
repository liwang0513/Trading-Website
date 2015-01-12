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
			
			<div id=\"top_search\">
			<form name=\"input\" action=\"search.php\" method=\"get\">
				<input type=\"text\" id=\"keywords\" name=\"keywords\" size=\"100\" class=\"searchBox\" value=\"$defaultText\"> &nbsp;
				<select id=\"category\" name=\"category\" class=\"searchBox\">
	";
	
	//include categories here
	
	echo '
				</select>
				<input type="submit" value="Search" class="button" />
			</form>
			</div>
	';
} 	
	
?>