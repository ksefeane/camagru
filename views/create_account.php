<html>
<head>
	<title>C - create_account</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	<div class="lrg-card">
		<div id="login-card">
			<h1>Register account</h1>
			<form action="create_account" method="POST">
			<input type="text" name="username" placeholder="username" required><p />
			<input type="email" name="email" placeholder="valid email" required><p />
			<input type="password" name="password" value="" placeholder="password" required><p />
			<input id="login-button" type="submit" name="create_account" value="submit">
			</form>
			<a href="login">already a member?</a>
		</div>
		<img id="login-pic" src="./img/camera_tikki"/>
	</div>
</body>
</html>
