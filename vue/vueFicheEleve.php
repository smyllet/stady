<h1>Visuel Temporaire - Fiche Eleve</h1>
<div id="ficheEleve_eleve">
    <h2>Elève</h2>
    <table>
        <tr>
            <th align="left">Prénom : </th>
            <td align="left"><?php echo $eleve["prenom"]?></td>
        </tr>
        <tr>
            <th align="left">Nom : </th>
            <td align="left"><?php echo $eleve["nom"]?></td>
        </tr>
        <tr>
            <th align="left">Email : </th>
            <td align="left"><?php echo $eleve["email"]?></td>
        </tr>
        <tr>
            <th align="left">Téléphone : </th>
            <td align="left"><?php echo $eleve["tel"]?></td>
        </tr>
        <tr>
            <th align="left">Date de naissance : </th>
            <td align="left"><?php echo $eleve["dateNaissance"]?></td>
        </tr>
        <tr>
            <th align="left">Classe : </th>
            <td align="left"><?php echo $eleve["classe_name"]?></td>
        </tr>
        <tr>
            <th align="left">Section : </th>
            <td align="left"><?php echo $eleve["section_name"]?></td>
        </tr>
    </table>
</div>

<hr>

<div>
    <h2>Stage(s)</h2>
    <?php foreach ($stages as $stage): ?>
        <form action="./?action=ficheEleve&idEleve=<?php echo $eleve["id"]?>" method="post">
            <input type=hidden value="<?php echo $stage["stage_id"]?>">
            <div>
                <h4><?php echo $stage["stage_name"]?></h4>
                <div>
                    <label>Statut : </label>
                    <select id="edit_stageeleve_statut" name="edit_stageeleve_statut">
                        <?php foreach($statuts as $statut): ?>
                            <option value=<?php echo $statut["statut_id"]?> <?php if($statut["statut_name"] == $stage["statut"]) echo 'selected="selected"' ?>><?php echo $statut["statut_name"]?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div>
                    <label>Durée : </label>
                    <span><?php echo $stage["week_duree"]?> semaines</span>
                </div>
                <div>
                    <label>Début : </label>
                    <span><?php echo $stage["stage_date_start"]?></span>
                </div>
                <div>
                    <label>Fin : </label>
                    <span><?php echo $stage["stage_date_end"]?></span>
                </div>
                <div>
                    <label>Entreprise : </label>
                    <span><?php 
                        if(isset($sentreprise) && !empty($sentreprise))
                        {
                            echo "<span>",$sentreprise["entreprise_name"],"</span>";
                            echo "<input type=hidden name='edit_stageeleve_entreprise' value=",$sentreprise["entreprise_id"],">";
                        }
                        else
                        {
                            echo "<span>",getEntrepriseById($stage["entreprise_id"])["entreprise_name"],"</span>";
                        }
                    ?>
                    <input type="number" id="edit_stageeleve_searchSiren" name="edit_stageeleve_searchSiren" placeholder="n° Siren">
                    <button type="submit" name="edit_stageeleve_searchSiren_button" id="edit_stageeleve_searchSiren_button">Changer</button>
                </div>
                <div>
                    <label>Tuteur : </label>
                    <span><?php echo $stage["tuteur_id"]?></span>
                </div>
                <div>
                    <label>Professeur référent : </label>
                    <span><?php echo $stage["referent_id"]?></span>
                </div>
            </div>
        </form>
        <br>
    <?php endforeach ?>
</div>