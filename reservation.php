<?php 
require_once 'inc/header.php';
require_once "app/clasess/Reservation.php";
require_once "app/clasess/User.php";

$user = new User();
if(!$user->is_logged()){
    header('location: login.php');
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $persons = $_POST['persons'];
    $reservation_note = $_POST['reservation_note'];
    $reservation_name = $_POST['reservation_name'];
    $user_id = $_SESSION['user_id'];
    $reservation = new Reservation();
    $reservation->create($user_id,$reservation_date,$reservation_time,$persons,$reservation_note,$reservation_name);
    // var_dump($user_id,$reservation_date,$reservation_time,$persons,$reservation_note);
}
?>
<br><br>
<br><br>

    <div class="container">
    <div class="row justify-content-center">
            <div class="col-lg-5 ">
                <h3 class="text-center py-5 text-light">Make reservation</h3>
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="reservation_date" class="text-light">Enter Date</label>
                        <input type="date" name="reservation_date" value="Enter date" id="reservation_date" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="reservation_time" class="text-light">Enter Time</label>
                        <input type="time" name="reservation_time" id="reservation_time" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="persons" class="text-light">For how many persons...</label>
                        <input type="text" name="persons" id="persons" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="reservation_note" class="text-light">Enter note</label>
                        <input type="text" name="reservation_note" id="reservation_note" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="reservation_name" class="text-light">Reservation is for...</label>
                        <input type="text" name="reservation_name" id="reservation_name" class="form-control">
                    </div>
                    <button type="submit" id="aposao">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <br><br>
<br><br><br><br>
<br><br><br><br>

<?php require_once 'inc/footer.php';?>