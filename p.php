<?php
$connexion= new PDO('mysql:host=127.0.0.1;dbname=users_base1','root','');

if(isset($_POST['valid']))
{
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
       
        $req= $connexion->prepare('SELECT * FROM users WHERE email =? AND password = ?');
        $req->execute(array($email,$password));
        $cpt = $req->rowCount();

        if ($cpt==1) {
            $message = "welcome";
        }else{
            $message = "sorry not found";
        }

    }else{
        $message="*fill in the fields*";
    }


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>aceuil</title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="icon" href="nn.png" type="image/x-icon">
    <script src="anim.js"></script>
    
        
    
</head>
<body>
  
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <video autoplay  loop muted plays-inline class="bak">
                    <source src="d2.mp4">
                </video>
                <div class="flex flex-shrink-0 items-center">
                    <img class="ber" src="nn.png" alt="Your Company">
                </div>
                <h2 class="logo"><u>FAST-FOOD</u></h2>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
                <script src="anim.js"></script>
                <link href='https://fonts.googleapis.com/css?family=Permanent+Marker:400' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
                <link href='https://fonts.googleapis.com/css?family=Permanent+Marker:400' rel='stylesheet' type='text/css'>
            </div>

            <div class="menu">
                <ul class="animate__animated animate__swing">
                    <li><a href="#">HOME</a></li>
                    <li><a href="about us.html">ABOUT </a></li>
                    <li><a href="m.php">MENU</a></li>
                    <li><a href="contact-us.php">CONTACT</a></li>
                </ul>
            </div>
                
            <div class="search">
                <input class="srch" type="search" name="" placeholder=" BURGERS">
                <a href="#"> <button class="btn">Search</button></a>
            </div>
        
        </div> 
        <div class="content">
            <h1>The best burger <br><span>is made frech </span> <br>everyday</h1><br>
            <p class="ml2">   
                 <strong><i class="animate__animated animate__flash"> ALL OUR BURGERS ARE MADE FRESH EVERYDAY. Our original burgers are handmade in-store  <br>
                    and come topped with fresh lettuce, onions, tomato, and cheese along with a choice of our Homemade<br><br><br></i></p></strong>

                <button class="cn"><a href="about us.html">JOIN US</a></button>
                    <form method="post">
                <div class="form">
                    <h2 >Login Here</h2>
                    <input type="email" name="email" placeholder="Enter Email Here">
                    <input type="password" name="password" placeholder="Enter Password Here">
                    <button class="btnn" type="buton" name ="valid">Login</button>
                    <?php
                          if (isset($message)) {
                                echo "<i style=\"color:re\">$message</i>";
                                 }
                                     ?>
                    <p class="link">Don't have an account<br>
                    <a  href="formulaire.php">Sign up </a> here</a></p>
                    <p class="link">Log in with</p>

                    <div class="icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                    </div>

                </div>
                 </form>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>