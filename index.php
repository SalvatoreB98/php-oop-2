<?php 
require_once( __DIR__ . "/classes/classes.php");
// L'USER SI REGISTRA
$user1 = new User("Salvatore","salvatore.butera1998@gmail.com","password123");
var_dump($user1);
// L'USER INSERISCE I PRODOTTI NEL CARRELLO
$articles=[
    new Article("laptop 15-dw005nl", 499.99),
    new Article("laptop 14-ff105nl", 699.99),
    new Article("RTX 3080", 999.99),
];
$cart = new Cart($articles);
var_dump($cart->calculateTotalPrice());
// L'USER PAGA
$payment = new Payment($user1,$cart->total);
