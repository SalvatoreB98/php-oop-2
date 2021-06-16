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
    $userIsLogged = false;
    ?>
        <h2>Registrazione</h2>
        <form method="POST">
            Nome utente: <input type="text" name="name">
            Email: <input type="text" name="email">
            Password: <input type="text" name="password">
            età: <input type="number" name="password">
            <button onClick="window.location.reload();" type="submit">REGISTRATI</button>
        </form>
    <?php
    // L'USER SI REGISTRA
    try {
        if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            $user1 = new User($_POST["name"], $_POST["email"], $_POST["password"]);
            $userIsLogged = true;
            echo "<br> UTENTE REGISTRATO CON SUCCESSO";
        } else {
            throw new Exception("*TUTTI I CAMPI SONO OBBLIGATORI", 1);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    // L'USER INSERISCE I PRODOTTI NEL CARRELLO
    if ($userIsLogged == true) {
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
    }
    ?>
</body>

</html>