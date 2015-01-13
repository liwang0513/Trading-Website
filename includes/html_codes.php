<?php
//Code for Header and Search Bar
function headerAndSearchCode() {
	//$defaultText = htmlentities($_GET['keywords']);
	$defaultText = "keywords";
	
	echo '
		<header id="main_header">
			<div id="rightAlign">
	';
	
	topRightLinks();
		
	echo "
			</div>
			<a href=\"index.php\"><img src=\"images/mainLogo.png\"></a>
			
			<div id=\"top_search\">
			<form name=\"input\" action=\"search.php\" method=\"get\">
				<input type=\"text\" id=\"keywords\" name=\"keywords\" size=\"100\" class=\"searchBox\" value=\"$defaultText\"> &nbsp;
				<select id=\"category\" name=\"category\" class=\"searchBox\">
	";
	
	createCategoryList();
	
	echo '
				</select>
				<input type="submit" value="Search" class="button" />
			</form>
			</div>
	';
}

//Top Right Links
function topRightLinks() {
	if ( !isset($_SESSION['user_id']) ) {
		echo '<a href="register.php">Register</a> | <a href="login.php">Log In</a>';
	} else {
		$x = $_SESSION['user_id'];
		$result = mysql_query("SELECT * FROM messages WHERE receive=$x AND status='unread'") or die(mysql_error());
		$num = mysql_num_rows($result);
		if ($num == 0) {
			echo '<a href="messages_inbox.php">Messages</a>';
		} else {
			echo "<span class=\"usernames\"><a href=\"messages_inbox.php\">Messages($num)</a></span> |";
		}
		
		echo '<a href="additem.php">Add Item</a> | <a href="account.php">My Acoount</a> | <a href="logout.php">Log Out</a>';
	}
}

//Create Category for search Bar
function createCategoryList() {
	if (ctype_digit($_GET['category'])) {
		$x = $GET['category'];
	} else {
		$x = 999;
	}
	echo "<option>All Categories</option>";
	$i = 0;
	while (1) {
		if (numberToCategory($i) == "Category Does Not Exist") {
			break;
		} else {
			echo " <option value=\"$i\" ";
			if ($i == $x) {
				echo ' SELECTED ';
			}
			echo " > ";
			echo numberToCategory($i);
			echo "</option>";
		}
		$i++;
	}
	
}

//Get categories name
function numberToCategory($n) {
	switch($n) {
		case 0:
			$cat = "Antiques";
			break;
		case 1:
			$cate = "Art";
			break;
		case 2:
			$cat = "Automotive";
			break;
		default:
			$cat = "Category Does Not Exist";
	}
	
	return $cat;
}
	
?>