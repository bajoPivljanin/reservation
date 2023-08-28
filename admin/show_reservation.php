<?php 
require_once "../app/config/config.php";
require_once "../app/clasess/Reservation.php";
require_once "../app/clasess/User.php";

$user = new User();
if($user->is_logged() && $user->is_admin()):
    $reservation = new Reservation();
    $reservation = $reservation->show_reservation($_GET['reservation_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h3 class="text-center py-5">Reservation</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Reservation ID</th>
                <th scope="col" class="text-center">Reservation name</th>
                <th scope="col" class="text-center">First name</th>
                <th scope="col" class="text-center">Last name</th>
                <th scope="col" class="text-center">Phone number</th>
                <th scope="col" class="text-center">Date</th>
                <th scope="col" class="text-center">Time</th>
                <th scope="col" class="text-center">Note</th>
                <th scope="col" class="text-center">Persons</th>
                <th scope="col" class="text-center">Created At</th>
                <th scope="col" class="text-center">Print</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <th scope="row" class="text-center"><?php echo $reservation['reservation_id'];?></th>
                    <td class="text-center"><?php echo $reservation['reservation_name'];?></td>
                    <td class="text-center"><?php echo $reservation['first_name'];?></td>
                    <td class="text-center"><?php echo $reservation['last_name'];?></td>
                    <td class="text-center"><?php echo $reservation['phone_number'];?></td>
                    <td class="text-center"><?php echo $reservation['reservation_date'];?></td>
                    <td class="text-center"><?php echo $reservation['reservation_time'];?></td>
                    <td class="text-center"><?php echo $reservation['reservation_note'];?></td>
                    <td class="text-center"><?php echo $reservation['persons'];?></td>
                    <td class="text-center"><?php echo $reservation['created_at'];?></td>
                    <td class="text-center">
                        <a href="export.php?reservation_id=<?php echo $reservation['reservation_id'];?>" class="btn btn-success btn-sm">Print</a>
                    </td>
                </tr>
        </tbody>
    </table>
    </div>    




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<?php else: 
    header('location:../reservation.php')    
?>
<?php endif;?>
