<?php
require_once('class/User.class.php');
require_once('class/Profile.class.php');
session_start();

if(isset($_REQUEST['profileID'])) {
    $profileID = $_REQUEST['profileID'];
    $p = Profile::Get($profileID);
} else {
    if(isset($_SESSION['user'])) {
        //jest zalogowany użytkownik - pokaż jego profil
        //załaduj profil zalogowanego użytkownika
        $p = Profile::GetUserProfile($_SESSION['user']->GetID());
    } else {
        //pokaż domyślny profil
        $p = Profile::Get(3);
    }
    
}
    


?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Profil użytkownika</h1>
Imię i nazwisko: <?php echo $p->getFullName(); ?><br>

Zdjęcie profilowe: <img src="<?php echo $p->getProfilePhotoURL(); ?>">

<a href="index.php">
<button class="btn btn-primary">Strona główna</button>
</a>
</body>
</html>