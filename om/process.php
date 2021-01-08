<?php
require 'db.php';
if(isset($_POST["submit"]))
{
	$unn = mysqli_real_escape_string($conn, $_POST['username']);
    $un = trim($unn);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);
	if(empty($un) || empty($pwd)){
        echo "<br>";
        echo "<center style='color:red;font-weight:700;'>Username And Password Is Empty !! </center>";
        echo "<br>";
	}
	else{
		$sql="SELECT * FROM users WHERE username='$un'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			echo "<br>";
            echo "<center style='color:red;font-weight:700;'>Invalid Login ! </center>";
            echo "<br>";
		}
		else{
            $row = mysqli_fetch_assoc($result);
			if($pwd !== $row["password"]){
					echo "<br>";
                    echo "<center style='color:red;font-weight:700;'> Wrong Password !! </center>";
                    echo "<br>";
				}
				else if($pwd == $row["password"]){
					session_start();
					$_SESSION["username"] = $row["username"];
					$_SESSION["password"] = $row["password"];
					header("Location: adminlang.php");
				}
				else{
					echo "<br>";
                    echo "<center style='color:red;font-weight:700;'> Password Not Matched !! </center>";
                    echo "<br>";
				}
			}
			
		}
}
else{
    echo "<br>";
    echo "<center style='color:red;font-weight:700;'>Please Login !!! </center>";
    echo "<br>";
}

?>