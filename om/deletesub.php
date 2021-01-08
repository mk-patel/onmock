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
if(isset($_REQUEST["delid"]))
	$delid=$_REQUEST["delid"];
else
	header('location:modifysub.php');
	
	$query="delete from tests where (tid=$delid and lang='$lang')";
	mysqli_query($conn, $query);
	$query="delete from test_qust where (tid=$delid and lang='$lang')";
	mysqli_query($conn, $query);
	header('location:modifysub.php');
?>