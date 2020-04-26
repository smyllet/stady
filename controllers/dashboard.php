<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }

    include_once "$racine/model/authentification.php";

    $title = "Dashboard";
    $firstName = getUserByIdentifiant($_SESSION["identifiant"])["profil_firstName"];
    include "$racine/vue/entete.php";
    include "$racine/vue/vueAccueil.php";
    include "$racine/vue/pied.php";
?>