<?php

class LogoutHandler
{
    public function logout()
    {
        // Start the session
        session_start();

        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to the login page
        header("Location: login.php");
        exit;
    }
}

$logout = new LogoutHandler();

$logout->logout();
?>
