<?php

class User
{
    private $userid;
    private $fname;
    private $mname;
    private $lname;
    private $address;
    private $contact_num;
    private $email;
    private $password;


    public function __construct($userId, $fname, $mname, $lname, $address, $contact_num, $email, $password)
    {
        $this->userid = $userId;
        $this->email = $email;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->address = $address;
        $this->contact_num = $contact_num;
        $this->password = password_hash($password, PASSWORD_BCRYPT);        
    }

    public function getId()
    {
        return $this->userid;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFname(){
        return $this->fname;
    }

    public function getMname(){
        return $this->mname;
    }

    public function getLname(){
        return $this->lname;
    }

    public function getAdress(){
        return $this->address;
    }

    public function getContactnum(){
        return $this->contact_num;
    }


}
?>
