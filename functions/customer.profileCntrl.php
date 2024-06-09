<?php
require_once "autoload.php";
require_once 'dbcon.php';
require_once 'customer.profile.php';
class ProfileCntrl extends Profile
{

    private $userId;
    private  $fname = ['fname'];
    private $mname;
    private $lname;
    private $address;
    private $contactNum;
    private $email;
    private $roles;


    public function __construct($con, $userId, $fname, $mname, $lname, $address, $contactNum, $email, $roles)
    {
        parent::__construct($con);
        $this->userId = $userId;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->address = $address;
        $this->contactNum = $contactNum;
        $this->email = $email;
        $this->roles = $roles;
    }

    public function viewProfile($userId)
    {
        return $this->getUser($this->userId);
        $this->fname;
    }
}
