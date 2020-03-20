<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }

    include_once "$racine/model/authentification.php";

    if(isLoggedOn() == false)
    {
        include "$racine/controllers/connexion.php";
    }
    else if(isAdmin() == true)
    {
        $title = "dashboard";
        include "$racine/vue/entete.php";
        include "$racine/vue/pied.php";
    }
?>