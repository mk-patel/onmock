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
if (isset($_POST['user_qust'])){
    $qust = $_POST['user_qust'];
    $opt1 = $_POST['user_opt1'];
	$opt2 = $_POST['user_opt2'];
	$opt3 = $_POST['user_opt3'];
	$opt4 = $_POST['user_opt4'];
    $correct = $_POST['user_correct'];
    $tid = $_POST['user_tid'];
	
	$query2="select no_of_qust from tests where tid=$tid";
	$query1="select count(qid) from test_qust where tid=$tid";
	$result2 = mysqli_query($conn, $query2);
	$result1 = mysqli_query($conn, $query1);
	$row2 = mysqli_fetch_assoc($result2);
	$row1 = mysqli_fetch_assoc($result1);
	if($row1['count(qid)']<$row2['no_of_qust']){
		$query = "insert into test_qust (qust,opt1,opt2,opt3,opt4,correct,tid,lang) values('$qust','$opt1','$opt2','$opt3','$opt4','$correct','$tid','$lang')";
		mysqli_query($conn, $query);
	}
}
?>