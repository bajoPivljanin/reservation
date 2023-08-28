<?php 
require_once 'inc/header.php';
require_once 'app/clasess/Product.php';
require_once 'app/clasess/Category.php';

$products = new Product();
$products = $products->fetch_all();
$categoies = new Category();
$categoies = $categoies->fetch_all();

?>
    <div class="hero-sec">
        <p id="heropj">best <span>prices</span></p>
        <h1>RESTAURANT</h1>
        <p id="heropd">Visit <span>us!</span></p>
        <button>order</button>
        <a name="posao"></a>
    </div>

    <div class="aboutsec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="leviabout">
                    <h2>RESTAURANT</h2>
                    <h1>JOIN THE <span>team</span></h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br> Cum libero pariatur exercitationem tempora corporis nam <br> ipsa magni debitis beatae. Qui neque architecto eum quos <br> perspiciatis incidunt a molestiae illum voluptates?</p>
                    <a href="#" id="aposao">JOIN</a>
                    <div class="vl"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="desno-radno">
                        <h1>open hours</h1>
                        <h5 id="radnih">Monday - Friday</h5>
                        <p id="radnip">00:00 - 24:00</p>
                        <h5 id="radnihd">Saturday - Sunday</h5>
                        <p id="radnipd">7:00 - 19:00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <a name="meni"></a>

    
    <div class="meni-sec">
        <div class="meni">
            <h1 id="kbmn">RESTAURANT - MENI</h1>
            <div class="meni-kategorije">
                <!-- <button data-category='bbq'  onclick="portfoliosor(this)">BBQ</button>
                <button data-category='deserti'  onclick="portfoliosor(this)">Deserts</button>
                <button data-category='salate'  onclick="portfoliosor(this)">Salats</button>
                <button data-category='sokovi' onclick="portfoliosor(this)">Juices</button> -->
                <?php foreach($categoies as $category):?>
                    <button data-category='<?php echo $category['category_name']?>'  onclick="portfoliosor(this)"><?php echo $category['category_name']?></button> 
                <?php endforeach;?>  
            </div>
            <div class="meni-items">
            <?php foreach($products as $product):?>
                <?php if($product['category_name']=='BBQ'):?>
                    <div class="meni-single-item brown" data-category='<?php echo $product['category_name']?>' id="resp">
                        <img src="public/img/<?php echo $product['image']?>" alt="">
                        <h3><?php echo $product['product_name']; ?></h3>
                        <p><?php echo $product['product_description']?> <br> <br> <b><?php echo $product['price']?>din</b></p>
                    </div>
                <?php elseif($product['category_name']=='deserts'):?>
                    <div class="meni-single-item blue" data-category='<?php echo $product['category_name']?>' id="resp">
                        <img src="public/img/<?php echo $product['image']?>" alt="">
                        <h3><?php echo $product['product_name']; ?></h3>
                        <p><?php echo $product['product_description']?> <br> <br> <b><?php echo $product['price']?>din</b></p>
                    </div>
                <?php elseif($product['category_name']=='salats'):?> 
                    <div class="meni-single-item green" data-category='<?php echo $product['category_name']?>' id="resp">
                    <img src="public/img/<?php echo $product['image']?>" alt="">
                        <h3><?php echo $product['product_name']; ?></h3>
                        <p><?php echo $product['product_description']?> <br> <br> <b><?php echo $product['price']?>din</b></p>
                    </div> 
                <?php elseif($product['category_name']=='juices'):?>
                        <div class="meni-single-item rose" data-category='<?php echo $product['category_name']?>'>
                        <img src="public/img/<?php echo $product['image']?>" style="padding:35px 0;" class="sokresp">
                        <h3><?php echo $product['product_name']; ?></h3>
                        <p><?php echo $product['product_description']?> <br> <br> <b><?php echo $product['price']?>din</b></p>    	
                        </div>
                <?php endif;?>
            <?php endforeach;?>
            </div>
        </div>  
    </div>
<script src="public/js/script.js"></script>
<?php require_once 'inc/footer.php';?>