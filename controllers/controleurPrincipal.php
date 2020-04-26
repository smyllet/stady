<?php
    function controleurPrincipal($action) {
        include_once "model/authentification.php";

        $actionsListe = array();
        $actionsListe["defaut"] = "connexion.php";
        $actionsListe["connexion"] = "connexion.php";
        $actionsListe["deconnexion"] = "deconnexion.php";
        $actionsListe["dashboard"] = "dashboard.php";
        $actionsListe["carnetEleve"] = "carnetEleve.php";
        $actionsListe["stages"] = "stages.php";
        $actionsListe["debug"] = "debug.php";

        $actionsAdmin= array();
        $actionsAdmin["defaut"] = "admin/pannel.php";
        $actionsAdmin["admin_pannel"] = "admin/pannel.php";
        $actionsAdmin["admin_stage"] = "admin/stage.php";
        $actionsAdmin["admin_classes"] = "admin/classes.php";
        $actionsAdmin["admin_listClasses"] = "admin/listClasses.php";
        $actionsAdmin["admin_createClasse"] = "admin/createClasse.php";
        $actionsAdmin["admin_parametre"] = "admin/parametre.php";
        $actionsAdmin["admin_profilEtUtilisateur"] = "admin/profilEtUtilisateur.php";
        $actionsAdmin["admin_listProfil"] = "admin/listProfil.php";
        $actionsAdmin["admin_createProfil"] = "admin/createProfil.php";
    
        if (array_key_exists($action, $actionsListe) && isLoggedOn())
        {
            return $actionsListe[$action];
        }
        else if(substr($action, 0, 6) == "admin_")
        {
            if(!isLoggedOn())
            {
                include "controllers/connexion.php";
            }
            else if(isAdmin())
            {
                if (array_key_exists($action, $actionsAdmin))
                {
                    return $actionsAdmin[$action];
                }
                else
                {
                    return $actionsAdmin["defaut"];
                }
            }
            else
            {
                print "accès refusé";
            }
        }
        else
        {
            return $actionsListe["defaut"];
        }
    }
?>