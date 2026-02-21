<?php

try {
    $con = new PDO('mysql:host=localhost;dbname=payement', 'root', '');
} catch (Exception $e) {
    die('Echec de connection ' . $e->getMessage());
}

if (isset($_GET['enr'])) {
    function produit()
    {
        $nbr1 = isset($_GET['nbr1']) ? (int) $_GET['nbr1'] : 0;
        $nbr2 = isset($_GET['nbr2']) ? (int) $_GET['nbr2'] : 0;
        $nbr3 = isset($_GET['nbr3']) ? (int) $_GET['nbr3'] : 0;
        return  $nbr1 * $nbr2 * $nbr3;
    }

    $enr = produit();

    $req = $con->prepare('INSERT INTO produit (res_produit) values(?)');
    $req->execute([$enr]);
    header('location:info.php?action=reussite');
} else {
    header('location:info.php?action=erreur');
}
