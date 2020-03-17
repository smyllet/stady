<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }
    include_once "$racine/model/authentification.php";

    include "$racine/getConfig.php";
    $ecoleName = $config->{'info-ecole'}->{'name'};
    $ecoleDesc = $config->{'info-ecole'}->{'desc-ac'};
    $erreurMessage = "";

    // recuperation des donnees GET, POST, et SESSION
    if (!isset($_POST["login_identifiant"]) || !isset($_POST["login_password"]))
    {
        // on affiche le formulaire de connexion
        include "$racine/vue/loginPage.php";
    }
    else
    {
        $identifiant = $_POST["login_identifiant"];
        $password = $_POST["login_password"];

        if(!$identifiant) 
        {
            $erreurMessage = '<p style="color: #FF0000; font-size: 70%;">Vous devez saisir votre identifiant</p>';
            include "$racine/vue/loginPage.php";
        }
        else if(!$password)
        {
            $erreurMessage = '<p style="color: #FF0000; font-size: 70%;">Vous devez saisir votre mot de passe</p>';
            include "$racine/vue/loginPage.php";
        }
        else
        {
            $res = login($identifiant,$password);
            if($res == "bad_user") 
            {
                $erreurMessage = '<p style="color: #FF0000; font-size: 70%;">Identifiant invalide</p>';
                include "$racine/vue/loginPage.php";
            }
            else if($res == "bad_password")
            {
                $erreurMessage = '<p style="color: #FF0000; font-size: 70%;">Mot de passe invalide</p>';
                include "$racine/vue/loginPage.php";
            }
            else
            {
                //Action à faire suite à la connexion
            }
        }
    }
?>