<?php
session_start();
require 'db.php';
$user=$_SESSION["username"];
$password=$_SESSION["password"];
$lang=$_SESSION['lang'];
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
<?php
if (isset($_POST['user_test_name'])){
    $test_name = $mysqli->real_escape_string($_POST['user_test_name']);
    $no_of_qust = $mysqli->real_escape_string($_POST['user_no_of_qust']);
    $pmarks = $mysqli->real_escape_string($_POST['user_pmarks']);
    $time = $mysqli->real_escape_string($_POST['user_time']);
	$status="locked";
    date_default_timezone_set('Asia/Calcutta');
	$date=date("d M Y, h:i A");
    $query = "insert into tests (test_name,no_of_qust,pmarks,time,date,lang,status) values('$test_name','$no_of_qust','$pmarks','$time','$date','$lang','$status')";
	mysqli_query($conn, $query);
}
?>