<?php
    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ )
    {
        $racine="..";
    }

    include_once "model/db_utilisateur.php";
    include_once "model/db_type_account.php";

    $types = getTypeAccount();
    $erreurMessage = "";
    
    $title = "Ajouter un profil";
    include "$racine/vue/entete.php";
    

    if(!isset($_POST["create_profil_name"]) || !isset($_POST["create_profil_firstName"]))
    {
        //todo
    }
    else
    {       
        

        $name = $_POST["create_profil_name"];
        $firstName = $_POST["create_profil_firstName"];
        $email = ($_POST["create_profil_email"] == null) ? null : $_POST["create_profil_email"];
        $tel = ($_POST["create_profil_tel"] == "") ? null : $_POST["create_profil_tel"];
        $naissance = ($_POST["create_profil_naissance"] == "") ? null : date_format(new DateTime($_POST["create_profil_naissance"]), 'Y-m-d');
        $type = $_POST["create_profil_type"];

        $identifiant = null;
        $password = null;
        $need_new_password = 1;
        $active = 0;
        $admin = 0;
        $ac = false;

        if(($type != 4) && isset($_POST["create_profil_creation"]))
        {
            $ac = true;
            $identifiant = $_POST["create_profil_identifiant"];
            $password = $_POST["create_profil_password"];
            $need_new_password = isset($_POST["create_profil_newpass"]) ? 1 : 0;
            $admin = isset($_POST["create_profil_admin"]) ? 1 : 0;
            $active = isset($_POST["create_profil_active"]) ? 1 : 0;
        }

        if(empty($name))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir un nom</p>';
        }
        else if(empty($firstName))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir un prénom</p>';
        }
        else if(($ac) && empty($identifiant))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir un identifiant</p>';
        }
        else if($ac && getUserByIdentifiant($identifiant))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Utilisateur existe déja</p>';
        }
        else if(($ac) && empty($password))
        {
            $erreurMessage='<p style="color: #FF0000; font-size: 70%;">Vous devez saisir un mot de passe</p>';
        }
        else
        {
            $res = createProfil($name, $firstName, $email, $tel, $naissance, $type, $identifiant, $admin, $password, $active, $need_new_password);
            $erreurMessage = ($res == 'created') ? '<p style="color: #04A424; font-size: 70%;">Profil créé</p>' : '<p style="color: #FF0000; font-size: 70%;">Erreur lors de la création du profil</p>';
        }
    }


    include "$racine/vue/admin/vueCreateProfil.php";
    include "$racine/vue/pied.php";
?>