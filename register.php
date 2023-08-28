<?php 
    require_once "app/config/config.php";
    require_once "app/clasess/User.php";
    $user = new User();
    if($user->is_logged()){
        header('location:reservation.php');
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $created = $user->create($first_name,$last_name,$username,$phone_number,$email,$password);

        if($created){
            $_SESSION['message']['type'] = "success";
            $_SESSION['message']['text'] = "Successfully registred.";
            header('location:reservation.php');
            exit;
        }
        else{
            $_SESSION['message']['type'] = "danger";
            $_SESSION['message']['text'] = "Error.";
            header('location:register.php');
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>
    <div class="container">
<h1 class="mt-5 mb-3">Registration</h1>
    <form action="" method="post">
        <div class="form-group mb-3">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="phone_number">Phone number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <a href="login.php">Login?</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>