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
if(isset($_REQUEST["edid"]))
	$edid=$_REQUEST["edid"];
else
	header('location:subtoqust.php');
$query="select * from test_qust where qid=$edid";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
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
		.form{
			width:100%;
		}
		</style>
	</head>
    <body class="bg">
        <header class="d-flex">
			<div class="header-title">
				<b>Edit Question - Admin Panel <?php echo "[ lang - ".$_SESSION['lang']."]"; ?></b>
			</div>
		</header>
		<div class="after_header">
		Edit qustion
		</div>
		<div class="row">
			<div class="action-sel">
				<div class="row">
					<form class="form" method='post' action="" onsubmit="return post();">
						<div class="form-group">
							<label for="uname">Question</label>
							<textarea rows="3" class="form-control" id="qust" name="qust" required><?php echo $row['qust'];?></textarea>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">(a)</label>
							<input type="text" class="form-control" id="opt1" value="<?php echo $row['opt1'];?>" name="opt1" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">(b)</label>
							<input type="text" class="form-control" id="opt2" value="<?php echo $row['opt2'];?>" name="opt2" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">(c)</label>
							<input type="text" class="form-control" id="opt3" value="<?php echo $row['opt3'];?>" name="opt3" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<div class="form-group">
							<label for="uname">(d)</label>
							<input type="text" class="form-control" id="opt4" value="<?php echo $row['opt4'];?>" name="opt4" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<div class="form-group">
							<label for="uname">Correct option is</label>
							<select class="custom-select" id="correct" name="correct" required>
								<option selected value="<?php echo $row['correct'];?>"><?php echo $row['correct'];?></option>
								<option value="a">a</option>
								<option value="b">b</option>
								<option value="c">c</option>
								<option value="d">d</option>
							</select>
							<input type="hidden" class="form-control" value="<?php echo $row['qid'];?>" id="qid" name="qid" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<div class="form-group">
							<button type="submit" id="submit" name="submit" class="btn btn-info">Submit</button>
						</div>
					</form>
					<div id="notify">
						Please Wait After 'Submit' ...
					</div>
				</div>
			</div>
		<br/>
		</div>
    <script type="text/javascript">
		function post()
		{
		  var qust = document.getElementById("qust").value;
		  var opt1 = document.getElementById("opt1").value;
		  var opt2 = document.getElementById("opt2").value;
		  var opt3 = document.getElementById("opt3").value;
		  var opt4 = document.getElementById("opt4").value;
		  var correct = document.getElementById("correct").value;
		  var qid = document.getElementById("qid").value;
		  if(qust && opt1 && opt2 && opt3 && opt4 && correct && qid)
		  {
			$.ajax
			({
			  type: 'post',
			  url: 'updatequst.php',
			  data:
			  {
				 user_qust:qust,
				 user_opt1:opt1,
				 user_opt2:opt2,
				 user_opt3:opt3,
				 user_opt4:opt4,
				 user_correct:correct,
				 user_qid:qid
			  },
			  success: function () 
			  {
				var nt =  document.getElementById("notify");
				nt.style.color="white";
				nt.style.background="green";
				nt.style.padding="15px";
				nt.innerHTML=" Updated Successfully ";
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