<?php
require_once 'token.php';

class CSRFtoken extends Token {

    public function __construct($length = 32) {
        parent::__construct($length);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function generate() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes($this->getI()/2));
        }
        return $_SESSION['csrf_token'];
    }

    public function validate($token){
        return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token;

    }
}

?>