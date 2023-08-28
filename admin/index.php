<?php 
    require_once "../app/config/config.php";
    require_once "../app/clasess/Reservation.php";
    require_once "../app/clasess/Product.php";
    require_once "../app/clasess/Category.php";
    require_once "../app/clasess/User.php";
    $user = new User();
    if($user->is_logged() && $user->is_admin()):
        $reservations = new Reservation();
        $reservations = $reservations->fetch_all();
        $products = new Product();
        $products =  $products->fetch_all();
        $categories = new Category();
        $categories = $categories->fetch_all();

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin page</title>
</head>
<body style="background-color: rgba(0,0,0,0.95);color:white;">
    <a href="add_product.php" style="margin:10px 10px ;" class="btn btn-danger">Add product</a>
    <div class="container">
        <h3 class="text-center py-5">All reservations</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-light">Reservation ID</th>
                <th scope="col" class="text-center text-light">Reservation Name</th>
                <th scope="col" class="text-center text-light">User ID</th>
                <th scope="col" class="text-center text-light">Reservation Date</th>
                <th scope="col" class="text-center text-light">Reservation Time</th>
                <th scope="col" class="text-center text-light">Persons</th>
                <th scope="col" class="text-center text-light">Created At</th>
                <th scope="col" class="text-center text-light">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($reservations as $reservation):?>
                <tr>
                    <th scope="row " class="text-light"><?php echo $reservation['reservation_id'];?></th>
                    <td class="text-center text-light"><?php echo $reservation['reservation_name'];?></td>
                    <td class="text-center text-light"><?php echo $reservation['user_id'];?></td>
                    <td class="text-center text-light"><?php echo $reservation['reservation_date'];?></td>
                    <td class="text-center text-light"><?php echo $reservation['reservation_time'];?></td>
                    <td class="text-center text-light"><?php echo $reservation['persons'];?></td>
                    <td class="text-center text-light"><?php echo $reservation['created_at'];?></td>
                    <td class="text-center text-light">
                        <a href="show_reservation.php?reservation_id=<?= $reservation['reservation_id']; ?>" class="btn btn-success">Show</a>
                        <a href="delete_reservation.php?reservation_id=<?= $reservation['reservation_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
    <div class="container">
        <h3 class="text-center py-5">All products</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-light">Product ID</th>
                <th scope="col" class="text-center text-light">Category</th>
                <th scope="col" class="text-center text-light">Product name</th>
                <th scope="col" class="text-center text-light">Price</th>
                <th scope="col" class="text-center text-light">Product description</th>
                <th scope="col" class="text-center text-light">Image</th>
                <th scope="col" class="text-center text-light">Created At</th>
                <th scope="col" class="text-center text-light">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product):?>
                <tr>
                    <th scope="row" class="text-light"><?php echo $product['product_id'];?></th>
                    <td class="text-center text-light"><?php echo $product['category_name'];?></td>
                    <td class="text-center text-light"><?php echo $product['product_name'];?></td>
                    <td class="text-center text-light"><?php echo $product['price'];?></td>
                    <td class="text-center text-light"><?php echo $product['product_description'];?></td>
                    <td class="text-center text-light"><?php echo $product['image'];?></td>
                    <td class="text-center text-light"><?php echo $product['created_at'];?></td>
                    <td class="text-center text-light">
                        <a href="edit_product.php?product_id=<?= $product['product_id'] ?>" class="btn btn-success">Edit??</a>
                        <a href="delete_product.php?product_id=<?= $product['product_id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
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
