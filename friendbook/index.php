<?php
require_once('class/User.class.php');
require_once('class/Profile.class.php');
session_start();
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

<a href="login.php">
<button class="btn btn-primary">Logowanie</button>
</a>
<a href="register.php">
<button class="btn btn-primary">Rejestracja</button>
</a>
<a href="profile.php">
<button class="btn btn-primary">Profil</button>
</a>
<br>
<?php
$profiles = Profile::GetAll();
foreach ($profiles as $profile) {
    echo '<img src="'.$profile->getProfilePhotoURL().'" style="height: 200px">';
    echo $profile->getFullName();
    echo "<br>";
}
?>
</body>
</html>