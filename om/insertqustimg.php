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
    $qust = $_POST['qust'];
    $opt1 = $_POST['opt1'];
	$opt2 = $_POST['opt2'];
	$opt3 = $_POST['opt3'];
	$opt4 = $_POST['opt4'];
    $correct = $_POST['correct'];
    $tid = $_POST['tid'];
	
	$file = $_FILES['qustimg'];
	$fileName = $_FILES['qustimg']['name'];
	$fileTmpName = $_FILES['qustimg']['tmp_name'];
	$fileSize = $_FILES['qustimg']['size'];
	$fileError = $_FILES['qustimg']['error'];
	$fileType = $_FILES['qustimg']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'png', 'jpeg','gif');

	if(in_array($fileActualExt, $allowed)){
	 if($fileError === 0){
		 if($fileSize <8624616){
			$fileNameNew = uniqid('', true).".".$fileActualExt;
		   $ext = pathinfo($fileName, PATHINFO_EXTENSION);
			if($ext == "png" || $ext == "PNG"  || 
			   $ext == "jpg" || $ext == "ipeg" || 
			   $ext == "JPG" || $ext == "JPEG" ||
			   $ext == "gif" || $ext == "GIF"
			)
			if($ext == "jpg" ||$ext == "JPG" || $ext == "jpeg" || $ext == "JPEG")
			{
				$src = imagecreatefromjpeg($fileTmpName);
			}
			if($ext == "png" ||$ext == "PNG")
			{
				$src = imagecreatefrompng($fileTmpName);
			}
			if($ext == "gif" ||$ext == "GIF")
			{
				$src = imagecreatefromgif($fileTmpName);
			}
			
			list($width_min,$height_min) = getimagesize($fileTmpName);
			$newwidth_min=350;
			$newheight_min = ($height_min / $width_min)*$newwidth_min;
			$tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);
			imagecopyresampled($tmp_min, $src, 0,0,0,0,$newwidth_min, $newheight_min, $width_min , $height_min);
			$fileDestinatio  =  imagejpeg($tmp_min,"../qustimages/".$fileNameNew,90);
			$fileDestination ='qustimages/'.$fileNameNew;
		
			move_uploaded_file($fileTmpName, $fileDestinatio);

			$query2="select no_of_qust from tests where tid=$tid";
			$query1="select count(qid) from test_qust where tid=$tid";
			$result2 = mysqli_query($conn, $query2);
			$result1 = mysqli_query($conn, $query1);
			$row2 = mysqli_fetch_assoc($result2);
			$row1 = mysqli_fetch_assoc($result1);
	
	
			if($row1['count(qid)']<$row2['no_of_qust']){
				
				$query = "insert into test_qust (qust,opt1,opt2,opt3,opt4,correct,tid,lang,qustimg) values('$qust','$opt1','$opt2','$opt3','$opt4','$correct','$tid','$lang','$fileDestination')";
				mysqli_query($conn, $query);
				$_SESSION['message4'] = "Successfully Upload Question With Image.";
				header('location:qustaddimg.php');
			}
			else{
				$_SESSION['message4'] = "Sorry! Something Went Wrong.";
			}
		}else{
			 $_SESSION['message4'] = "Too Big Image, Please Upload Image Under 600kb Size.";
		}
	}else{
		$_SESSION['message4'] = "Sorry! Something Went Wrong, Please Try Again";
	}
}else{
	$_SESSION['message4'] = "Warning ! You can not upload of this type of file.";
}
}
?>



