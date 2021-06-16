<?php
class User
{
    private $userID;
    private $password;
    public $name;
    public $email;
    public $creditCards = [];
    public $wallet = 100;
    function __construct($name, $email, $password)
    {
        $id = substr(uniqid('', true), -5);
        $this->setID($id);
        $this->setName($name);
        $this->setPassword($password);
        $this->setEmail($email);
    }
    // SET
    private function setName($name)
    {
        $this->name =  $name;
    }
    public function setEmail($email){
        if ($this->userExist($email)) {
            throw new Exception("Email già registrata", 1);
        }
        if(!strstr($email,"@")){
            throw new Exception("Inserire una mail valida con @ e dominio!",1);
        }
        $this->email=$email;
    }
    public function setID($value)
    {
        $this->userID = $value;
    }
    private function setPassword($value)
    {
        $this->password = password_hash($value, PASSWORD_DEFAULT);
    }
    // VALIDATION
    private function userExist($email)
    {
        $toReturn = false;
        //controllo per vedere se l'email risulta negli utenti
        return $toReturn;
    }
}
