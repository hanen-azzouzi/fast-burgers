<?php
$connexion=new PDO('mysql:host=127.0.0.1;dbname=user_base1','root','');
if($connexion)
{
  echo "connecter";
}
if(isset($_POST['valid']))
{
   if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['password'])){
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['password']);

    if (strlen($_POST['password'])<7){
        $message ="votre mot de passe est trop court.";

    }elseif(strlen(nom)>50){
      $message = "votre nom est trop long";
    }
   }else{
      $message = "remplisser tous les champs.";
   }
}
?>