<?php
session_start();
if(isset($_REQUEST["lang"]))
	$lang=$_REQUEST["lang"];
else
	header('location:adminlang.php');
$_SESSION["lang"]=$lang;
require 'db.php';
$user=$_SESSION["username"];
$password=$_SESSION["password"];
$query="select * from users where username='$user' and password='$password'";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
$un = $row["username"];
$pass = $row["password"];
if(empty($user) || empty($password)){
       header("location: index.php");
         exit();
	}else{
if ($_SESSION["username"] == $row["username"])
	
	{
	}else{
		header("location: index.php");
        exit();
	}
 if ($password == $row["password"])
 {
 }else{
         header("location: index.php");
         exit();
 }
}
?>
<!Doctype html>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
		<title>Admin Panel - On Mock</title>
		<meta property="og:title" content="On Mock">
		<meta name="description" content="This is On Mock website demonstratingand and evaluating skills.">
		<meta property="og:description" content="This is On Mock website demonstratingand and evalvating skills.">
		<meta name="keywords" content="on mock, onmock, mock test">
		<meta name="author" content="Manish Patel">
		<link rel="icon" type="image/jpg" href="images/logo.jpg"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<style>
		body{
			font-family: 'Work Sans', sans-serif;
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
		.after_header{
			width:100%;
			height:auto;
			padding:5px;
			background:#01153b;
		}
		.action-sel{
			width:100%;
			height:auto;
			padding:30px 10px 10px 10px;
		}
		.action-sel a{
			color:white;
		}
		.row{
			margin-left:20px;
			margin-right:20px;
		}
		</style>
	</head>
    <body class="bg">
        <header class="d-flex">
			<div class="header-title">
				<b>Admin Panel - On Mock <?php echo "[ lang - ".$_SESSION['lang']."]"; ?></b>
			</div>
		</header>
		<div class="after_header">
		</div>
		<div class="action-sel">
			<div class="row">
				<a href="testsec.php"><button class="btn btn-info">Test Section</button></a>
			</div>
			<br/>
			<div class="row">
				<a href="notesec.php"><button class="btn btn-info">Notes Section</button></a>
			</div>
		</div>
		<br/>
		<div class="after_header">
		</div>
		<br/>
		<div class="row">
			<a href="logout.php"><button class="btn btn-secondary">Logout</button></a>
		</div>
    </body>
</html>