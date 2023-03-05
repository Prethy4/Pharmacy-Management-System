<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <h3>why choose us?</h3>
         <p>We provide best medicine, Skin care products, Sergical equipment and Baby Cares in town. Our motive is to serve our customer with best products. All our products are up to date and licenced. Hope you'll like shopping with us. :) </p>
         <a href="contact.php" class="btn">contact us</a>
      </div> <br></br><br></br>

   </div>

</section>

<section class="about">

   <div class="row">

      <div class="box">
         <h3>what we provide?</h3>
         <p>We provide best products as per your desire. Customer satisfaction is our main motive.</p>
         <a href="shop.php" class="btn">our shop</a>
      </div>

   </div> <br></br><br></br>

   <div class="row">

      <div class="box">
         <h3>Our Location</h3>
         <p>Pharma Shop, Telihaor(near North East University Bangladesh), Sheikhghat, Sylhet</p>
         <iframe src="https://www.google.com/maps/d/embed?mid=17HFtQvtLJX0qhMd54Kk_7TenoMco64Y&ehbc=2E312F" width="640" height="480">
         </iframe>
      </div>

   </div>

</section>




<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>