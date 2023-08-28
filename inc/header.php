<?php 
    require_once "app/config/config.php"; 
    require_once "app/clasess/User.php";
    $user = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9310e1148a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Restaurant</title>
</head>
<body style="background-color: rgba(0,0,0,0.95);">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><span>RESTAURANT</span></h1>
                </div>
                <div class="col-md-6">
                    <div class="right-nav">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li><a href="job.php">job</a></li>
                            <li><a href="menu.php">menu</a></li>
                            <li><a href="contact.php">contact</a></li>
                            <li><a href="reservation.php">Reservation</a></li>
                            <?php if($user->is_admin()):?>
                                <a href="admin/"><i class="fa-solid fa-toolbox" id="admin" class="ic"></i></a>
                            <?php else:?>
                                <a href="#" id="afb"><i class="fa-brands fa-facebook-f" id="fb" class="ic"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram" id="insta" class="ic"></i></a>
                            <?php endif;?> 
                            <?php if($user->is_logged()):?>
                                <a href="logout.php" alt="Logout"><i class="fa-solid fa-right-to-bracket" id="login" class="ic"></i></a>
                            <?php else:?>
                                <a href="login.php" alt="Login"><i class="fa-solid fa-right-to-bracket" id="login" class="ic"></i></a>
                            <?php endif;?>    
                        </ul>
                        <div class="openmenuclas">
                            <i class="fa-solid fa-bars" id="menuopen"></i>
                            <h5 id="closemenus">X</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>