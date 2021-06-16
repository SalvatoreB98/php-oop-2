<?php
class CreditCard
{
    private $number;
    private $cvv;
    private $expDate;
    function __construct($number, $expDate)
    {
        $this->number = $number;
        $this->expDate = $expDate;
    }
    public function getExpDate()
    {
        return $this->expDate;
    }
}