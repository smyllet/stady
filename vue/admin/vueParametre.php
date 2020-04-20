<h1>Parametre Admin - Design Temporaire</h1>
<form action="./?action=admin_parametre" method="post" id="AP_FormEtablessementInfo">
    <h2>Texte en page d'acceuil</h2>
    <?php echo $erreurMessage?>
    <div>
        <input type="text" id="text" name="AP_InputEtablissementName" placeholder="Nom de l'établissement" required value="<?php if(isset($EtablissementName)) echo $EtablissementName?>">
    </div>
    <div>
        <textarea id="AP_InputEtablissementDesc" name="AP_InputEtablissementDesc" placeholder="Description de l'établissement" required><?php if(isset($EtablissementDesc)) echo $EtablissementDesc?></textarea>
    </div>
    <div class="button">
        <button type="submit">Changer</button>
    </div>
</form>