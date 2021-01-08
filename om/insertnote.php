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
    $note_name = $mysqli->real_escape_string($_POST['note_name']);
    $pdf_file = $mysqli->real_escape_string($_POST['pdf_file']);
    $descr = $mysqli->real_escape_string($_POST['descr']);
    date_default_timezone_set('Asia/Calcutta');
	$date=date("d-m-Y h:i:s A");
	
	
         
	$fileName = $_FILES['pdf_file']['name'];
	$fileTmpName = $_FILES['pdf_file']['tmp_name'];
	$fileSize = $_FILES['pdf_file']['size'];
	$fileError = $_FILES['pdf_file']['error'];
	$fileType = $_FILES['pdf_file']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = 'pdf';
	
	if($fileActualExt == $allowed){
		if($fileError === 0){
			$fileNameNew = uniqid('', true).".".$fileActualExt;
			$fileDestination ='pfiles/'.$fileNameNew;
			$fileDestinatio ='../pfiles/'.$fileNameNew;
			move_uploaded_file($fileTmpName, $fileDestinatio);
		}
	}
	
	
    $query = "insert into notes (note_name,pdf_file,descr,date,lang) values('$note_name','$fileDestination','$descr','$date','$lang')";
	mysqli_query($conn, $query);
	$_SESSION['message'] = "Successfully Uploaded.";
	header('location:notesec.php');
}else{
    $_SESSION['message'] = "Sorry! Something Went Wrong. Please Try Again...";
}
?>