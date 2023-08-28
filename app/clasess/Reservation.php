<?php 
class Reservation{
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    } 
    public function fetch_all(){
        $sql = "SELECT * FROM reservations";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function create($user_id,$reservation_date,$reservation_time,$persons,$reservation_note,$reservation_name){
        $sql = "INSERT INTO reservations (user_id,reservation_date,reservation_time,persons,reservation_note,reservation_name) VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssss",$user_id,$reservation_date,$reservation_time,$persons,$reservation_note,$reservation_name);
        $result = $stmt->execute();

    }
    public function show_reservation($reservation_id){
        $sql = "SELECT reservations.reservation_id,reservations.reservation_name,users.first_name,users.last_name,users.phone_number,reservations.reservation_date,reservations.reservation_time,reservations.persons,reservations.reservation_note,reservations.created_at
                FROM reservations 
                INNER JOIN users ON reservations.user_id=users.user_id 
                WHERE reservations.reservation_id = ? ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$reservation_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function delete($reservation_id){
        $sql ="DELETE FROM reservations WHERE reservation_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$reservation_id);
        $stmt->execute();
    }
}