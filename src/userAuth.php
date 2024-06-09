<?php
require_once 'roles.php';

class userAuth {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function login($email, $password) {
        $query = "SELECT user.*, acc_level.acc_type as account_type FROM user INNER JOIN acc_level ON acc_level.acc_id = user.acc_id WHERE email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $getresult = $stmt->get_result();

        if ($getresult->num_rows === 1) {
            $row = $getresult->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                // Password is correct, create a new roleCustomer object
                $user = new roleCustomer(
                    $row['user_id'],
                    $row['fname'],
                    $row['mname'],
                    $row['lname'],
                    $row['address'],
                    $row['contact_num'],
                    $row['email'],
                    $row['password'],
                    $row['account_type']
                );

                return $user;
            } else {
                throw new Exception("Incorrect password.");
            }
        } else {
            throw new Exception("User not found.");
        }
    }
}
?>