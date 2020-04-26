<h1>Visuel Temporaire - Stages</h1>
<?php echo $erreurMessage?>
<div id="ListeStage">
    <h3>Liste des stages</h3>
    <table width="50%" rules="groups" border="0">
        <thead>
            <th align="left">Intitulé</th>
            <th align="left">Date de début</th>
            <th align="left">Date de fin</th>
            <th align="left">Nombre de classe</th>
            <th align="left">Nombre d'élèves</th>
        </thead>
        <tbody>
        <?php foreach ($stages as $stage): ?>
            <tr>
                <td><?php echo $stage["stage_name"]?></td>
                <td><?php echo $stage["stage_date_start"]?></td>
                <td><?php echo $stage["stage_date_end"]?></td>
                <td><?php echo $stage["nb_classe"]?></td>
                <td><?php echo $stage["nb_eleve"]?></td>
            <tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<hr>
<div id="AjoutStage">
    <h3>Ajout d'un stage</h3>
    <form action="./?action=stages&form=createStage" method="post" id="createStage_form">
        <div>
            <input type="text" id="create_stage_name" name="create_stage_name" placeholder="Intitulé stage" required>
        </div>
        <div>
            <label>Date de début</label>
            <input type="date" id="create_stage_start" name="create_stage_start">
        </div>
        <div>
            <label>Date de fin</label>
            <input type="date" id="create_stage_end" name="create_stage_end">
        </div>
        <div>
            <p>Classe devant effectuer le stage</p>
            <select id="create_stage_classe" name="create_stage_classe">
                <?php foreach($classes as $classe): ?>
                    <option value=<?php echo $classe["classe_id"]?>><?php echo $classe["classe_name"]?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="button">
            <button type="submit" id="create_stage">Ajouter</button>
        </div>
    </form>
</div>