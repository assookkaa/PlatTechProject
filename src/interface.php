<?php
// interface UserLogin{

//     public function login($email, $password);


// }

interface UserRegistrationInterface {
    public function register($fname, $mname, $lname, $address, $contact_num, $email, $password, $acc_id);
}
?>
