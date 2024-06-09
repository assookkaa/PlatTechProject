<?php

require_once 'autoload.php';
include 'dbcon.php';

abstract class Appointment
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    protected function setAppointment($userId, $age, $date, $purpose, $status) {
        $query = "INSERT INTO appointments (user_id, age, purpose, date, status, date_approval) VALUES (?,?,?,?,?, CURRENT_TIMESTAMP)";
        $stm = $this->con->prepare($query);
        $stm->bind_param('iisss', $userId, $age, $purpose, $date, $status);

        if ($stm->execute()) {
            return true;
        } else {
            throw new Exception("Error inserting appointment: " . $stm->error);
        }
    }

    protected function getAppointment($userId, $status, $limit, $offset) {
    $query = "SELECT appointments.* FROM appointments WHERE appointments.user_id = ? AND appointments.status = ? LIMIT ? OFFSET ?";
    $stm = $this->con->prepare($query);
    $stm->bind_param('isii', $userId, $status, $limit, $offset);

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
}
?>
