<?php
    include_once "db.php";

    function createClasse($name,$section_id)
    {
        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into Classe (classe_name, classe_section_id) values (:name, :section_id)");
            $req->bindValue(':name', $name);
            $req->bindValue(':section_id',$section_id);
            $req->execute();
            return 'created';
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage();
            return 'error';
        }
    }

    function getClasses()
    {
        $result = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Classe");
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

    function getClasseById($id)
    {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Classe where classe_id=:id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getClasseByName($name)
    {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Classe where classe_name=:name");
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getFiltreClassesList()
    {
        $result = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT classe_id, classe_name AS 'classe', section_id, section_name AS 'section' , (SELECT COUNT(id) FROM profil_eleve WHERE e_id_classe = classe_id) AS 'nb_eleves' FROM Classe INNER JOIN section ON classe_section_id = section_id");
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