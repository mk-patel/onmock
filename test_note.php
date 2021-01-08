<?php
session_start();
if(isset($_REQUEST["lang"]))
	$lang=$_REQUEST["lang"];
else
	header('location:index.php');
$_SESSION["lang8784"]=$lang;
?>
<!Doctype html>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
		<title>On Mock</title>
		<meta property="og:title" content="On Mock">
		<meta name="description" content="This is On Mock website demonstratingand and evaluating skills.">
		<meta property="og:description" content="This is On Mock website demonstratingand and evalvating skills.">
		<meta name="keywords" content="on mock, onmock, mock test">
		<meta name="author" content="Manish Patel">
		<link rel="icon" type="image/jpg" href="images/logo.jpg"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Oxanium|Work+Sans&display=swap" rel="stylesheet">
		<style>
		body{
			font-family: 'Work Sans', sans-serif;
		}
		.bg {
			background-image: url("images/bg.jpg");
			height: 100vh; 
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		header{
			width:100%;
			height:auto;
			padding:6px 6px 10px 0px;
			background:#009dbd;
		}
		.header-title{
			font-size:17px;
			color:white;
			margin-left:10px;
			padding:8px 0px 2px 0px;
		}
		.header-title a{
			font-size:17px;
			color:white;
			margin-left:10px;
			padding:8px 0px 2px 0px;
		}
		.after_header{
			width:100%;
			height:auto;
			padding:10px;
			color : white;
			background:#01153b;
			font-size:13px;
		}
		.language-sel{
			background: rgba(255, 255, 255, 0.7);
			width:100%;
			height:94vh;
			padding:70px 10px 10px 10px;
			text-align:center;
		}
		.choose-lang{
			height:100px;
		}
		.choose-lang a{
			text-align:center;
			padding:10px 50px 10px 50px;
			border:2px solid black;
			border-radius:9px;
			color:white;
			background:#01153b;
		}
		</style>
	</head>
    <body class="bg">
        <header class="d-flex">
			<div class="header-title">
				<b> <img src="images/logo.jpg" style="border-radius:50%;" color="white" width="30px" height="30px"> &nbsp;On Mock</b>
			</div>
		</header>
		<div id="notify" class="after_header">
		Demonstrating and evaluating your skills.
		</div>
		<div class="language-sel">
			<div class="choose-lang">
				<a href="test_subjects.php" onclick="return nt();">Tests</a>
			</div>
			<div class="choose-lang">
				<a href="notes.php" onclick="return nt1();">Notes</a>
				<br/>
			</div>
			
		</div>
    <script>
		function nt(){
		document.getElementById("notify").innerHTML="Loading...";
		var x = document.getElementById("notify");
		x.style.background="lightgreen";
		x.style.padding="10px";
		x.style.color="black";
		return true;
		}
		function nt1(){
		document.getElementById("notify").innerHTML="Loading...";
		var x = document.getElementById("notify");
		x.style.background="lightgreen";
		x.style.padding="10px";
		x.style.color="black";
		return true;
		}
	</script>
	</body>
</html>