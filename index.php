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
			padding:10px;
			color : white;
			background:#01153b;
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
		}
		.language-sel{
			background: rgba(255, 255, 255, 0.7);
			width:100%;
			height:70vh;
			padding:50px 10px 10px 10px;
			text-align:center;
		}
		.language-sel h3{
			font-size:23;
			color:#01153b;
		}
		.choose-lang{
			height:100px;
		}
		.choose-lang a{
			text-align:center;
			padding:10px 50px 10px 50px;
			border:2px solid black;
			border-radius:9px;
			color:white;
			background:#01153b;
		}
		@media screen and (max-width:575px){
			.after_header{
				font-size:13px;
			}
		}
		</style>
	</head>
    <body class="bg">
        <header class="d-flex">
			<div class="header-title">
				<b> <img src="images/logo.jpg" style="border-radius:50%;" color="white" width="30px" height="30px"> &nbsp;On Mock</b>
			</div>
		</header>
		<div id="notify" class="after_header">
		Demonstrating and evaluating your skills.
		</div>
		<div class="language-sel">
			<h3>Choose Language</h3>
			<br/>
			<br/>
			<div class="choose-lang">
				<a href="test_note.php?lang=en" onclick="return nt();">English</a>
			</div>
			<div class="choose-lang">
				<a href="test_note.php?lang=hi" onclick="return nt1();">Hindi</a>
			</div>
		</div>
        <div class="bottom">
            <div class="btm-elm">
                <a href="feedback.php"><u>Suggessions & Feedback</u></a> &nbsp;|&nbsp; <a href="about.html"><u>About</u></a> &nbsp;|&nbsp; <a href="privacypolicy.html"><u>Privacy Policy</u></a>
            </div>
            <div class="last-line">
				<p>All the concepts, ideas, way of presentation, contents & 
				images are written & provided by the <b style="color:darkorange">Owner</b> Mr. <b style="color:darkorange">Ravi Patel</b> <br/>
				Contact no. 6267221568, <br/>Email - ravipatel121999@gmail.com</p>
			<br/>
			<br/>
            </div>
        </div>
    <script>
		function nt(){
		document.getElementById("notify").innerHTML="Loading...";
		var x = document.getElementById("notify");
		x.style.background="lightgreen";
		x.style.padding="10px";
		x.style.color="black";
		return true;
		}
		function nt1(){
		document.getElementById("notify").innerHTML="Loading...";
		var x = document.getElementById("notify");
		x.style.background="lightgreen";
		x.style.padding="10px";
		x.style.color="black";
		return true;
		}
	</script>
	</body>
</html>