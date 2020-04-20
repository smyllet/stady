<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }

    
    $title = "Profil et Utilisateur";
    include "$racine/vue/entete.php";
    include "$racine/vue/admin/vueProfilEtUtilisateur.php";
    include "$racine/vue/pied.php";
?>