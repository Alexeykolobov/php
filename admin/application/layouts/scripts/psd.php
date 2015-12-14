<!doctype html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	
	<title>White Label | Login</title>
	
	<meta name="description" content="">
	<meta name="author" content="revaxarts.com">
	
	
	<!-- Apple iOS and Android stuff -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="apple-touch-icon-precomposed" href="img/icon.png">
	<link rel="apple-touch-startup-image" href="img/startup.png">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">
	
	<!-- Google Font and style definitions -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold">
	<link rel="stylesheet" href="../../../css/style.css">
	
	<!-- include the skins (change to dark if you like) -->
	<link rel="stylesheet" href="../../../css/light/theme.css" id="themestyle">
	<!-- <link rel="stylesheet" href="css/dark/theme.css" id="themestyle"> -->
	
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css">
	<![endif]-->
	
	<!-- Use Google CDN for jQuery and jQuery UI -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
	
	<!-- Loading JS Files this way is not recommended! Merge them but keep their order -->
	
	<!-- some basic functions -->
	<script src="../../../js/functions.js"></script>
		
	<!-- all Third Party Plugins -->
	<script src="../../../js/plugins.js"></script>
		
	<!-- Whitelabel Plugins -->
	<script src="../../../js/wl_Alert.js"></script>
	<script src="../../../js/wl_Dialog.js"></script>
	<script src="../../../js/wl_Form.js"></script>
		
	<!-- configuration to overwrite settings -->
	<script src="../../../js/config.js"></script>
		
	<!-- the script which handles all the access to plugins etc... -->
	<script src="../../../js/login.js"></script>
</head>
<body id="login">
		<header>
			<div >
				<a href="login.html"></a>
			</div>
		</header>
		<section id="content">
		<form action="submit.php" id="loginform">
			<fieldset>
				<section><label for="username">Username</label>
					<div><input type="text" id="username" name="username" autofocus></div>
				</section>
				<section><label for="password">Password <a href="#">lost password?</a></label>
					<div><input type="password" id="password" name="password"></div>
					<div><input type="checkbox" id="remember" name="remember"><label for="remember" class="checkbox">remember me</label></div>
				</section>
				<section>
					<div><button class="fr submit">Login</button></div>
				</section>
			</fieldset>
		</form>
		</section>
		<footer></footer>
		
</body>
</html>