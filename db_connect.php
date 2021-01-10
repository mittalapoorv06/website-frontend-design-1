<?php
$username="root";
$servername="localhost";
$pass="";
$database="bteinstitution";
$con=mysqli_connect($servername,$username,$pass,$database);
if(!$con){
    die("Error".mysqli_connect_error());
}

?>