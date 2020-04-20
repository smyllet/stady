<?php
    include_once "db.php";

    function getTypeAccount() {
        $result = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from TypeAccount");
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