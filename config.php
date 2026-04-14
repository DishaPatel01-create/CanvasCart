<?php
$conn = mysqli_connect("localhost", "root", "", "artmart");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>