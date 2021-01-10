<?php 

$loginbutton=false;
if(isset($_SESSION["logedin"]) && $_SESSION["logedin"]==true){
    $loginbutton=true;
}
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/website/index1.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONTACT US</a>
            </li>

        </ul>
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/website/signup.php">SIGNUP</a>
                </li>';
                if($loginbutton){
              echo'<li class="nav-item">
                    <a class="nav-link active" href="/website/logout.php">LOGOUT</a>
                </li>
            </ul>
        </div>

    </div>';
}
echo'</div>
</nav>';
?>