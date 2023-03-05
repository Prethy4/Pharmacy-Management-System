<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};


if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>pick your medication</span>
         <h3>“Medicines ensures lengthy life but not necessarily healthy life.”</h3>
         <p>Water, air, and cleanness are the chief articles in my pharmacy.-Napoleon Bonaoarte</p>
         <a href="about.php" class="btn">about us</a>
      </div>

   </section>

</div>

<section class="home-category">

   <h1 class="title">categories</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/download (1).jpg" alt="">
         <h3>'Medicines"</h3>
         <p>Medicine is the field of health and healing.It covers diagnosis, treatment, and prevention of disease, medical research, and many other aspects of health.</p>
         <br></br><br></br><br></br><br></br><br></br><br></br>
         <a href="category.php?category=Medicines" class="btn">medicine</a>
      </div>

      <div class="box">
         <img src="images/serg.webp" alt="">
         <h3>"Surgical Products"</h3>
         <p>surgical operation - a medical procedure involving an incision with instruments; performed to repair damage or arrest disease in a living body;</p>
         <br></br><br></br><br></br><br></br><br></br>
         <a href="category.php?category=Surgical" class="btn">surgical</a>
      </div>

      <div class="box">
         <img src="images/download.jpg" alt="">
         <h3>"Skin Care"</h3>
         <p>Skin care means the use of cosmetic preparations, antiseptics, tonics, beautifying, or similar work on the body of any person.</p>
         <br></br><br></br><br>
         <a href="category.php?category=Skin Care" class="btn">skin care</a>
      </div>

      <div class="box">
         <img src="images/OIP.jpg" alt="">
         <h3>"Baby Care"</h3>
         <p>Baby Care Products are products intended to be used for infants and children under the age of three. The Baby Care Products are generally composed to be mild and non-irritating and use the ingredients which are selected for these properties.</p>
         <a href="category.php?category=Baby Care" class="btn">baby care</a>
      </div>

   </div>

</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price">BDT<span><?= $fetch_products['price']; ?></span>/=</div>
      <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="add to cart" class="option-btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

</section>

<style>
   .btn{
      background-color: gray;
      border-radius: 20px;

   }
   .home-bg{
      background: url(images/back-one.webp) no-repeat;
      background-size: cover;
      background-position: center;
      height: 60vh;
   }

   .home-bg .home{
      display: flex;
      align-items: center;
      min-height: 60vh;
   }

   .home-bg .home .content{
      width: 50rem;
   }

   .home-bg .home .content span{
      color:var(--white);
      font-size: 2.5rem;
   }

   .home-bg .home .content h3{
      font-size: 3rem;
      text-transform: uppercase;
      margin-top: 1.5rem;
      color:var(--black);
   }

   .home-bg .home .content p{
      font-size: 1.6rem;
      padding:1rem 0;
      line-height: 2;
      color: #2e4cf3;
   }

   .home-bg .home .content a{
      display: inline-block;
      width: auto;
   }

   .home-category .box-container{
      display: grid;
      grid-template-columns: repeat(auto-fit, 27rem);
      gap:1.5rem;
      justify-content: center;
      align-items: flex-start;
   }

   .home-category .box-container .box{
      padding:2rem;
      text-align: center;
      border:var(--border);
      background-color: var(--white);
      box-shadow: var(--box-shadow);
      border-radius: .5rem;
   }

   .home-category .box-container .box img{
      width: 100%;
      margin-bottom: 1rem;
   }

   .home-category .box-container .box h3{
      text-transform: uppercase;
      color:var(--black);
      padding:1rem 0;
      font-size: 2rem;
   }

   .home-category .box-container .box p{
      line-height: 2;
      font-size: 1.5rem;
      color:var(--light-color);
      padding:.5rem 0;
   }

   .home-category{
      padding-bottom: 0;
   }

   .products .box-container{
      display: grid;
      grid-template-columns: repeat(auto-fit, 35rem);
      gap:1.5rem;
      justify-content: center;
      align-items: flex-start;
   }

   .products .box-container .box{
      padding:2rem;
      text-align: center;
      border:var(--border);
      background-color: var(--white);
      box-shadow: var(--box-shadow);
      border-radius: .5rem;
      position: relative;
   }

   .products .box-container .box .price{
      position: absolute;
      top:1rem; left:1rem;
      padding:1rem;
      border-radius: .5rem;
      background-color: var(--red);
      font-size: 1.8rem;
      color:var(--white);
   }

   .products .box-container .box .price span{
      font-size: 2.5rem;
      color:var(--white);
      margin:0 .2rem;
   }

   .products .box-container .box .fa-eye{
      position: absolute;
      top:1rem; right:1rem;
      border-radius: .5rem;
      height: 4.5rem;
      line-height: 4.3rem;
      width: 5rem;
      border:var(--border);
      color:var(--black);
      font-size: 2rem;
      background-color: var(--white);
   }

   .products .box-container .box .fa-eye:hover{
      color:var(--white);
      background-color: var(--black);
   }

   .products .box-container .box img{
      width: 100%;
      margin-bottom: 1rem;
   }

   .products .box-container .box .name{
      font-size: 2rem;
      color:var(--black);
      padding:1rem 0;
   }

   .products .box-container .box .qty{
      margin:.5rem 0;
      border-radius: .5rem;
      padding:1.2rem 1.4rem;
      font-size: 1.8rem;
      color:var(--black);
      border:var(--border);
      width: 100%;
   }

</style>





<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>