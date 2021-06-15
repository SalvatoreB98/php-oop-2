<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once(__DIR__ . "/classes/classes.php");
    // L'USER SI REGISTRA
    echo "UTENTE REGISTRATO CON SUCCESSO";
    $user1 = new User("Salvatore", "salvatore.butera1998@gmail.com", "password123");
    var_dump($user1);

    // L'USER INSERISCE I PRODOTTI NEL CARRELLO
    echo "CARRELLO <br><br>";
    $articles = [
        new Article("laptop 15-dw005nl", 499.99),
        new Article("IPHONE 12", 699.99),
        new Article("RTX 3080", 999.99),
    ];
    $cart = new Cart($articles);
    foreach ($cart->articles as $key => $article) {
        echo "<br>" . $article->productName . "<br> PREZZO: " . $article->price . "<br><br>";
    }
    //L'user seleziona metodo di pagamento
    $date = "04/21";
    $card = new CreditCard("5333 018 100", $date);
    echo "TOTALE CARRELLO: " . $cart->calculateTotalPrice();
    // L'USER EFFETTA IL PAGAMENTO
    $payment = new Payment($card, $cart->calculateTotalPrice());
    ?>
</body>

</html>