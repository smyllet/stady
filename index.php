<?php
    include "getRacine.php";
    include "getConfig.php";
    include "$racine/controllers/controleurPrincipal.php";
    include_once "$racine/model/db_utilisateur.php";
    

    if (isset($_GET["action"]))
    {
        $action = $_GET["action"];
    }
    else
    {
        $action = "defaut";
    }

    $fichier = controleurPrincipal($action);
    include "$racine/controllers/$fichier";
?>