<!doctype html>
<html>
	<header>
		<title>Are you sure you want to log out?</title>
		<link type="text/css" rel="stylesheet" href="logout2.css"/>
	</header>
	<body>
		<div id="message">
			<h2>Are you sure that you<br>want to logout?</h2><br>
			<a <?php unset($cookie_name['UserName']); setcookie($cookie_name, $info, time() - 3600, "/"); ?> class="yesno">yes<br>log me out</a>
			<a href="Profilepage.html" class="yesno">no<br>keep me logged in</a>
		</div>
	</body>
</html>