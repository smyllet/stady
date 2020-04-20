<?php
    include_once "db.php";

    function createProfil($name, $firstName, $email, $tel, $dateOfBirth, $type, $identifiant, $admin, $password, $active, $need_new_password)
    {
        $crypt_password = ($password == null) ? null : password_hash($password,PASSWORD_DEFAULT);

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into Profil (profil_name, profil_firstName, profil_email, profil_tel, profil_dateOfBirth, profil_type, account_identifiant, account_admin, account_password, account_active, account_need_new_password) values (:name, :firstName, :email, :tel, :dateOfBirth, :type, :identifiant, :admin, :crypt_password, :active, :need_new_password)");
            $req->bindValue(':name', $name);
            $req->bindValue(':firstName',$firstName);
            $req->bindValue(':email',$email);
            $req->bindValue(':tel',$tel);
            $req->bindValue(':dateOfBirth',$dateOfBirth);
            $req->bindValue(':type',$type);
            $req->bindValue(':identifiant', $identifiant);
            $req->bindValue(':admin', $admin);
            $req->bindValue(':crypt_password',$crypt_password);
            $req->bindValue(':active',$active);
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
            $req = $cnx->prepare("select * from Profil");
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
            $req = $cnx->prepare("select * from Profil where account_identifiant=:identifiant");
            $req->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getFiltreProfil()
    {
        $result = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select id, profil_name, profil_firstName, profil_email, profil_tel, profil_dateOfBirth, type_name, account_identifiant, account_admin, account_active from Profil inner join TypeAccount on profil_type = type_id");
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
?>