<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }

    include "$racine/getConfig.php";
    $EtablissementName = $config->{'info-ecole'}->{'name'};
    $EtablissementDesc = $config->{'info-ecole'}->{'desc-ac'};
    $erreurMessage = "";

    if (!isset($_POST["AP_InputEtablissementName"]) || !isset($_POST["AP_InputEtablissementDesc"]))
    {
        // on affiche la page des paramètre admin
        $title = "Paramètre Admin";
        include "$racine/vue/entete.php";
        include "$racine/vue/admin/vueParametre.php";
        include "$racine/vue/pied.php";
    }
    else
    {
        $config->{'info-ecole'}->{'name'} = $_POST["AP_InputEtablissementName"];
        $config->{'info-ecole'}->{'desc-ac'} = $_POST["AP_InputEtablissementDesc"];

        try
        {
            file_put_contents("$racine/config.json", json_encode($config));
            $erreurMessage = '<p style="color: #04A424; font-size: 70%;">Texte de la page d\'acceuil mise à jour</p>';
        }
        catch(Exception $e)
        {
            $erreurMessage = '<p style="color: #A40404; font-size: 70%;">Erreur lors de la mise à jour du texte de la page d\'acceuil</p>';
        }

        
        $title = "Paramètre Admin";
        include "$racine/vue/entete.php";
        include "$racine/vue/admin/vueParametre.php";
        include "$racine/vue/pied.php";
    }
?>