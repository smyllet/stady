<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }
    include_once "$racine/model/authentification.php";

    logout();

    include "$racine/controllers/connexion.php";
?>