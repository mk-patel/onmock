<?php

$conn = mysqli_connect("localhost", "root", "", "onmock_8784");
$mysqli = new mysqli("localhost", "root", "", "onmock_8784");

if(!$conn){
    die("Connection Failed, Please Try Again !!".mysqli_connect_error());
}

?>