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
				<b>Subject or Topic Upload - Admin Panel <?php echo "[ lang - ".$_SESSION['lang']."]"; ?></b>
			</div>
		</header>
		<div class="after_header">
		Upload Subject or Topic
		</div>
		<div class="row">
			<div class="action-sel">
				<div class="row">
					<form class="form" method='post' action="" onsubmit="return post();">
						<div class="form-group">
							<label for="uname">Subject or Topic Name</label>
							<input type="text" class="form-control" id="test_name" placeholder="" name="test_name" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">Number Of Question (Example- 10,50...etc)</label>
							<input type="text" class="form-control" id="no_of_qust" placeholder="" name="no_of_qust" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">Passing Marks (Example- 15,30...etc)</label>
							<input type="text" class="form-control" id="pmarks" placeholder="" name="pmarks" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">Time Limit (in Minutes) (Example- 20,60...etc)</label>
							<input type="text" class="form-control" id="time" placeholder="" name="time" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-info">Submit</button>
						</div>
						<div id="notify">
						Please Wait After 'Submit' ...
					</div>
					</form>
					
				</div>
				
			</div>
		<br/>
		</div>
	    <script type="text/javascript">
		var ic=1;
		function post()
		{
		  var test_name = document.getElementById("test_name").value;
		  var no_of_qust = document.getElementById("no_of_qust").value;
		  var pmarks = document.getElementById("pmarks").value;
		  var time = document.getElementById("time").value;
		  if(test_name && no_of_qust && pmarks && time)
		  {
			$.ajax
			({
			  type: 'post',
			  url: 'insertsub.php',
			  data:
			  {
				 user_test_name:test_name,
				 user_no_of_qust:no_of_qust,
				 user_pmarks:pmarks,
				 user_time:time
			  },
			  success: function () 
			  {
				var nt =  document.getElementById("notify");
				nt.style.color="white";
				nt.style.background="green";
				nt.style.padding="15px";
				nt.innerHTML=" Successfully Uploaded "+ic+" Subject(s)";
				ic=ic+1;
			  }
			});
		  }
		  return false;
		}
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	
	</body>
</html>