<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }

    
    $title = "Classes";
    include "$racine/vue/entete.php";
    include "$racine/vue/admin/vueClasses.php";
    include "$racine/vue/pied.php";
?>