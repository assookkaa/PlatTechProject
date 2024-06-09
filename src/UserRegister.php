<?php
require_once 'interface.php';

class UserRegister
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function register($fname, $mname, $lname, $address, $contact_num, $email, $password)
    {
        $query = "SELECT email FROM user WHERE email = ?";
        $stm = $this->con->prepare($query);
        $stm->bind_param('s', $email);
        $stm->execute();
        $result = $stm->get_result();
        $existingEmail = $result->fetch_assoc();
        if ($existingEmail) {
            return 'Email already exists';
        }

        $query2 = "SELECT contact_num FROM user WHERE contact_num = ?";
        $stm2 = $this->con->prepare($query2);
        $stm2->bind_param('i', $contact_num);
        $stm2->execute();
        $result = $stm2->get_result();
        $existingContactNum = $result->fetch_assoc();

        if ($existingContactNum) {
            return "Number is already registered";
        }

        $query3 = "SELECT acc_id FROM acc_level WHERE acc_type = 'Customer'";
        $stmt3 = $this->con->prepare($query3);
        $stmt3->execute();
        $result= $stmt3->get_result();
        $acc_id = $result->fetch_assoc();


        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query4 = "INSERT INTO user (fname, mname, lname, address, contact_num, email, password, acc_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stm4 = $this->con->prepare($query4);
        $stm4->bind_param('ssssissi', $fname, $mname, $lname, $address, $contact_num, $email, $hashed_password, $acc_id);
        $registered = $stm4->execute();

        if ($registered) {
            return "Successfully Registered";
        } else {
            return "User registration failed";
        }
    }
}
