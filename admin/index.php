<?php
include_once '../config/koneksi.php';
include_once 'cek_login.php';
session_start();
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Sistem Pendukung Keputusan Pemilihan Laptop </title>
        <link rel="shortcut icon" href="img/3.png"/>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic,300' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animated.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
   
        <header>
            <div id="sticker" class="header-area">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                    
                        <a class="navbar-brand page-scroll" href="#index.php"><img src="img/daaa.png" alt="" style="width: 70px; height: 70px"></a>
                     
                             
                     
                            </div>
                               
                               
                    
                        </div>
                    </nav>
                </div>
            </div>
       
            <div id="reviews" class="Reviews-area">
                    <div class="head-overly"></div>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                            <div class="Reviews-content" style="margin-top:465px" style="margin-left:20px">
                                
                        
            </header>
           
    
          <!--layout-->
<?php if(isset($_SESSION['isAdmin'])!=TRUE){
    echo '<h1></h1>';
    if(isset($_POST['login'])){
        isError($error);
    }
    echo ' <div class="login-form">
    <b class="text">Sistem Pendukung Keputusan</b>
    <b class="text1">Pemilihan Smartphone Metode TOPSIS</b>
        <h1 class="cd-headline clip is-full-width">
                <span class="cd-words-wrapper">
                    <b class="is-visible" >Welcome, Administrator</b>
                    </span>
            </h1>
        
                       <h2>Silahkan login terlebih dahulu</h2>
                       <form method="POST" action="index.php">
    <div class="form-group " >
      <input type="text" class="form-control" name="username" placeholder="Username " required autocomplete="off" >'. isvalid("username",$msg,$error).'
      <i class="fa fa-user"></i>
    </div>
    <div class="form-group log-status">
      <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="off">'. isvalid("password",$msg,$error).'
      <i class="fa fa-lock"></i>
    </div>
     <span class="alert">Invalid Credentials</span>
   
   <input type="checkbox" name="remember" id="remember"</input>
   <label for="remember">Remember me</label>
    <button type="submit" class="log-btn" name="login">Log in</button>
</form>
  </div>
                 
</div>
          
';
}      
else{
    ?>
    <script>window.location.href="dashboard.php"</script>
<?php } ?>
                        
                                    
    </body> 
    <script src="js/vendor/jquery-1.12.4.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/owl.carousel.min.js"></script>

    <script src="js/easing.js"></script>
    
    <script src="js/jquery.appear.js"></script>

    <script src="js/animated.js"></script>

    <script src="js/jquery.mixitup.min.js"></script>

    <script src="js/wow.min.js"></script>
  
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.js"></script>

    <script src="js/plugins.js"></script>

    <script src="js/main.js"></script>
    
</html>         