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
        $newsection = ($section_id == 0) ? $_POST["create_classe_newsection"] : null;
        
        if(empty($name))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir un nom de classe</p>';
        }
        else if(getClasseByName($name))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Ce nom de classe est déja utilisé</p>';
        }
        else if(($newsection != null) && empty($newsection))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Veuillez entrer un nom de section</p>';
        }
        else if(($newsection != null) && getClasseByName($newsection))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Ce nom de section existe déja</p>';
        }
        else
        {
            if($newsection != null)
            {
                $res = createSection($newsection);
                if($res == 'created')
                {
                    $section = getSectionByName($newsection);
                    $section_id = $section["section_id"];
                }
                else
                {
                    $erreurMessage = '<p style="color: #FF0000; font-size: 70%;">Erreur lors de la création de la section</p>';
                }
            }
            $res = ($section_id != 0) ? createClasse($name, $section_id) : null;
            $erreurMessage = ($res == 'created') ? '<p style="color: #04A424; font-size: 70%;">Classe créé</p>' : '<p style="color: #FF0000; font-size: 70%;">Erreur lors de la création de la classe</p>';
        }
    }


    include "$racine/vue/admin/vueCreateClasse.php";
    include "$racine/vue/pied.php";
?>