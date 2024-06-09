<?php
class AdminCntrl extends Admin {
    
    private $con;
    private $userid;
    private $fname;
    private $mname;
    private $lname;
    private $address;
    private $contact_num;
    private $email;
    private $password;
    private $accountType;

    public function __construct($con) {
        parent::__construct($con);
        $this->con = $con;
    }

    public function login($email, $password){
        $user = $this->getAdmin($email, $password);
        if ($user) {
        
            $this->userid = $user['user_id'];
            $this->fname = $user['fname'];
            $this->mname = $user['mname'];
            $this->lname = $user['lname'];
            $this->address = $user['address'];
            $this->contact_num = $user['contact_num'];
            $this->email = $user['email'];
            $this->password = $user['password'];
            $this->accountType = $user['account_type'];
            return true;
        } else {
            // User not found or password incorrect
            return false;
        }
    }
}


?>