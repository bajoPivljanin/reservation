<?php 
class Product{
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    } 
    public function fetch_all(){
        $sql = "SELECT products.product_id,category.category_name,products.product_name,products.price,products.product_description,products.image,products.created_at
                FROM products 
                INNER JOIN category ON products.category_id=category.category_id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function create($category_id,$product_name,$price,$product_description,$image){
        $sql ="INSERT INTO products (category_id,product_name,price,product_description,image) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issss",$category_id,$product_name,$price,$product_description,$image);
        $stmt->execute();
    }
    public function delete($product_id){
        $sql ="DELETE FROM products WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$product_id);
        $stmt->execute();
    }
}