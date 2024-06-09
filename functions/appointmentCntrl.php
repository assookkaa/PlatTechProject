<?php
require_once 'autoload.php';
include 'dbcon.php';
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

public function addAppointment(){
    $this->setAppointment($this->userId, $this->age, $this->date, $this->purpose, $this->purpose, $this->status);
}

public function viewAppointment($userId, $status = 'Pending', $limit = 3, $offset = 0)
{
    return $this->getAppointment($userId, $status, $limit, $offset);
}
}

?>