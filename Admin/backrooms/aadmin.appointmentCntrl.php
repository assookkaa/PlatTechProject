<?php
require_once '../../toothfairy/autoload.php';
require_once '../../toothfairy/dbcon.php';
// require_once 'autoload.php';
// require_once 'dbcon.php';
Class AppointmentCntrl extends Appointment{

    private $userId; 
    private $age; 
    private $date; 
    private $purpose; 
    private $status; 


public function __construct($con, $userId, $age, $date, $purpose, $status){
    
    parent::__construct($con);
    $this->userId = $userId;
    $this->age = $age;
    $this->date = $date;
    $this->purpose = $purpose;
    $this->status = $status;
    
}

public function viewPendingAppointment(){
    return $this->getAllAppointment($this->status = "Pending");
}
public function viewConfirmedAppointment(){
    return $this->getAllAppointment($this->status = "Confirmed");
}
public function viewRejectedAppointment(){
    return $this->getAllAppointment($this->status = "Rejected");
}

public function confirmAppointment($appointment_id){
    return $this->updateAppointmentStatus($appointment_id, 'Confirmed');
}

public function rejectAppointment($appointment_id){
    return $this->updateAppointmentStatus($appointment_id, 'Rejected');
}

}

?>