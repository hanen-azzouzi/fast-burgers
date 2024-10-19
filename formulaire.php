<?php
$connexion= new PDO('mysql:host=127.0.0.1;dbname=users_base1','root','');

if(isset($_POST['valid']))
{
   if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['password'])){
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['password']);

    if (strlen($_POST['password'])<5){
        $message ="your password is too short.";

    }elseif(strlen($nom)>15){
      $message = "your password is too long";
    }else{
      $testmail= $connexion->prepare('SELECT * FROM  users WHERE email = ?');
      $testmail->execute(array($email));
      $controlmail=$testmail->rowCount();
      if($controlmail==0){

      


      $insertion= $connexion->prepare('INSERT INTO users(nom,email,password) VALUES (?,?,?)');
      $insertion->execute(array($nom,$email,$mdp));
      $message = " Your account has been created  😊" ;
    
             } else {
              
             $message = "Sorry, this address already had an account.";
                   }
     
    }

   }else{
      $message = "fill in all fields.";
   }
}
?>

<!DOCTYPE html>
<html>
<head>  
 <meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>formulaire</title>
<link rel="stylesheet" href="formulaire.css">
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
  <div class="container">
    <div class="overlay" id="overlay">
      <div class="sign" id="sign">
        <h1>hello guys!</h1>
        <p>   
        
      
        To keep connected with us please login with your personal info</p>
        <button class="switch-button" id="slide-right-button"> <a href=" p.php">Home</a></button>
      </div>
    </div> 
    <div class="form">
      <div class="sign" id="sign-info">
        
        <div class="social-media-buttons">
          <div class="icon">
            <svg viewBox="0 0 24 24">
              <path fill="#000000" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
          </svg>
          </div>
          <div class="icon">
          <svg viewBox="0 0 24 24">
              <path fill="#000000" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z" />
          </svg>
          </div>
          <div class="icon">
          <svg viewBox="0 0 24 24">
            <path fill="#000000" d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z" />
          </svg>
          </div>
        </div>
  
      </div>
      <div class="sign-up" id="sign-up-info">
        <h1 > 
         <br> Create Account  </h1>
        <div class="social-media-buttons">
          <div class="icon">
            <svg viewBox="0 0 24 24">
              <path fill="#000000" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
          </svg>
          </div>
          <div class="icon">
          <svg viewBox="0 0 24 24">
              <path fill="#000000" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z" />
          </svg>
          </div>
          <div class="icon">
          <svg viewBox="0 0 24 24">
            <path fill="#000000" d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z" />
          </svg>
          </div>
        </div>
        <p class="small">   or use your email for registration:</p>
        <form id="sign-up-form" method="POST" action="">
          <input type="text"  name="nom" placeholder="Name"/>
          <input type="email" name="email"  placeholder="Email"/>
          <input type="password" name="password"  placeholder="Password"/>
          <button class="control-button up" type="submit" name="valid">Sign up  </button>
          <br>
          <?php
          if (isset($message)) {
          echo "<i style=\"color:black\">$message</i>";
            }
          ?>
          
        
        </form>
      </div>
    </div>
  </div>

</body>