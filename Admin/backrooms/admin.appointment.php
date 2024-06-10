<?php
require_once '../../toothfairy/autoload.php';
require_once '../../toothfairy/dbcon.php';


abstract class Appointment
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }


    protected function getAllAppointment($status){
        $query = "SELECT * FROM appointments INNER JOIN user ON appointments.user_id = user.user_id WHERE appointments.status = ?";
        $stm = $this->con->prepare($query);
        $stm->bind_param('s', $status);
    
        if ($stm->execute()) {
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        } else {
            throw new Exception("Error retrieving appointment: " . $stm->error);
        }
    }
    
    protected function updateAppointmentStatus($appointment_id, $status){
        $query = "UPDATE appointments SET status = ? WHERE appointment_id = ?";
        $stm = $this->con->prepare($query);
        $stm->bind_param('si', $status, $appointment_id);
    
        if ($stm->execute()) {
            return true;
        } else {
            throw new Exception("Error updating appointment status: " . $stm->error);
        }
    }
}
?>
