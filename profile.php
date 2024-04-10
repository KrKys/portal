<?php

if(isset($_GET['profileID'])) {
 
    $id = $_GET['profileID'];
} else {

    $id = 1;
}



$sql = "SELECT * FROM profile 
        LEFT JOIN photo ON profile.profilePhotoID = photo.ID
        WHERE profile.ID=? 
        LIMIT 1";


$db = new mysqli('localhost', 'root', '', 'profile');


$query = $db->prepare($sql);


$query->bind_param('i', $id);


$query->execute();


$result = $query->get_result()->fetch_assoc();



$firstName = $result['firstName'];
$lastName = $result['lastName'];
$description = $result['description'];
$profilePhotoUrl = $result['url']
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil użytkownika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="profileContent">
        <span id="name">
            <?php echo $firstName." ".$lastName; ?>
        </span>
        <img src="<?php echo $profilePhotoUrl; ?>" 
            alt="" id="profilePhoto">
        <p id="profileDescription">
            <?php echo $description; ?>
        </p>
    </div>
</body>
</html>