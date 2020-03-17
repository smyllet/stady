<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Stady - Connexion</title>

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/loginPage.css" />
</head>
<body>
    <div id="gauche">
        <div class="center">
            <img src="image/logo.png">
            <div id="etablissement-info">
                <h3><?php echo $ecoleName?></h3>
                <p><?php echo $ecoleDesc?></p>
            </div>
        </div>
    </div>
    <div id="droite">
        <div class="center">
            <form action="./?action=connexion" method="post" id="login_form">
                <h2>Connectez-vous</h2>
                <?php echo $erreurMessage?>
                <div class="id">
                    <label for="identifiant"></label>
                    <input type="text" id="identifiant" name="login_identifiant" placeholder="Identifiant" required value="<?php if(isset($identifiant)) echo $identifiant?>">
                </div>
                <div class="password">
                    <label for="password"></label>
                    <input type="password" id="password" name="login_password" placeholder="Mot de passe" required>
                </div>
                <div class="button">
                    <button type="submit" id="connexion">Connexion</button>
                </div>
               </div> 
            </form>
        </div>
    </div>
</body>
</html>