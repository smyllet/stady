<h1>Design Temporaire - Ajouter un profil</h1>
<?php echo $erreurMessage?>
<form action="./?action=admin_createProfil" method="post" id="createProfil_form">

        <h1>Profil</h1>
        <div>
            <input type="text" id="create_profil_name" name="create_profil_name" placeholder="Nom" required>
            <input type="text" id="create_profil_firstName" name="create_profil_firstName" placeholder="Prénom" required>
        </div>
        <div>
            
            <input type="email" id="create_profil_email" name="create_profil_email" placeholder="Email">

            <input type="tel" id="create_profil_tel" name="create_profil_tel" placeholder="Téléphone">
        </div>
        <div>
            <label>Date de naissance</label>
            <input type="date" id="create_profil_naissance" name="create_profil_naissance" placeholder="Date de naissance">
        </div>
        <div>
            <label>Type de profil</label>
            <select id="create_profil_type" name="create_profil_type" value="4">
                <?php foreach($types as $type): ?>
                    <option value="<?php echo $type["type_id"]?>"><?php echo $type["type_name"]?></option>
                <?php endforeach?>
            </select>
        </div>


    <br>


        <h1>Compte</h1>
        <div>
            <label>Créer un compte utilisateur</label>
            <input type="checkbox" id="create_profil_creation" name="create_profil_creation">
        </div>
        <div>
            <input type="text" id="create_profil_identifiant" name="create_profil_identifiant" placeholder="Identifiant">
        </div>
        <div>
            <input type="password" id="create_profil_password" name="create_profil_password" placeholder="Mot de passe">
        </div>
        <div>
            <label>Changement de mot de passe requis</label>
            <input type="checkbox" id="create_profil_newpass" name="create_profil_newpass">
        </div>
        <div>
            <label>Administrateur</label>
            <input type="checkbox" id="create_profil_admin" name="create_profil_admin">
        </div>
        <div>
            <label>Activer</label>
            <input type="checkbox" id="create_profil_active" name="create_profil_active">
        </div>


    <div class="button">
        <button type="submit" id="create_profil">Ajouter</button>
    </div>
</form>