<header class="header">

   <div class="flex">

      <a href="home.php" >Pharma<img src="images/ba.webp"></a>
      <style>
         img{
            width: 80px;
            border-radius: 300px;
         }
      </style>

      <nav class="navbar">
         <a href="home.php">home</a>
         <a href="shop.php">pharmacy</a>
         <a href="orders.php">orders</a>
         <a href="about.php">about</a>
         <a href="contact.php">contact</a>
      </nav>

      <div class="icons">
      <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"> <?= $fetch_profile['name']; ?></div> &nbsp;&nbsp;&nbsp;
         <a href="cart.php" class="fas fa-shopping-cart"></a>
         <a href="search_page.php" class="fas fa-search"></a>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <div class="icons">
         <a href="cart.php" class="btn-a"><i class="fas fa-shopping-cart">CART</i><span>(<?= $count_cart_items->rowCount(); ?>)</span></a>
         </div>
         <a href="user_profile_update.php" class="option-btn">update profile</a>
         <a href="logout.php" class="delete-btn">logout</a>
      </div>

   </div>

</header>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<style>
   .btn-a{
   display: block;
   width: 100%;
   margin-top: 1rem;
   border-radius: .5rem;
   color:var(--white);
   font-size: 2rem;
   padding:1.3rem 3rem;
   text-transform: capitalize;
   cursor: pointer;
   text-align: center;
   background-color: var(--blue);
   }

   .header{
      background: #2e4cf3;
      position: sticky;
      top:0; left:0; right:0;
      z-index: 1000;
      box-shadow: var(--box-shadow);
   }

   .header .flex{
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding:2rem;
      margin: 0 auto;
      max-width: 1200px;
      position: relative;
   }

   .header .flex a{
      color: var(--white);
   }

   .header .flex .logo{
      font-size: 2.5rem;
      color:var(--black);
   }

   .header .flex .logo span{
      color:var(--red);
   }

   .header .flex .profile{
      background-color: var(--black);
   }

   .header .flex .profile p{
      color: var(--white);
   }

   .header .flex .navbar a{
      margin:0 1rem;
      font-size: 2rem;
      color:var(--white);
   }

   .header .flex .navbar a:hover{
      text-decoration: underline;
      color:var(--red);
   }

   .header .flex .icons > *{
      font-size: 1.5rem;
      color:var(--white);
      cursor: pointer;
      margin-left: 1.5rem;
   }

   .header .flex .icons > *:hover{
      color:var(--red);
   }

   .header .flex .icons a span,
   .header .flex .icons a i{
      color:var(--white);
   }

   .header .flex .icons a:hover span,
   .header .flex .icons a:hover i{
      color:var(--red);
   }

   .header .flex .icons a span{
      font-size: 2rem;
   }

</style>