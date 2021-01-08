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
if(isset($_REQUEST["eid"]))
	$tid=$_REQUEST["eid"];
else
	header('location:subtoqust.php');
$query2="select test_name,no_of_qust from tests where tid=$tid";
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($result2);
$test_name=$row2['test_name'];
$msg="Upload Question to - $test_name ";

if(empty($_SESSION['message4'])){
		$msg="Upload Questions With Image";
	}
	else{
		$msg = $_SESSION['message4'];
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
		.form{
			width:100%;
		}
		</style>
	</head>
    <body class="bg">
        <header class="d-flex">
			<div class="header-title">
				<b>Question Upload With Image - Admin Panel <?php echo "[ lang - ".$_SESSION['lang']."]"; ?></b>
			</div>
		</header>
		<div class="after_header">
		<?php echo $msg ;?>
		</div>
		<div class="row">
			<div class="action-sel">
				<div class="row">
					<form class="form" method="Post" action="insertqustimg.php"  onsubmit="return nt();" enctype="multipart/form-data">
						<div class="form-group">
							<label for="uname">Question</label>
							<textarea rows="3" class="form-control" id="qust" name="qust" required></textarea>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="file">Question Image :</label>
							<input type="file" class="form-control" id="file" name="qustimg" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">(a)</label>
							<input type="text" class="form-control" id="opt1" placeholder="" name="opt1" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">(b)</label>
							<input type="text" class="form-control" id="opt2" placeholder="" name="opt2" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">(c)</label>
							<input type="text" class="form-control" id="opt3" placeholder="" name="opt3" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<div class="form-group">
							<label for="uname">(d)</label>
							<input type="text" class="form-control" id="opt4" placeholder="" name="opt4" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<div class="form-group">
							<label for="uname">Correct option is</label>
							<select class="custom-select" id="correct" name="correct" required>
								<option value="a">a</option>
								<option value="b">b</option>
								<option value="c">c</option>
								<option value="d">d</option>
							</select>
							<input type="hidden" class="form-control" value="<?php echo $tid;?>" id="tid" name="tid" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<div class="form-group">
							<button type="submit" id="submit" name="submit" class="btn btn-info">Submit</button>
						</div>
						<br/>
						<p id="notify" style="margin-top:5px;">Please wait after Submit...</p>
						<br/>
					</form>
				</div>
			</div>
		
		</div>
		<br/>
		<br/>
		<br/>
		<?php
		$_SESSION['message4']=null;
		?>
	<script>
		function nt(){
		document.getElementById("notify").innerHTML="Uploading...";
		var x = document.getElementById("notify");
		x.style.background="red";
		x.style.padding="20px";
		x.style.color="white";
		return true;
		}
	</script>
	</body>
</html>