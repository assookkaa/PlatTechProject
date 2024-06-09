<?php 

Class roleCustomer extends User{

    private $customer;
    
    public function __construct($userId, $fname, $mname, $lname, $address, $contactNum, $email, $password, $customer) {
        parent::__construct($userId, $fname, $mname, $lname, $address, $contactNum, $email, $password, $customer);
        $this->customer=$customer;
    }
    public function getCustomer()
    {
        return $this->customer;
    }


}

?>