<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }

    include_once "model/db_classe.php";

    $classes = getFiltreClassesList();
    
    $title = "Liste classe";
    include "$racine/vue/entete.php";
    include "$racine/vue/admin/vueListClasse.php";
    include "$racine/vue/pied.php";
?>