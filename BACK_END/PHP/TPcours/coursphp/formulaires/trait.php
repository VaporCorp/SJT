<?php var_dump($_POST);?>
<br>
<?php echo $_POST['pw']; ?>
    <ul>
        <?php foreach ($_POST as $valeur) {?> <!-- NE PAS OUBLIER DE DECLARER UNE VALEUR DE SORTIE DANS LE FOREACH -->
            <li><?= $valeur ?></li>
        <?php };?>
    </ul>

