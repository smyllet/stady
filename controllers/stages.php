<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }
    include_once "model/db_utilisateur.php";
    include_once "model/db_classe.php";
    include_once "model/db_section.php";
    include_once "model/db_stage.php";

    $erreurMessage = "";
    $rName = null;
    $rFirstName = null;
    $rEmail = null;
    $rTel = null;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_GET["form"] == "createStage")
        {
            $name = $_POST["create_stage_name"];
            $start = ($_POST["create_stage_start"] == "") ? null : date_format(new DateTime($_POST["create_stage_start"]), 'Y-m-d');
            $end = ($_POST["create_stage_end"] == "") ? null : date_format(new DateTime($_POST["create_stage_end"]), 'Y-m-d');
            $classe_id = $_POST["create_stage_classe"];

            if(empty($name))
            {
                $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir un nom</p>';
            }
            else if($start == null)
            {
                $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir une date de début</p>';
            }
            else if($end == null)
            {
                $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir une date de fin</p>';
            }
            else
            {
                $res = createStage($name, $start, $end);
                if($res == 'created')
                {
                    $lastId = getLastStage();
                    $res = addClasseInStage($lastId, $classe_id);
                    $erreurMessage = ($res == 'created') ? '<p style="color: #04A424; font-size: 70%;">Stage ajouté</p>' : '<p style="color: #FF0000; font-size: 70%;">Erreur lors de l\'ajout du stage</p>';
                }
                else
                {
                    $erreurMessage = '<p style="color: #FF0000; font-size: 70%;">Erreur lors de l\'ajout du stage</p>';
                }
            }
        }
    }

    $stages = getFullStages();
    $classes = getClasses();
    //$sections = getSections();

    $title = "Stages";
    include "$racine/vue/entete.php";
    include "$racine/vue/vueStages.php";
    include "$racine/vue/pied.php";
?>