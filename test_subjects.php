<?php
session_start();
$lang=$_SESSION["lang8784"];
require 'db.php';
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
		.test-sel{
			width:100%;
			height:auto;
			padding:50px 20px 20px 20px;
			text-align:center;
		}
		.test-sub{
			height:auto;
			border-radius:9px;
			color:black;
			background:#dbfdff;
			text-align:center;
			border:5px solid lightblue;
			padding:5px;
		}
		.test-sub a{
			padding:10px;
			color:black;
		}
		.test-sub a p{
			color:grey;
		}
		.tstid{
			font-size:16px;
		}
		</style>
	</head>
    <body>
        <header class="d-flex">
			<div class="header-title">
				<b> <a href="test_note.php">&nbsp; <&nbsp;&nbsp;</a> &nbsp;Take Test</b>
			</div>
		</header>
		<div class="test-sel">
			<?php
				while($row = mysqli_fetch_assoc($result))
				{	$tid=$row['tid'];
					$url="test.php?eid=$tid";
					if($row['status']=="locked"){
						$wrn="Locked<br/>";
						$url="#";
						$bg="#fffbc9";
						$hidelock="#";
					}
					else if($row['status']=="unlocked"){
						$bg="#7dff8";
						$hidelock="display:none;";
						
					}
			?>
			<div class="test-sub" style="background:<?php echo $bg;?>">
				<a href="<?php echo $url;?>">
				<h4><span class="tstid">(TestID - <?php echo $row['tid'];?>)</span> <br/><b><?php echo $row['test_name'];?></b></h4>
				<p><?php echo $row['no_of_qust'];?> Questions | <?php echo $row['pmarks'];?> Passing Marks<br/>
				Time Limit - <?php echo $row['time'];?> Minutes <br/> <b><?php echo $row['date'];?></b></p></a>
			<p style="<?php echo $hidelock;?>"><b>Status - <?php echo $wrn;?></b></p>
			</div>
			<br/>
			<?php
				}
			?>
		</div>
		<br/>
		<br/>
		<br/>
    </body>
</html>