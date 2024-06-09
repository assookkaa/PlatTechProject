<?php
require_once 'Token.php';

class SimpleToken extends Token {

    public function generate() {
        return $this->generateByte($this->getI()/2);
    }
}
?>
