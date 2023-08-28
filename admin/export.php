<?php 
    require_once "../app/config/config.php";
    require_once "../app/clasess/Reservation.php";
    require_once "../app/clasess/User.php";
    require_once "../fpdf186/fpdf.php";
    $user = new User();
if($user->is_logged() && $user->is_admin()){
    $reservation = new Reservation();
    $reservation = $reservation->show_reservation($_GET['reservation_id']);
    $reservation_id = $reservation['reservation_id'];
    $reservation_name=$reservation['reservation_name'];
    $first_name=$reservation['first_name'];
    $last_name=$reservation['last_name'];
    $phone_number=$reservation['phone_number'];
    $reservation_date = strtotime($reservation['reservation_date']);
    $new_reservation_date = date("j.n.Y",$reservation_date);
    $reservation_time = strtotime($reservation['reservation_time']);
    $new_reservation_time = date("H:i",$reservation_time);
    $reservation_note = $reservation['reservation_note'];
    $persons=$reservation['persons'];
    $created_at=$reservation['created_at'];


    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B','16');
    $pdf->Cell(40,10,'Reservation card');
    $pdf->Ln();
    $pdf->Cell(40,10,'Reservation ID: '.$reservation_id);
    $pdf->Ln();
    $pdf->Cell(40,10,'Reservation is made by: '.$first_name ." ". $last_name);
    $pdf->Ln();
    $pdf->Cell(40,10,'Phone number: '.$phone_number);
    $pdf->Ln();
    $pdf->Cell(40,10,'Reservation name: '.$reservation_name);
    $pdf->Ln();
    $pdf->Cell(40,10,'Date and Time: '.$new_reservation_date . " // " . $new_reservation_time ."h");
    $pdf->Ln();
    $pdf->Cell(40,10,'For: '.$persons . " persons ");
    $pdf->Ln();
    $pdf->Cell(40,10,'Reservation note: '.$reservation_note);
    $pdf->Ln();
    $pdf->Cell(40,10,'Reservation is created at: '.$created_at);
    $pdf->Ln();
    $filename = 'access_cards/access_cards_'.$reservation_name.'.pdf';
    $pdf->Output('F',$filename);
    $sql = "UPDATE reservations SET access_card_pdf_path='$filename' WHERE reservation_id=$reservation_id";
    $conn->query($sql);
    $conn->close();
        if($user->is_logged() && $user->is_admin()){
            header('location:'.$filename);
            exit;
        }
        else{
            header('location:../reservation.php');
            exit;
        }
    }
else{
    header('location:../reservation.php');
    exit;
}
