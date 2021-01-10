<?php
$exist=false;
    $insertStatus=false;
    $cpass_pass_error=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include"db_connect.php";
 
    $user=$_POST["user"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $existsql="select * from institution where username='$user'";
    $existresult=mysqli_query($con,$existsql);
    $num=mysqli_num_rows($existresult);
    if($num>0){
        $exist=true;
    }
    else{
    if($password==$cpassword){
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO `bteinstitution`.`institution` (`Sno`, `username`, `password`, `date`) VALUES (NULL, '$user', '$hash', CURRENT_TIMESTAMP)";
        $result=mysqli_query($con,$sql);
        
        if($result){
            $insertStatus=true;
        }
    } 
    else{
        $cpass_pass_error=true;
    }
}
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <title>signup!</title>
</head>

<body>
    <!---------------------------- navbar ----------------------------------------->
    <?php require"bootstrapnav.php"  ?>
    <?php 
    
    if($insertStatus){
   echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Congrats!</strong> You are successfully signup.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
    }
    if($cpass_pass_error){
   echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Error!</strong> Password and Confirm password is not match try again.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
    }
    if($exist){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>User already exist.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
         }
    ?>
    <div class="container my-5">
        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label for="user" class="form-label">Email address</label>
                <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>