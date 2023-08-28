<?php 
    require_once "../app/config/config.php";
    require_once "../app/clasess/User.php";
    require_once "../app/clasess/Category.php";
    require_once "../app/clasess/Product.php";
    $user = new User();
    $categories = new Category();
    $categories = $categories->fetch_all();
    if($user->is_logged() && $user->is_admin()):
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $product = new Product();

            $category_id = $_POST['category_id'];
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $product_description = $_POST['product_description'];
            $image = $_POST['photo_path'];
            

           $product->create($category_id,$product_name,$price,$product_description,$image);
            header('location:index.php');
            exit;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <title>Add product</title>
</head>
<body style="background-color: rgba(0,0,0,0.95);">
<div class="container">
    <div class="row justify-content-center">
            <div class="col-lg-5 ">
                <h3 class="text-center py-5 text-light">Enter product</h3>
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="category" class="text-light">Enter category</label>
                        <!-- <input type="text" name="category" id="category" class="form-control"> -->

                        <select name="category_id" class="form-control" id="category_id">
                            <option value="" disabled selected>Select category</option>

                            <?php foreach($categories as $category):?>
                                <option value="<?php echo $category['category_id'];?>"><?php echo $category['category_name'];?></option>
                            <?php endforeach;?>

                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_name" class="text-light">Enter product name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="price" class="text-light">Enter price</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_description" class="text-light">Enter description</label>
                        <input type="text" name="product_description" id="product_description" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <!-- <label for="image" class="text-light">Add image</label> -->
                        <input type="hidden" name="photo_path" id="photoPathInput">
                        <div class="dropzone" id="dropzone-upload" style="border-radius:0.25rem;"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </form>
            </div>
        </div>
    </div>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    Dropzone.options.dropzoneUpload ={
        url: "upload_photo.php",
        paramName: "photo",
        maxFilesize: 20,
        acceptedFiles: "image/*",
        init: function(){
            this.on("success",function(file,response){
                const jsonResponse = JSON.parse(response)
                if(jsonResponse.success){
                    document.getElementById('photoPathInput').value=jsonResponse.photo_path
                }
                else{
                    console.error(jsonResponse.error)
                }
            })
        }
    }
</script>
</body>
</html>
<?php else: 
    header('location:../index.php')    
?>
<?php endif;?>
