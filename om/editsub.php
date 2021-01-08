<?php
session_start();
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
if(empty($_SESSION['message3'])){
		$msg="Edit Subject or Topic";
	}
	else{
		$msg = $_SESSION['message3'];
	}
	
if(isset($_REQUEST["edid"]))
	$edid=$_REQUEST["edid"];
else
	header('location:modifysub.php');
$query="select * from tests where tid=$edid";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
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
			padding:20px;
			color :white;
			background:#01153b;
		}
		.action-sel{
			width:100%;
			height:auto;
			padding:30px 10px 20px 20px;
			font-size:20px;
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
				<b>Edit Subject or Topic - Admin Panel <?php echo "[ lang - ".$_SESSION['lang']."]"; ?></b>
			</div>
		</header>
		<div class="after_header">
		<?php echo $msg ;?>
		</div>
		<div class="row">
			<div class="action-sel">
				<div class="row">
				
					<form class="form" action="updatesub.php" method="POST" autocomplete="on">
						<div class="form-group">
							<label for="uname">Subject or Topic Name</label>
							<input type="text" class="form-control" id="uname" value="<?php echo $row['test_name'];?>" name="test_name" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">Number Of Question (Example- 10,50...etc)</label>
							<input type="text" class="form-control" id="uname" value="<?php echo $row['no_of_qust'];?>" name="no_of_qust" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">Passing Marks (Example- 15,30...etc)</label>
							<input type="text" class="form-control" id="uname" value="<?php echo $row['pmarks'];?>" name="pmarks" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">Time Limit (in Minutes) (Example- 20,60...etc)</label>
							<input type="text" class="form-control" id="uname" value="<?php echo $row['time'];?>" name="time" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<input type="hidden" class="form-control" id="uname" value="<?php echo $edid;?>" name="edid" required>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-info">Submit</button>
						</div>
						<p style="margin-top:5px;">Please wait after Submit...</p>
					</form>
				</div>
			</div>
		<br/>
		</div>
		<?php $_SESSION['message3']=null;?>
    </body>
</html>