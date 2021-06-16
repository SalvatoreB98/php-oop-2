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
    require_once(__DIR__ . "/classes/ARTICLE.php");
    require_once(__DIR__ . "/classes/CART.php");
    require_once(__DIR__ . "/classes/PAYMENT.php");
    require_once(__DIR__ . "/classes/USER.php");
    require_once(__DIR__ . "/classes/CREDIT CARD.php");
    ?>
    <h2>Registrazione</h2>
    <form method="POST">
        Nome utente: <input type="text" name="name">
        Email: <input type="text" name="email">
        Password: <input type="text" name="password">
        <button type="submit">REGISTRATI</button>
    </form>
    <?php
    // L'USER SI REGISTRA
    try {
        if(array_key_exists("name",$_POST) && array_key_exists("email",$_POST) && array_key_exists("password",$_POST)){
            $user1 = new User($_POST["name"], $_POST["email"], $_POST["password"]);
        }else{
            throw new Exception("Inserire tutti i campi", 1);
        }
        var_dump($user1);
    } catch (Exception $e) {
        echo $e->getMessage();
    }


    // L'USER INSERISCE I PRODOTTI NEL CARRELLO
    echo "<br> CARRELLO <br><br>";
    $articles = [
        new Article("laptop 15-dw005nl", 499.99),
        new Article("IPHONE 12", 699.99),
        new Article("RTX 3080", 999.99),
    ];
    $cart = new Cart($articles);
    foreach ($cart->articles as $key => $article) {
        echo "<br>" . $article->productName . "<br> PREZZO: " . $article->price . "<br><br>";
    }


    //L'USER INSERISCE UNA CARTA DI CREDITO
    $date = "24/01";
    $card = new CreditCard("5333 018 100", $date);
    echo "TOTALE CARRELLO: " . $cart->calculateTotalPrice();


    // L'USER EFFETTA IL PAGAMENTO
    $payment = new Payment($card, $cart->calculateTotalPrice());
    ?>
</body>

</html>