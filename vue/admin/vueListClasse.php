<h1>Design Temporaire - Liste Classes</h1>
<table width="100%" rules="groups" border="0">
    <thead>
        <th align="left">Classe</th>
        <th align="left">Section</th>
        <th align="left">Nombre d'éleves</th>
    </thead>
    <tbody>
    <?php foreach ($classes as $classe): ?>
        <tr>
            <td><?php echo $classe["classe"]?></td>
            <td><?php echo $classe["section"]?></td>
            <td><?php echo $classe["nb_eleves"]?></td>
        <tr>
    <?php endforeach ?>
    </tbody>
</table>