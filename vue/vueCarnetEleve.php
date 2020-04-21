<h1>Visuel Temporaire - Carnet d'éleve</h1>
<?php echo $erreurMessage?>
<div id="ListeEleve">
    <h3>Liste d'éleves</h3>
    <table width="50%" rules="groups" border="0">
        <thead>
            <th align="left">Nom</th>
            <th align="left">Prénom</th>
            <th align="left">Email</th>
            <th align="left">Téléphone</th>
            <th align="left">Date de naissance</th>
            <th align="left">Classe</th>
            <th align="left">Section</th>
        </thead>
        <tbody>
        <?php foreach ($eleves as $eleve): ?>
            <tr>
                <td><?php echo $eleve["nom"]?></td>
                <td><?php echo $eleve["prenom"]?></td>
                <td><?php echo $eleve["email"]?></td>
                <td><?php echo $eleve["tel"]?></td>
                <td><?php echo $eleve["dateNaissance"]?></td>
                <td><?php echo $eleve["classe"]?></td>
                <td><?php echo $eleve["section"]?></td>
            <tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<div id="RechercheEleve">
    <h3>Filtrer la liste des élèves</h3>
    <form action="./?action=carnetEleve&form=rechercheEleve" method="post" id="rechercheEleve_form">
        <div>
            <input type="text" id="recherche_eleve_name" name="recherche_eleve_name" placeholder="Nom">
            <input type="text" id="recherche_eleve_firstName" name="recherche_eleve_firstName" placeholder="Prénom">
        </div>
        <div>
            <input type="text" id="recherche_eleve_email" name="recherche_eleve_email" placeholder="Email">
            <input type="tel" id="recherche_eleve_tel" name="recherche_eleve_tel" placeholder="Téléphone">
        </div>
        <div>
            <label>Classe</label>
            <select id="recherche_eleve_classe" name="recherche_eleve_classe">
                <option value=0>Toutes</option>
                <?php foreach($classes as $classe): ?>
                    <option value=<?php echo $classe["classe_id"]?>><?php echo $classe["classe_name"]?></option>
                <?php endforeach?>
            </select>
            <label>Section</label>
            <select id="recherche_eleve_section" name="recherche_eleve_section">
                <option value=0>Toutes</option>
                <?php foreach($sections as $section): ?>
                    <option value=<?php echo $section["section_id"]?>><?php echo $section["section_name"]?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="button">
            <button type="submit" id="create_classe">Filtrer</button>
        </div>
    </form>
</div>
<div id="AjoutEleve">
    <h3>Ajout d'un élève</h3>
    <form action="./?action=carnetEleve&form=createEleve" method="post" id="createEleve_form">
        <div>
            <input type="text" id="create_eleve_name" name="create_eleve_name" placeholder="Nom" required>
            <input type="text" id="create_eleve_firstName" name="create_eleve_firstName" placeholder="Prénom" required>
        </div>
        <div>
            <input type="email" id="create_eleve_email" name="create_eleve_email" placeholder="Email">
            <input type="tel" id="create_eleve_tel" name="create_eleve_tel" placeholder="Téléphone">
        </div>
        <div>
            <label>Date de naissance</label>
            <input type="date" id="create_eleve_naissance" name="create_eleve_naissance" placeholder="Date de naissance">
        </div>
        <div>
            <label>Classe</label>
            <select id="create_eleve_classe" name="create_eleve_classe">
                <?php foreach($classes as $classe): ?>
                    <option value=<?php echo $classe["classe_id"]?>><?php echo $classe["classe_name"]?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="button">
            <button type="submit" id="create_classe">Ajouter</button>
        </div>
    </form>
</div>