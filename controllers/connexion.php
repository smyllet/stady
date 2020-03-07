<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }
    include_once "$racine/model/authentification.php";


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
            echo "vous devez saisir votre identifiant";
            include "$racine/vue/loginPage.php";
        }
        else if(!$password)
        {
            echo "vous devez saisir votre mot de passe";
            include "$racine/vue/loginPage.php";
        }
        else
        {
            $res = login($identifiant,$password);
            if($res == "bad_user") 
            {
                echo "Identifiant invalide";
                include "$racine/vue/loginPage.php";
            }
            else if($res == "bad_password")
            {
                echo "Mot de passe invalide";
                include "$racine/vue/loginPage.php";
            }
            else
            {
                //Action à faire suite à la connexion
            }
        }
    }
?>