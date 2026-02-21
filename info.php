<?php
try {
    $con = new PDO('mysql:host=localhost;dbname=payement', 'root', '');
} catch (Exception $e) {
    die('Echec de connection ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Methode GET</title>
</head>

<body>

    <h3>Mon formulaire</h3>
    <form action="traitement.php" method="get">
        <fieldset>
            <legend>Calculateur multication 3 nombres</legend>
            <?php if (isset($_GET['action']) && $_GET['action'] == "erreur") {
                echo '<p style="color: red;">Veillez passer par le formulaire</p>';
            }
            ?>
            <table>
                <tbody>
                    <tr>
                        <td><label for="nbr1">1 er nombre : </label></td>
                        <td><input type="text" value="0" name="nbr1" id="nbr1" required autofocus></td>
                    </tr>
                    <tr>
                        <td><label for="nbr2">2 em nombre : </label></td>
                        <td><input type="text" value="0" name="nbr2" id="nbr2" required></td>
                    </tr>
                    <tr>
                        <td><label for="nbr3">3 em nombre : </label></td>
                        <td><input type="text" value="0" name="nbr3" id="nbr3" required></td>
                    </tr>
                    <tr>
                        <td><input type="reset" value="Annuler" name="annuler"></td>
                        <td><input type="submit" value="Enregistrer" name="enr"></td>
                    </tr>
                </tbody>

            </table>
        </fieldset>
    </form>

    <br>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == "reussite") {
        echo "<script type = 'text/javascript'>alert('Enregistrement reussi')</script>";
    }
    $aff = $con->prepare('SELECT * FROM produit');
    $aff->execute();
    ?>
    <table style="border-collapse: collapse; width: 100%;" border="1">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Resultat produit</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $i = 1;
            while ($donnee = $aff->fetch()) {
            ?>
                <tr>
                    <td><?= 'Produit numero : ' . $i++; ?></td>
                    <td><?= $donnee['res_produit'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>