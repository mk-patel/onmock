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
		.after_header{
			width:100%;
			height:auto;
			padding:10px;
			color : white;
			background:#01153b;
			font-size:13px;
		}
		.bottom{
			width:100%;
			height:auto;
			background:#030057;
		}
		.btm-elm{
			font-size:15px;
			padding:15px;
			margin-left:10px;
		}
		.btm-elm a{
			text-decoration:none;
			color:white;
			font-weight:700;
		}
		.last-line{
			font-size:11px;
			color:white;
			padding:15px;
			margin-left:10px;
		}
		.last-line p{
			font-size:14px;
			color:white;
			font-weight:600;
		}
		
		</style>
	</head>
	<body>
        <header class="d-flex">
			<div class="header-title">
				<b> <img src="images/logo.jpg" style="border-radius:50%;" color="white" width="30px" height="30px"> &nbsp;On Mock</b>
			</div>
		</header>
		<div class="after_header">
		Demonstrating and evalvating your skills.
		</div>
		<br/>
		<br/>
        <div class="container">
		<div class="row" style="margin-left:10px;font-weight:700;">
			Suggessions & Feedback
			<br/><br/>
			  </div>

			  <?php
			require 'db.php';
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$title = $mysqli->real_escape_string($_POST['name']);
				$content = $mysqli->real_escape_string($_POST['content']);
				$mobile = $mysqli->real_escape_string($_POST['mobile']);
				$dt2=date("Y-m-d H:i:s");
					
				$sql = "INSERT INTO feedback(name,content,mobile,date)"
								. "VALUES('$title','$content','$mobile','$dt2')";	
				mysqli_query($conn,$sql);
				echo "<br>";
				echo "<center style='color:green;'>Thankyou For Your Feedback.</center>";	
				echo "<br>";
				echo "<br>";echo "<br>";
			}

			?>

			<div class="d-flex justify-content-center">
			<div class="container">
			 <form class="form" action="feedback.php" method="post" enctype="multipart/form-data" autocomplete="off">

			<div class="form-group">
			<label for="text">Your Name :</label>
				<input type="text" class="form-control" id="username" placeholder="Your Name " name="name" required>
			</div>
			<div class="form-group">
			<label for="comment">Feedback / Report :</label>
			  <textarea class="form-control" rows="7" id="comment" name="content" required></textarea>
			</div>

			<div class="form-group">
			<label for="text">Your Mobile Number :</label>
			<input type="text" class="form-control" id="username" placeholder="Mobile Number " name="mobile" required>

			</div>
			  
			<button type="submit" name="submit" class="btn btn-info">Submit</button>

			</form>
			</div>
			</div>
		</div>
		
		<br/>
		<br/>
		<div class="bottom">
            <div class="btm-elm">
                <a href="about.html"><u>About</u></a>
            </div>
            <div class="last-line">
                <br/><br/><br/>
            </div>
        </div>
	</body>
</html>