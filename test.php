<?php
session_start();
$lang=$_SESSION["lang8784"];
require 'db.php';
if(isset($_REQUEST["eid"]))
	$tid=$_REQUEST["eid"];
else
	header('location:test_subjects.php');
$query="select * from test_qust where (tid=$tid and lang='$lang')";
$result = mysqli_query($conn, $query);
$query2="select time,test_name,status from tests where (tid=$tid and lang='$lang')";
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($result2);
if($row2['status']=="locked")
	header('location:test_subjects.php');
$i=1;
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
		.timer{
			width:100%;
			height:auto;
			background:#01153b;
		}
		.timer p{
			padding:20px 0px 5px 0px;
			color : white;
		}
		.form-group{
			padding:10px;
			width:100%;
		}
		.qust{
			padding:20px 20px 20px 20px;
			border:1 px solid green;
			background:#b0ffcd;
			color:black;
			border-radius:5px;
			font-size:20px;
			width:100%;
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
		.q-box ul li{
			padding:5px;
			width:100%;
			border:2px solid rgba(0,0,0,0.2);
			border-radius:10px;
			background: #d1edff;
			list-style-type:none;
		}
		.q-box ul li .radio-st{
			width:30px;
			height:30px;
		}
		.q-box ul li p{
			margin-left:30px;
			margin-top:10px;
		}
		.sub-btn{
			float:right;
			margin-right:30px;
		}
		.qimgc{
			width:100%;
			height:100px;
		}
		</style>
	</head>
    <body>
        <header>
			<div class="header-title">
				<b> <a href="test_subjects.php">&nbsp; <&nbsp;&nbsp;</a> &nbsp; <?php echo $row2['test_name']; ?></b>
			</div>
		</header>
		<div class="d-flex justify-content-center timer">
			<p name="timer" id="demo"></p>
		</div>
		<br/>
		<div class="container">
			<div class="row">
				<form class="form" action="test_result.php" method="POST" onsubmit="return nt();" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" id="demo2" name="timer">
					<?php
						while($row = mysqli_fetch_assoc($result))
						{
					?>
					<div class="q-box">
						<div class="form-group">
							<h4><?php echo $i; ?>. <?php echo $row['qust']; ?>
							<?php
							if(!empty($row['qustimg'])){
								echo "<br/><br/>";
							?>
							<img class="img-thumbnail" src="<?php echo $row['qustimg'];?>">
							<?php
							}
							?>
							</h4>
							<hr/>
							<ul list-style="none">
								<li><input type="radio" class="form-check-input radio-st" name="<?php echo $row['qid']; ?>" value="a" ><p><?php echo $row['opt1']; ?></p></li>
								<br/>
								<li><input type="radio" class="form-check-input radio-st" name="<?php echo $row['qid']; ?>" value="b" ><p><?php echo $row['opt2']; ?></p></li>
								<br/>
								<li><input type="radio" class="form-check-input radio-st" name="<?php echo $row['qid']; ?>" value="c" ><p><?php echo $row['opt3']; ?></p></li>
								<br/>
								<li><input type="radio" class="form-check-input radio-st" name="<?php echo $row['qid']; ?>" value="d" ><p><?php echo $row['opt4']; ?></p></li>
							</ul>
							
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>	
						</div>
					</div>
					<br/>
					<br/>
					<?php
						$i=$i+1;}
					?>
					<hr/>
					<div class="sub-btn">
						<p id="notify">Submit & View Marks</p>
						<input type="hidden" name="tid" value="<?php echo $tid; ?>" >
						<button type="submit" id="submit" name="submit" class="btn btn-success">Submit Test</button>
					</div>
				</form>
			</div>
		</div>
		<br/>
		<br/>
		<script>
			var countDownDate = new Date();
			countDownDate.setMinutes(countDownDate.getMinutes()+<?php echo $row2['time'];?>);
			var x = setInterval(function() {
			  var now = new Date().getTime();
			  var distance = countDownDate - now;
			  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			  if(hours=="0"){
				document.getElementById("demo").innerHTML = minutes + " M : " + seconds + " S ";
			    
			  }
			  else{
				  document.getElementById("demo").innerHTML =  hours + " H : "+ minutes + " M : " + seconds + " S ";
			  }if (distance < 0) {
				clearInterval(x);
				document.getElementById("demo").innerHTML ="Time Up!";
				document.getElementById("demo2").value ="<?php echo $row2['time'];?>";
				document.getElementById('submit').click();
			  }
			}, 1000);
			
			
			
		
        var totalSeconds = 0;
        setInterval(setTime, 1000);

        function setTime()
        {
            ++totalSeconds;
            var sec=pad(totalSeconds%60);
            var min=pad(parseInt(totalSeconds/60));
			document.getElementById("demo2").value = min + " M : " + sec + " S ";
        }

        function pad(val)
        {
            var valString = val + "";
            if(valString.length < 2)
            {
                return "0" + valString;
            }
            else
            {
                return valString;
            }
        }
		function nt(){
		document.getElementById("notify").innerHTML="Loading...Please Wait...";
		var x = document.getElementById("notify");
		x.style.background="darkorange";
		x.style.padding="10px";
		x.style.color="black";
		return true;
		}
		</script>
		<br/>
		<br/>
		<br/>
    </body>
</html>