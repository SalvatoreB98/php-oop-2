<?php
class User {
    private $userID;
    private $password;
    public $name;
    public $email;
    public $price;
    public $creditCards = [];
    public $wallet = 100;
    function __construct($name,$email,$password)
    {
        $id = substr(uniqid('', true), -5);
        $this->setID($id);
    }
    public function setID($value){
        $this->userID = $value;
    }
    private function setPassword($value){
        $this->password = password_hash($value,PASSWORD_DEFAULT);
    }
}
class Article {
    public $product_id;
    public $productName;
    public $price;
    function __construct($name,$price)
    {
        $this->productName = $name;
        $this->setPrice($price);
    }
    public function setPrice($value){
        $this->title = $value;
    }
    private function setProductID(){
        $product_id = rand(0,1000);
    }
}
class CreditCard {
    private $number;
    private $cvv;
    private $expDate;
    function __construct($user,$transaction)
    {
        $this->id_payment= rand(0,1000);
        $this->$user($user);
        $this->$transaction($transaction);
    }
    public function setPrice($value){
        $this->title = $value;
    }
}
class Payment {
    public $id_payment;
    public $user;
    private $amount;
    public $status;
    function __construct($creditCards,$total)
    {
        $this->id_payment= rand(0,1000);
        $this->amount=$total;
    }
    public function getAmount(){
        return $this->amount;
    }
}

class Cart {
    public $total;
    public $articles;
    function __construct($articles){
        $this->articles = $articles;
        $this->calculateTotalPrice();
    }
    public function calculateTotalPrice(){
        foreach ( $this->articles as $key => $article) {
            $this->total += $article->price;
        }
        return $this->total;
    }
}

class PremiumUser extends User {
    public $premium_codes = ['SUMMER10','PRIME20'];
    public $isPremium;
    function __construct($primeValidation)
    {
        $this->isPremium=$primeValidation;
    }
}

?>