<?php


class Payment
{
    public $id_payment;
    public $user;
    private $amount;
    public $creditCard;
    public $status;
    function __construct($creditCard, $total)
    {
        $this->creditCard = $creditCard;
        $this->id_payment = rand(0, 1000);
        $this->amount = $total;
        $this->doTransaction();
    }
    public function getAmount()
    {
        return $this->amount;
    }
    private function doTransaction()
    {
        $cardDate = $this->creditCard->getExpDate();
        $currentDate = date("y/m");
        var_dump($cardDate);
        var_dump($currentDate);
        if ($cardDate < $currentDate) {
            $this->status = "CARD EXPIRED";
            echo $this->status . "!";
        }else{
            echo "CARTA OK";
        }
    }
}