<?php 
session_start();
session_destroy();
$title="LOGIN";
require_once ("header2.php");
?>
<link rel="stylesheet" href="css/insc.css">

<div class="container h-100">

<h1 class="text-center text-default"> Inscription </h1><hr class="col-4">
<div class="box">
<!---formulaire-->
<form  action="../controller/inscription_controll.php" class="" method="POST"><br>
<div class="row">
<div class="container  h-200">
<div class="container ">
     <!----inscription administrateur---->
      
        <div class="col_lg_3"></div>
    <div class="col-lg-6 admin jumbotron l-200">
    <h2>COMPTE ADMIN</h2>
            <div class="inputBox">
                <input type="text" name="email" id="email">
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="mdpp" id="mdpp">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">forget password</a>
                <a href="#">Signup</a>
            </div>
            <input type="submit" name="bouton" value="connexion" class="btn-danger">
    </div>
    </div>
</div></div>
</form>
</div></div>