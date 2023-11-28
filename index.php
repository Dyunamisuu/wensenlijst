<?php
session_start();
require_once('./Classes/User.php');
require_once('./Classes/Wensen.php');

$userObj = new User();
$wishObj = new Wish();

// Controleren of de gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Wensen ophalen uit de database
$wishes = $wishObj->getWishes($_SESSION['user_id']);

// HTML voor het weergeven van wensen
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist App</title>
</head>

<body>
    <h1>Wensenlijst</h1>

    <?php if ($wishes) : ?>
        <ul>
            <?php foreach ($wishes as $wish) : ?>
                <li>
                    <strong><?= $wish['title'] ?></strong>
                    <p><?= $wish['description'] ?></p>
                    <img src="<?= $wish['image'] ?>" alt="<?= $wish['title'] ?>">
                    <p>Prijs: <?= $wish['price'] ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Geen wensen gevonden.</p>
    <?php endif; ?>

    <a href="logout.php">Uitloggen</a>
</body>

</html>