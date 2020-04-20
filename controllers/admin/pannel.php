<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }
    
    
    $title = "Pannel Administrateur";
    include "$racine/vue/entete.php";
    include "$racine/vue/admin/vuePannel.php";
    include "$racine/vue/pied.php";
?>