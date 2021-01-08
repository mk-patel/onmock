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
if(empty($_SESSION['message'])){
		$msg="Upload Notes";
	}
	else{
		$msg = $_SESSION['message'];
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
		.note-sel{
			background: rgba(255, 255, 255, 0.7);
			width:100%;
			height:auto;
			padding:50px 20px 20px 20px;
			text-align:center;
		}
		.note-sub{
			height:auto;
			border-radius:9px;
			color:black;
			background:#dbfdff;
			text-align:center;
			border:2px solid grey;
		}
		.note-sub a{
			padding:10px;
			color:black;
		}
		.note-sub a p{
			color:grey;
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
				<b>Notes Section - Admin Panel <?php echo "[ lang - ".$_SESSION['lang']."]"; ?></b>
			</div>
		</header>
		<div class="after_header">
		<?php echo $msg ;?>
		</div>
		<div class="row">
			<div class="action-sel">
				<div class="row">
				
					<form class="form" action="insertnote.php" method="POST" onsubmit="return nt();" enctype="multipart/form-data" autocomplete="on">
						<div class="form-group">
							<label for="uname">Title</label>
							<input type="text" class="form-control" id="uname" placeholder="" name="note_name" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">Note Description</label>
							<input type="text" class="form-control" id="uname" placeholder="" name="descr" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						 <div class="form-group">
							<label for="uname">Upload PDF</label>
							<input type="file" class="form-control" id="uname" placeholder="" name="pdf_file" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						 </div>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-info">Submit</button>
						</div>
						<p id="notify" style="margin-top:5px;">Please wait after Submit...</p>
					</form>
				</div>
			</div>
		<br/>
		</div>
		<?php $_SESSION['message']=null; ?>
    
	<?php 

	$query="select * from notes where lang='$lang' order by nid desc";
	$result = mysqli_query($conn, $query);
	?>
	<div class="row">
			<div class="note-sel">
			<?php
				while($row = mysqli_fetch_assoc($result))
				{
			?>
			<div class="note-sub">
				
				<h4><?php echo $row['note_name'];?></h4>
				<p><?php echo $row['descr'];?>,
				 Date - <?php echo $row['date'];?></p>
				 <a href="deletenote.php?delid=<?php echo $row['nid'];?>">Delete Note</a>
			</div>
			<br/>
			<?php
				}
			?>
		</div>
		<br/>
	</div>
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