<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }
    include_once "model/db_utilisateur.php";
    include_once "model/db_classe.php";
    include_once "model/db_section.php";
    include_once "model/db_stage.php";
    include_once "model/db_entreprise.php";

    
    $title = "Fiche Eleve";
    include "$racine/vue/entete.php";

    if(isset($_GET["idEleve"]) && !empty($_GET["idEleve"]) && ctype_digit($_GET["idEleve"]))
    {
        $eleve = getEleveById($_GET["idEleve"]);
        if($eleve)
        {
            $stages = getAllStagesOfEleveById($eleve["id"]);
            $statuts = getStatuts();
            if(($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST["edit_stageeleve_searchSiren_button"]))
            {
                $sentreprise = getEntrepriseBySiren((string)$_POST["edit_stageeleve_searchSiren"]);
            }
            include "$racine/vue/vueFicheEleve.php";
        }
        else
        {
            include "$racine/vue/vueNoFicheEleve.php";
        }
    }
    else
    {
        include "$racine/vue/vueNoFicheEleve.php";
    }

    include "$racine/vue/pied.php";
?>