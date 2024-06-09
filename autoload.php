<?php
spl_autoload_register(function ($class) {
    $class = strtolower($class);
    $file = 'src/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Error: Class file not found for class $class";
    }
});
?>