<?php
    function controleurPrincipal($action) {
        $actionsListe = array();
        $actionsListe["defaut"] = "connexion.php";
        $actionsListe["connexion"] = "connexion.php";
        $actionsListe["deconnexion"] = "deconnexion.php";
    
        if (array_key_exists($action, $actionsListe)) {
            return $actionsListe[$action];
        } else {
            return $actionsListe["defaut"];
        }
    }
?>