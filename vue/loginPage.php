<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Stady - Connexion</title>
</head>
<body>
    <form action="./?action=connexion" method="post">
        <div>
            <label for="identifiant">Identifiant </label>
            <input type="text" id="identifiant" name="login_identifiant">
        </div>
        <div>
            <label for="password">Mot de passe </label>
            <input type="password" id="password" name="login_password">
        </div>
        <div class="button">
            <button type="submit" id="connexion">Connexion</button>
        </div>
    </form>
</body>
</html>