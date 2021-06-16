<?php
require_once(__DIR__ . "./classes/USER.php");

class PremiumUser extends User
{
    public $premium_codes = ['SUMMER10', 'PRIME20'];
    public $isPremium;
    function __construct($primeValidation)
    {
        $this->isPremium = $primeValidation;
    }
}
