<?php 
session_start();
include_once "ok.php";

// supprimer les produits
// si la variable del existe
if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    // suppression
    unset($_SESSION['produit'][$id_del]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body class="panier">
    <a href="m.php" class="link">Boutique</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php 
              $total = 0 ;
              // liste des produits
              // récupérer les clés du tableau session
              $ids = array_keys($_SESSION['produit']);
              // s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
              } else {
                // si oui details
                $products = mysqli_query($con, "SELECT * FROM menu WHERE id IN (".implode(',', $ids).")");

                // liste des produits avec une boucle foreach
                foreach($products as $product):
                    // calculer le total ( prix unitaire * quantité) 
                    // et additionner chaque résultat à chaque tour de boucle
                    $total = $total + $product['price'] * $_SESSION['produit'][$product['id']];
                ?>
                <tr>
                    <td><img src="project_images/<?=$product['img']?>"></td>
                    <td><?=$product['name']?></td>
                    <td><?=$product['price']?>dt</td>
                    <td><?=$_SESSION['produit'][$product['id']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$product['id']?>"><img src="delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>

            <tr class="total">
                <th>Total : <?=$total?>dt</th>
            </tr>
        </table>
    </section>
</body>
</html>
