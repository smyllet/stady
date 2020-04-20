<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }

    include_once "model/db_utilisateur.php";

    $profils = getFiltreProfil();
    
    $title = "Liste Profil";
    include "$racine/vue/entete.php";
    include "$racine/vue/admin/vueListProfil.php";
    include "$racine/vue/pied.php";
?>