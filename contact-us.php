<?php
$connexion= new PDO('mysql:host=127.0.0.1;dbname=users_base1','root','');
$message = "";
if(isset($_POST['valider'])){

    if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['subject']) AND !empty($_POST['message'])){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $messagecontent = htmlspecialchars($_POST['message']);

        $insertion= $connexion->prepare('INSERT INTO contact(name,email,subject,message) VALUES (?,?,?,?)');
        $insertion->execute(array($name,$email,$subject,$messagecontent));
        $message = " Your message has been sent. Thank you!  😊" ;
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
  <title>Contact </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link href="contact.css" rel="stylesheet">
</head>
<body>
    <section class="contact">
      <div class="container">
        <div class="row">
           <p class="us"> <i >     contact us : </i></p>
           <h5 class="vide">-</h5>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>Bizerte,Manzel bourguiba,7041</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>best-burger100@gmail.com<br>fasty-food@gmail.com</p>
                </div> </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p><br>+216 27 103 505<br>+216 950 251 033</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <form action="" method="POST" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
            
                
                <div class="sent-message">
                
                </div>
              </div>
              <div class="text-center"><button type="submit" name="valider">Send Message</button>  <br>   <?php echo"$message"; ?></div>
            </form>
          </div></div></div>
    </section>
    <section class="map mt-2">
      <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sbg!4v1579767901424!5m2!1sen!2sbg" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </section>
  </main>
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Welcome to contact us, and we are waiting for your inquiries and opinions.</p>
          </div>
          <div class="col-lg-6">
          </div></div></div></div>
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="p.html">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about us.html">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="menu.html">menu</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">inscription</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
             <u> Bizerte,Manzel bourguiba 7041 </u>
              <strong>Phone:</strong><br> +216 27 103 505/ +216 950 251 033<br>
              <strong>Email:</strong>best-burger100@gmail.com<br>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About us</h3>
            <p>we are ready to serve you no matter where you choose to dine.
              best-burger100 welcomes you to join us for a unique experience at one of our beautifully designed .</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div></div></div>  
  </footer>
  <script src="projet/php-email-form/validate.js"></script>
</body>
</html>