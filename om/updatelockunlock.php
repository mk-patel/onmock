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
if(isset($_REQUEST["tid"]) && isset($_REQUEST["eid"])){
	$tid=$_REQUEST["tid"];
	$eid=$_REQUEST["eid"];
}
else
	header('location:testsec.php');
$query2="update tests set status='$eid' where tid=$tid";
mysqli_query($conn, $query2);
header('location:lockunlock.php');
?>
