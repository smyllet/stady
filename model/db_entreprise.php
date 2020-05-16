<?php
    include_once "db.php";

    function createEntreprise($name, $siren, $secteur, $tel, $adresse, $cp, $ville, $nbSalaries, $dateCreation)
    {
        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into Entreprise (entreprise_name, entreprise_siren, entreprise_secteurActivite, entreprise_tel, entreprise_adresse, entreprise_cp, entreprise_ville, entreprise_nbSalaries, entreprise_dateCreation) values (:name, :siren, :secteur, :tel, :adresse, :cp, :ville, :nbSalaries, :dateCreation)");
            $req->bindValue(':name', $name);
            $req->bindValue(':siren',$siren);
            $req->bindValue(':secteur',$secteur);
            $req->bindValue(':tel', $tel);
            $req->bindValue(':adresse', $adresse);
            $req->bindValue(':cp', $cp);
            $req->bindValue(':ville', $nbSalaries);
            $req->execute();
            return 'created';
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage();
            return 'error';
        }
    }

    function getEntreprises() {
        $resultat = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Entreprise");
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

    function getLastEntreprise() {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT MAX(entreprise_id) as id FROM Entreprise");
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat["id"];
    }

    function getEntrepriseById($id) {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Entreprise where entreprise_id=:id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getEntrepriseBySiren($siren) {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Entreprise where entreprise_siren=:siren");
            $req->bindValue(':siren', $siren, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
?>