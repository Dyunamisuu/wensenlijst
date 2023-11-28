<?php
session_start();

// Inloggen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Voer de inloglogica uit, bijvoorbeeld controleer de gegevens tegen de database
    // Voor simpliciteit gaan we uit van een geldige gebruiker met gebruikersnaam 'demo' en wachtwoord 'password'
    if ($username === 'demo' && $password === 'password') {
        $_SESSION['user_id'] = 1; // Stel de gebruikers-ID in de sessie in
        header("Location: index.php"); // Doorverwijzen naar de startpagina
        exit();
    } else {
        $loginError = "Ongeldige gebruikersnaam of wachtwoord";
    }
}

// Registreren
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Voer de registratielogica uit, bijvoorbeeld voeg gebruikersgegevens toe aan de database
    // Voor simpliciteit gaan we uit van een succesvolle registratie
    // In een echte situatie zou je het wachtwoord hashen en in de database invoegen
    header("Location: login.php"); // Doorverwijzen naar de inlogpagina na registratie
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($loginError)) : ?>
        <p><?= $loginError ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="login">Inloggen</button>
    </form>

    <h2>Registreren</h2>
    <form action="login.php" method="post">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Bevestig Wachtwoord:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit" name="register">Registreren</button>
    </form>
</body>

</html>