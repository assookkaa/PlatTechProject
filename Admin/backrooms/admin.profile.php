<?php
require_once "/laragon/www/toothfairy/autoload.php";
abstract class Admin{
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    protected function getAdmin($email, $password) {
        $query = "SELECT user.*, acc_level.acc_type as account_type FROM user INNER JOIN acc_level ON acc_level.acc_id = user.acc_id WHERE email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $getresult = $stmt->get_result();

        if ($getresult->num_rows === 1) {
            $row = $getresult->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                // Password is correct, create a new Admin object
            } else {
                throw new Exception("Incorrect password.");
            }
        } else {
            throw new Exception("User not found.");
        }
    }

    protected function start(){
        session_start();
    }
}


?>