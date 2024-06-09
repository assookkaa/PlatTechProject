<?php
abstract class Token
{
    private $i;

    public function __construct($i = 32)
    {
        $this->i = $i;
    }

    protected function generateByte()
    {
        return bin2hex(random_bytes( $this->i));
    }

    abstract public function generate();

    public function getI()
    {
        return $this->i;
    }
   
}
?>
