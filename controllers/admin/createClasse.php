<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }

    include_once "model/db_classe.php";
    include_once "model/db_section.php";

    $sections = getSections();
    $erreurMessage = "";
    
    $title = "Ajouter une classe";
    include "$racine/vue/entete.php";
    

    if(!isset($_POST["create_classe_name"]))
    {
        //todo
    }
    else
    {       
        $name = $_POST["create_classe_name"];
        $section_id = $_POST["create_classe_section"];
        
        if(empty($name))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir un nom de classe</p>';
        }
        else if(getClasseByName($name))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Ce nom de classe est déja utilisé</p>';
        }
        else
        {
            $res = createClasse($name, $section_id);
            $erreurMessage = ($res == 'created') ? '<p style="color: #04A424; font-size: 70%;">Classe créé</p>' : '<p style="color: #FF0000; font-size: 70%;">Erreur lors de la création de la classe</p>';
        }
    }


    include "$racine/vue/admin/vueCreateClasse.php";
    include "$racine/vue/pied.php";
?>