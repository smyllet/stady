<?php
    function controleurPrincipal($action) {
        $actionsListe = array();
        $actionsListe["defaut"] = "connexion.php";
        $actionsListe["connexion"] = "connexion.php";
        $actionsListe["deconnexion"] = "deconnexion.php";
        $actionsListe["dashboard"] = "dashboard.php";
        $actionsListe["pannelAdmin"] = "pannelAdmin.php";
        $actionsListe["debug"] = "debug.php";
    
        if (array_key_exists($action, $actionsListe)) {
            return $actionsListe[$action];
        } else {
            return $actionsListe["defaut"];
        }
    }
?>