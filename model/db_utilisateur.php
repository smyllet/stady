<?php
    include_once "db.php";

    function createAccount($identifiant, $name, $firstName, $email, $dateOfBirth, $type, $active, $password, $need_new_password)
    {
        $crypt_password = password_hash($password,PASSWORD_DEFAULT);

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into Users (user_identifiant, user_name, user_firstName, user_email, user_dateOfBirth, user_type, user_active, user_password, need_new_password) values (:identifiant,:name,:firstName,:email,:dateOfBirth,:type,:active,:crypt_password,:need_new_password)");
            $req->bindValue(':identifiant', $identifiant);
            $req->bindValue(':name', $name);
            $req->bindValue(':firstName',$firstName);
            $req->bindValue(':email',$email);
            $req->bindValue(':dateOfBirth',$dateOfBirth);
            $req->bindValue(':type',$type);
            $req->bindValue(':active',$active);
            $req->bindValue(':crypt_password',$crypt_password);
            $req->bindValue(':need_new_password',$need_new_password);
            $req->execute();
            return 'created';
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage();
            return 'error';
        }
    }

    function getUsers() {
        $result = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Users");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne)
            {
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getUserByIdentifiant($identifiant) {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Users where user_identifiant=:identifiant");
            $req->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
?>