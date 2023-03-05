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
   <title>shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="p-category">

   <a href="category.php?category=Medicines">Medicines</a>
   <a href="category.php?category=Surgical">Surgical</a>
   <a href="category.php?category=Skin Care">Skin Care</a>
   <a href="category.php?category=Baby Care">Baby Care</a>

</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products`");
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
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
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

   img{
      height: 150px;
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