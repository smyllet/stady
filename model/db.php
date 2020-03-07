<?php
    function connexionPDO() { //Fonction de connexion à la base donnée
        include "getConfig.php"; //Récupération de la config
        
        //Renseignement des information concernant la base donnée
        $login = $config->{'database-connexion'}->{'login'};
        $password = $config->{'database-connexion'}->{'password'};
        $db = $config->{'database-connexion'}->{'database'};
        $server = $config->{'database-connexion'}->{'server'};

        try
        {
            //Connexion à la base de donnée
            $connexion = new PDO("mysql:host=$server;dbname=$db", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connexion; //Retourner la connexion
        }
        catch (PDOException $e) //Si la connexion echoue
        {
            print "Erreur de connexion à la base de donnée"; //Informé qu'il y a une erreur
            die(); //Tué le processus
        }
    }
?>
