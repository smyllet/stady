<h1>Design Temporaire - Liste Profil et Utilisateur</h1>
<table width="100%" rules="groups" border="0">
    <thead>
        <th align="left">Nom</th>
        <th align="left">Prénom</th>
        <th align="left">Email</th>
        <th align="left">Téléphone</th>
        <th align="left">Date de naissance</th>
        <th align="left">Type de profil</th>
        <th align="left">Identifiant</th>
        <th align="left">Administrateur</th>
        <th align="left">Compte activé</th>
    </thead>
    <tbody>
    <?php foreach ($profils as $profil): ?>
        <tr>
            <td><?php echo $profil["profil_name"]?></td>
            <td><?php echo $profil["profil_firstName"]?></td>
            <td><?php echo $profil["profil_email"]?></td>
            <td><?php echo $profil["profil_tel"]?></td>
            <td><?php echo $profil["profil_dateOfBirth"]?></td>
            <td><?php echo $profil["type_name"]?></td>
            <td><?php echo $profil["account_identifiant"]?></td>
            <td><?php echo $profil["account_admin"] ? "oui" : "non" ?></td>
            <td><?php echo $profil["account_active"] ? "oui" : "non" ?></td>
        <tr>
    <?php endforeach ?>
    </tbody>
</table>