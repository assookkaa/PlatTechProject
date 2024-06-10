<?php 
require_once '../../toothfairy/autoload.php';
require_once '../../toothfairy/dbcon.php';
// require_once 'autoload.php';
// require_once 'dbcon.php';

abstract Class Profile{
    
    private $con;
    
    public function __construct($con)
    {
        $this->con = $con;
        
    }


    protected function getAllUser($accId){
         $query= "SELECT * FROM user INNER JOIN acc_level ON user.acc_id = acc_level.acc_id WHERE user.acc_id = ? ";
         $stm = $this->con->prepare($query);
         $stm->bind_param('i', $accId);

         if ($stm->execute()){
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