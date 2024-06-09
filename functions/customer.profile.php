<?php 
require_once 'autoload.php';
require_once 'dbcon.php';

abstract Class Profile{
    
    private $con;
    
    public function __construct($con)
    {
        $this->con = $con;
        
    }

    protected function getUser($userId) {
        $query= "SELECT * FROM user WHERE user_id = ?";
        $stm = $this->con->prepare($query);
        $stm->bind_param('i', $userId);

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