<h1>Design Temporaire - Ajouter une Classe</h1>
<?php echo $erreurMessage?>
<form action="./?action=admin_createClasse" method="post" id="createClasse_form">
    <div>
        <input type="text" id="create_classe_name" name="create_classe_name" placeholder="Nom de la classe" required>
    </div>
    <div>
        <label>Section</label>
        <select id="create_classe_section" name="create_classe_section">
            <?php foreach($sections as $section): ?>
                <option value="<?php echo $section["section_id"]?>"><?php echo $section["section_name"]?></option>
            <?php endforeach?>
            <option value="0">Nouvelle section</option>
        </select>
        <input type="text" id="create_classe_newsection" name="create_classe_newsection" placeholder="Nom de la section">
    </div>

    <div class="button">
        <button type="submit" id="create_classe">Ajouter</button>
    </div>
</form>