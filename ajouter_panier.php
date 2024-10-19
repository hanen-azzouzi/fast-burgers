<?php
//inclure la page de connexion
 include_once "ok.php";
 //verifier si une session existe
 if(!isset($_SESSION)){

    session_start();
 }
 //creer la session
 if(!isset($_SESSION['produit'])){
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['produit'] = array();
 }
 //récupération de l'id dans le lien
  if(isset($_GET['id'])){//si un id a été envoyé alors :
    $id = $_GET['id'] ;
    //verifier grace a l'id si le produit existe dans la base de  données
    $produit = mysqli_query($con ,"SELECT * FROM menu WHERE id = $id") ;
    if(empty(mysqli_fetch_assoc($produit))){
        //si ce produit n'existe pas
        die("Ce produit n'existe pas");
    }
    //ajouter le produit dans le panier ( Le tableau)

    if(isset($_SESSION['produit'][$id])){// si le produit est déjà dans le panier
        $_SESSION['produit'][$id]++; //Représente la quantité 
    }else {
        //si non on ajoute le produit
        $_SESSION['produit'][$id]= 1 ;
    }

   //redirection vers la page index.php
   header("Location:m.php");


  }
?>