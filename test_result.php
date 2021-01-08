<?php
session_start();
$lang=$_SESSION["lang8784"];
require 'db.php';
if(isset($_POST["submit"])){
	$tid=$_POST['tid'];
	$timer=$_POST['timer'];
	$query="select qid,correct,opt1,opt2,opt3,opt4 from test_qust where (tid=$tid and lang='$lang')";
	$result = mysqli_query($conn, $query);
	$query2="select test_name,no_of_qust,pmarks from tests where (tid=$tid and lang='$lang')";
	$result2 = mysqli_query($conn, $query2);
	$row2 = mysqli_fetch_assoc($result2);
	$pmarks=$row2['pmarks'];
	$qcount=0;
	$count=0;
	$wrong=0;
	$skipped=0;
	$i=1;
	while($row = mysqli_fetch_assoc($result)){
		if(!empty($_POST[$row['qid']])){
			if($row['correct']==$_POST[$row['qid']]){
				$qcount=$qcount+1;
				$count=$count+4;
			}else{
				$wrong=$wrong+1;
				$count=$count-1;
			}
		}else{
			$skipped=$skipped+1;
			continue;
		}
	}
	if($count>=$pmarks){
		$bg="lightgreen";
		$st="PASS";
	}
	else{
		$bg="#ff4d4d";
		$st="FAIL";
	}
}else{
	header('location:test_subjects.php');
}
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
			background:white;
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
		.q-box{
			padding:10px;
		}
		.q-box h4{
			padding:20px 20px 20px 20px;
			border:1 px solid green;
			background:#b0ffcd;
			color:black;
			border-radius:5px;
			font-size:20px;
		}
		.q-box ol li{
			padding:5px;
			width:100%;
			border:2px solid rgba(0,0,0,0.2);
			border-radius:10px;
			background: #d1edff;
		}
		.result{
			background:<?php echo $bg;?>;
			padding:20px;
			text-align:center;
			color:#500059;
		}
		.info{
			border:2px solid yellow;
			padding:10px;
		}
		.white-bg{
			background: rgba(255, 255, 255, 0.7);
			width:100%;
			height:70vh;
		}
		</style>
	</head>
    <body>
        <header class="d-flex">
			<div class="header-title">
				<b> <a href="test_subjects.php">&nbsp; <&nbsp;&nbsp;</a> &nbsp;<?php echo $row2['test_name'];?> - Result</b>
			</div>
		</header>
		<div class="result">
			<p>Time Taken - <?php echo $timer;?> </p>
			<p>Marks Obtained - <mark> <?php echo $count;?> / <?php echo 4*$row2['no_of_qust'];?> </mark> <br/>
			Passing Marks - <?php echo $pmarks;?><br/>
			Result - <mark> <?php echo $st;?> </mark> </p>
			<div class="info">
			Correct - <?php echo $qcount;?>,
			Wrong - <?php echo $wrong;?>,
			Skipped - <?php echo $skipped;?>
			</div>	
		</div>
		<div class="anskey">
		
			<?php
			$query="select qid,qust,correct,opt1,opt2,opt3,opt4 from test_qust where (tid=$tid and lang='$lang')";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
				$color1="#d1edff";
				$color2="#d1edff";
				$color3="#d1edff";
				$color4="#d1edff";
				if(!empty($_POST[$row['qid']])){
					if($row['correct']==$_POST[$row['qid']]){
						
					}else{
						if($_POST[$row['qid']]=='a')
							$color1="#ff3838";
						else if($_POST[$row['qid']]=='b')
							$color2="#ff3838";
						else if($_POST[$row['qid']]=='c')
							$color3="#ff3838";
						else
							$color4="#ff3838";
					}
				}else{
					continue;
				}
				if($row['correct']=='a')
							$color1="#7dff81";
						else if($row['correct']=='b')
							$color2="#7dff81";
						else if($row['correct']=='c')
							$color3="#7dff81";
						else
							$color4="#7dff81";
			?>
		
			<div class="q-box">
				<h4><?php echo $i; ?>. <?php echo $row['qust']; ?></h4>
				<hr/>
				<ol type="a">
					<li style="background:<?php echo $color1;?>"><?php echo $row['opt1']; ?></li>
					<br/>
					<li style="background:<?php echo $color2;?>"><?php echo $row['opt2']; ?></li>
					<br/>
					<li style="background:<?php echo $color3;?>"><?php echo $row['opt3']; ?></li>
					<br/>
					<li style="background:<?php echo $color4;?>"><?php echo $row['opt4']; ?></li>
				</ol>
			</div>
			<br/>
			<?php
			$i=$i+1;
			}
			?>
		</div>
	</body>
</html>