<?php 
include "includes.php";
$pageLink = "localhost/ketewa";
$objProc = new Process();
$url = $_SERVER['REQUEST_URI'];
$id = substr($url, strrpos($url, '/') + 1);
/*if(in_array($id, ['success', 'error'])){
	switch ($id) {
		//check session here
		case 'success': $alert = "Text successfully shortened";
			break;
		case 'error': $alert = "Error Processing Request";
			break;
	}
	$newID = rtrim($url, '/'.$id);
	$id = substr($newID, strrpos($newID, '/') + 1);
}*/
$textID = $id;
$textContent = null;
var_dump($id);
if(!empty($id)){
	$textDetails = $objProc->fetchText($id);
	if (!empty($textDetails)) {
		$textContent = $textDetails->textcontent;
	}	
}

if(isset($_POST['ketewa'])){
	$text = $_POST['text'];
	$textID = $objProc->processText($text);
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
		<li><a href="./login">Login</a></li>
		<li><a href="./signup">Signup</a></li>
	</ul>
</nav>
<?php echo empty($alert) ? null : $alert; ?>
<div class="page-content">
	<form action="" class="text-form" method="post" accept-charset="utf-8">
		<div>
		<?php 
			if(!empty($textID)){
				echo "<div class='text-link'>$pageLink/$textID</div>";
			}
		?>
			<textarea name="text" rows="20" placeholder="Enter/Paste Text Here"><?php echo $textContent; ?></textarea>
		</div>
		<?php if(empty($textID)): ?>
				<button type="submit" name="ketewa">Ketewa!</button>
		<?php endif ?>
	</form>
</div>
	<script type="text/javascript" src="resources/jquery.min.js"></script>
</body>
</html>
