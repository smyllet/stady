<?php
    include_once "db_utilisateur.php"; //modele utilisateurs - base de donnée

    function login($identifiant, $password) { //Fonction de connexion d'utilisateur
        if (!isset($_SESSION)) session_start(); //Si il n'existe pas de session alors créer une session

        $user = getUserByIdentifiant($identifiant); //Optenir les information lié à l'identifiant
        if (!$user) return "bad_user"; //Si il n'y a pas d'utilisateur alors retourner que le nom d'utilisateur est mauvais

        $passwordDB = $user["account_password"]; //Récupération du mot de l'utilisateur

        if (password_verify($password,$passwordDB)) //si les deux mot de passe sont les même alors . . .
        {
            //Stocker le mot de passe et l'identifiant
            $_SESSION["identifiant"] = $identifiant;
            $_SESSION["password"] = $password;
            return "connected"; //Retourner que l'utilisateur est bien connecter
        }
        else return "bad_password"; //retourner que le mot de passe est mauvais
    }

    function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["identifiant"]);
        unset($_SESSION["password"]);
    }

    function getIdentifiantLoggedOn()
    {
        if (isLoggedOn()){
            $ret = $_SESSION["identifiant"];
        }
        else {
            $ret = "";
        }
        return $ret;
            
    }

    function isLoggedOn()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $ret = false;

        if (isset($_SESSION["identifiant"])) {
            $util = getUserByIdentifiant($_SESSION["identifiant"]);
            if ($util["account_identifiant"] == $_SESSION["identifiant"] && password_verify($_SESSION["password"],$util["account_password"]))
            {
                $ret = true;
            }
        }
        return $ret;
    }

    function isAdmin()
    {
        $ret = false;
        if (isLoggedOn())
        {
            $util = getUserByIdentifiant($_SESSION["identifiant"]);
            if ($util["account_admin"] == 1)
            {
                $ret = true;
            }
        }

        return $ret;
    }
?>