<?php 
include "includes.php";
$objProc = new Process();

if(isset($_POST['ketewa'])){
	$text = $_POST['text'];
	$textID = $objProc->processText($text);
	var_dump($textID);
	if(empty($textID)){
		$alert =  "Error Processing Request";
	}else{
		header("location:./$textID");
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ketewa</title>
	<link rel="stylesheet/less" type="text/css" href="resources/style.less">
	<script type="text/javascript" src="resources/less.min.js"></script>
</head>
<body>
<nav class="banner">
	<div class="logo"></div>
	<ul class="navigation">
		<li><a href="./">Home</a></li>
		<li><a href="./signup">Signup</a></li>
	</ul>
</nav>
<?php echo empty($alert) ? null : $alert; ?>
<div class="page-content">
	<h2 style="color:#aaa; padding:2em 1em">LOGIN</h2>
	<form action="" class="text-form" method="post" accept-charset="utf-8">
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="form-group">
			<button type="submit">Login</button>
		</div>
	</form>
</div>
	<script type="text/javascript" src="resources/jquery.min.js"></script>
</body>
</html>
