<?php
    include_once "db.php";

    function createSection($name)
    {
        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into Section (section_name) values (:name)");
            $req->bindValue(':name', $name);
            $req->execute();
            return 'created';
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage();
            return 'error';
        }
    }

    function getSections()
    {
        $result = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from section");
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

    function getSectionByName($name)
    {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Section where section_name=:name");
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
?>