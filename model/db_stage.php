<?php
    include_once "db.php";

    function createStage($name, $start, $end)
    {
        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into Stage (stage_name, stage_date_start, stage_date_end) values (:name, :start, :end)");
            $req->bindValue(':name', $name);
            $req->bindValue(':start',$start);
            $req->bindValue(':end',$end);
            $req->execute();
            return 'created';
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage();
            return 'error';
        }
    }

    function addClasseInStage($stage_id, $classe_id)
    {
        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("INSERT INTO stageclasse (stageClasse_stage_id,stageClasse_classe_id) VALUES (:stage_id,:classe_id)");
            $req->bindValue(':stage_id', $stage_id);
            $req->bindValue(':classe_id',$classe_id);
            $req->execute();
            return 'created';
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage();
            return 'error';
        }
    }

    function getStages() {
        $resultat = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Stage");
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

    function getLastStage() {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT MAX(stage_id) as id FROM stage");
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat["id"];
    }

    function getFullStages() {
        $resultat = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT s.stage_id, s.stage_name, s.stage_date_start, s.stage_date_end, (SELECT COUNT(sc.stageClasse_id) FROM stageclasse sc WHERE sc.stageClasse_stage_id = s.stage_id) AS nb_classe, (SELECT COUNT(e.id) FROM profil_eleve e INNER JOIN classe c ON e.e_id_classe = c.classe_id INNER JOIN stageclasse sc ON sc.stageClasse_classe_id = c.classe_id WHERE sc.stageClasse_stage_id = s.stage_id) AS nb_eleve FROM stage s");
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

    function getStageById($id) {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from Stage where stage_id=:id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
?>