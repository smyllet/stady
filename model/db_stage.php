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

    function getAllStagesOfEleveById($id) {
        $resultat = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT st.stage_id, st.stage_name, st.stage_date_start, st.stage_date_end, se.stageEleve_entreprise_id AS 'entreprise_id', se.stageEleve_tuteur_id AS 'tuteur_id', se.stageEleve_referent_id AS 'referent_id', stu.statut_name AS 'statut', ROUND(DATEDIFF(st.stage_date_end,st.stage_date_start)/7,0) AS 'week_duree' FROM profil_eleve e INNER JOIN stageclasse sc ON e.e_id_classe = sc.stageClasse_classe_id INNER JOIN stage st ON st.stage_id = sc.stageClasse_stage_id LEFT JOIN stageeleve se ON (e.id = se.stageEleve_eleve_id) AND (st.stage_id = se.stageEleve_stage_id) LEFT JOIN statut stu ON IFNULL(se.stageEleve_statut_id,1) = stu.statut_id WHERE e.id = :id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
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

    function getStatuts()
    {
        $result = array();

        try
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from statut");
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