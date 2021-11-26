<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP Sessions</title>
</head>
<body>
    <form method="POST" action="scripts/connexion.php">
        <input type="text" name="pseudo" placeholder="pseudo">
        <br><br>
        <input type="password" name="mot_de_passe" placeholder="mot de passe">
        <br><br>
        <input type="submit" name="envoyer">
    </form>
    <br>
    <form method="POST" action="scripts/enregistrement.php">
        <input type="text" name="nom" placeholder="nom">
        <br><br>
        <input type="text" name="pseudo" placeholder="pseudo">
        <br><br>
        <input type="password" name="mot_de_passe" placeholder="mot de passe">
        <br><br>
        <input type="submit" name="enregistrer">
    </form>
</body>
</html>