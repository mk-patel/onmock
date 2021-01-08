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
?>
<?php
if (isset($_POST['user_qust'])){
    $qust = $_POST['user_qust'];
    $opt1 = $_POST['user_opt1'];
	$opt2 = $_POST['user_opt2'];
	$opt3 = $_POST['user_opt3'];
	$opt4 = $_POST['user_opt4'];
    $correct = $_POST['user_correct'];
    $qid = $_POST['user_qid'];
    $query = "update test_qust set qust='$qust',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',correct='$correct' where qid='$qid'";
	mysqli_query($conn, $query);
}
?>