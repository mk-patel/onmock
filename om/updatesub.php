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
?>
<?php
if (isset($_POST['submit'])){
    $test_name = $mysqli->real_escape_string($_POST['test_name']);
    $no_of_qust = $mysqli->real_escape_string($_POST['no_of_qust']);
    $pmarks = $mysqli->real_escape_string($_POST['pmarks']);
    $time = $mysqli->real_escape_string($_POST['time']);
	$edid = $mysqli->real_escape_string($_POST['edid']);
    date_default_timezone_set('Asia/Calcutta');
	$date=date("d M Y, h:i A");
    $query = "update tests set test_name='$test_name',no_of_qust='$no_of_qust',pmarks='$pmarks',time='$time',date='$date' where (tid='$edid' and lang='$lang')";
	mysqli_query($conn, $query);
	$_SESSION['message3'] = "Updated Successfully.";
	header('location:modifysub.php');
}else{
    $_SESSION['message3'] = "Sorry! Something Went Wrong. Please Try Again...";
}
?>