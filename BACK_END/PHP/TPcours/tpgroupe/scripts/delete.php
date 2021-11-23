<?php
include "../mysqli.php";
$reqdel = "DELETE FROM pokemon WHERE id=".$_POST['id'];
$delete = mysqli_query($connexionMySql, $reqdel);