<?php
session_start();
require 'db.php';
$user=$_SESSION["username"];
$password=$_SESSION["password"];
$lang=$_SESSION["lang"];
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
$query="select * from tests where lang='$lang' order by tid desc";
$result = mysqli_query($conn, $query);

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
		.after_header{
			width:100%;
			height:auto;
			padding:5px;
			background:#01153b;
		}
		.test-sel{
			width:100%;
			height:auto;
			padding:30px 20px 20px 20px;
			text-align:center;
		}
		.test-sub{
			height:auto;
			border-radius:9px;
			color:black;
			background:white;
			text-align:center;
			border:2px solid grey;
			padding:10px;
		}
		.test-sub a{
			padding:5px;
			color:black;
		}
		.test-sub a p{
			color:grey;
		}
		</style>
	</head>
    <body class="bg">
        <header class="d-flex">
			<div class="header-title">
				<b>Lock/Unlock Subject <?php echo "[ lang - ".$lang."]"; ?></b>
			</div>
		</header>
		<div class="after_header">
		</div>
		<div class="test-sel">
			<?php
				while($row = mysqli_fetch_assoc($result))
				{if($row['status']=="locked")
					$bg="#ff3838";
				else
					$bg="#7dff8";
			?>
			<div class="test-sub" style="background:<?php echo $bg;?>" >
			<p><b><?php echo $row['status'];?></b></p>
				<h4>(TestID-<?php echo $row['tid'];?>) <?php echo $row['test_name'];?> </h4>
				<p>Date : <?php echo $row['date'];?></p>
				<a href="updatelockunlock.php?tid=<?php echo $row['tid'];?>&eid=<?php echo "locked";?>"><button class="btn btn-success"> Lock </button></a> | 
				<a href="updatelockunlock.php?tid=<?php echo $row['tid'];?>&eid=<?php echo "unlocked";?>"><button class="btn btn-success"> Unlock </button></a>
			</div>
			<br/>
			<?php
				}
			?>
		</div>
    </body>
</html>