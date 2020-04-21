<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }
    include_once "model/db_utilisateur.php";
    include_once "model/db_classe.php";
    include_once "model/db_section.php";

    $erreurMessage = "";
    $rName = null;
    $rFirstName = null;
    $rEmail = null;
    $rTel = null;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_GET["form"] == "createEleve")
        {
            $name = $_POST["create_eleve_name"];
            $firstName = $_POST["create_eleve_firstName"];
            $email = ($_POST["create_eleve_email"] == null) ? null : trim ($_POST["create_eleve_email"]);
            $tel = ($_POST["create_eleve_tel"] == "") ? null : trim ($_POST["create_eleve_tel"]);
            $naissance = ($_POST["create_eleve_naissance"] == "") ? null : date_format(new DateTime($_POST["create_eleve_naissance"]), 'Y-m-d');
            $classe = $_POST["create_eleve_classe"];

            if(empty($name))
            {
                $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir un nom</p>';
            }
            else if(empty($firstName))
            {
                $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir un prénom</p>';
            }
            else if(strlen($tel) > 12)
            {
                $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Le numéro de téléphone ne peux dépasser 12 caractère</p>';
            }
            else
            {
                $res = createEleve($name, $firstName, $email, $tel, $naissance, $classe);
                $erreurMessage = ($res == 'created') ? '<p style="color: #04A424; font-size: 70%;">Elève ajouté</p>' : '<p style="color: #FF0000; font-size: 70%;">Erreur lors de l\'ajout de l\'élève</p>';
            }
        }
        else if($_GET["form"] == "rechercheEleve")
        {
            $rName = $_POST["recherche_eleve_name"];
            $rFirstName = $_POST["recherche_eleve_firstName"];
            $rEmail = ($_POST["recherche_eleve_email"] == null) ? null : trim ($_POST["recherche_eleve_email"]);
            $rTel = ($_POST["recherche_eleve_tel"] == "") ? null : trim ($_POST["recherche_eleve_tel"]);
            if(strlen($rTel) > 12) $rTel = null;
        }
    }

    $eleves = getFiltreEleves($rName,$rFirstName,$rEmail,$rTel,null,null);
    $classes = getClasses();
    $sections = getSections();

    $title = "Carnet d'éleve";
    include "$racine/vue/entete.php";
    include "$racine/vue/vueCarnetEleve.php";
    include "$racine/vue/pied.php";
?>