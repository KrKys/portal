<?php
//zaimportuj kod klasy
require_once('class/User.class.php');
//inicjalizacja sesji
session_start();


if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    //wysłano formularz - przechwyć i obrób dane
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    //wywołujemy metodę klasy
    //metody statyczne w PHP wywołuje się poprzez ::
    $result = User::Login($email, $password);
    //$result zawiera true jeśli udało się zalogować lub 
    //fasle w innym wypadku
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz logowania</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="container">
        <h1 class="text-center mt-5 mb-5">Zaloguj się:</h1>
        <div id="loginForm" class="col-4 offset-4 mt-5">
            <form action="login.php" method="post">
                <label for="emailInput" class="form-label">Adres e-mail:</label>
                <input type="email" class="form-control mb-3" name="email" id="emailInput">

                <label for="passwordInput" class="form-label">Hasło:</label>
                <input type="password" class="form-control mb-3" name="password" id="passwordInput">

                <button type="submit" class="btn btn-primary w-100 mt-3">Zaloguj</button>
                
            </form>
                <a href="index.php">
                <button class="btn btn-primary w-100 mt-3">Powrót</button>
                </a>
            <?php
            if (isset($result)) {
                if ($result) {
                    echo "Użytkownik zalogowany<br>";
                    echo '<a href="index.php">Przejdź do głównej strony</a>';
                    
                } else {
                    echo "Użytkownik nie zalogowany";
                }
            }

            ?>
        </div>
    </div>
    <?php
    echo "<pre>";
    var_dump($_SESSION);
    ?>
</body>

</html>