<?php
 //verifier si une session existe
session_start();//f d
    //si non demarer la session
if (!isset($_SESSION['produit'])) {
    $_SESSION['produit'] = array();
}

// Inclure la page de connexion
include_once "ok.php";
//ajout le produit au panier
// Vérifier si le produit est ajouté au panier
if (isset($_GET['id'])) {
    // Récupérer l'ID du produit depuis l'URL
    $product_id = $_GET['id'];

    // Ajouter le produit au panier
    if (!isset($_SESSION['produit'][$product_id])) {//ne pas presente
        $_SESSION['produit'][$product_id] = 1;
    } else {
        $_SESSION['produit'][$product_id]++;
    }
}

// Afficher le nombre de produits dans le panier
$nombre_produits_panier = array_sum($_SESSION['produit']); //arry role calculer les pro
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
    <link rel="stylesheet" href="menu.css">

</head>
<body> 
    <p  class="nn">Menu</p>
   


    <!-- Afficher le nombre de produit dans le panier -->
    <a href="panier.php" class="link">Panier<span><?= $nombre_produits_panier ?></span></a>

    <section class="products_list">
        <?php 
        // Afficher la liste des produits
        $req = mysqli_query($con, "SELECT * FROM menu");
        while ($row = mysqli_fetch_assoc($req)) { //y des lignes de résultar a
        ?>
        <form action="" class="product">
            <div class="image_product">
                <img src="project_images/<?= $row['img'] ?>">
            </div>
            <div class="content">
                <h4 class="name"><?= $row['name'] ?></h4>
                <h2 class="price"><?= $row['price'] ?>dt</h2>
                <a href="ajouter_panier.php?id=<?= $row['id'] ?>" class="id_product">Ajouter au panier</a>
            </div>
        </form>
        <!--transmettre don par get-->
        <?php } ?>
    </section>
</body>
</html>