<?php 
class Category{
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    } 
    public function fetch_all(){
        $sql = "SELECT * FROM category";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}