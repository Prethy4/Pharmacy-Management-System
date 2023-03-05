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

<header class="header">

   <div class="flex">

      <!-- <a href="admin_page.php" <img src="images/admin.jpg">Admin<span>Panel</span></a> -->
      <a href="admin_page.php" >Admin Panel<img src="images/admin.jpg"></a>
      <nav class="navbar">
         <a href="admin_page.php">dashboard</a>
         <a href="admin_products.php">products</a>
         <a href="admin_orders.php">orders</a>
         <a href="admin_users.php">users</a>
         <a href="admin_contacts.php">messages</a>
      </nav>

      <div class="icons">
      <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user">  <?= $fetch_profile['name']; ?></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="admin_update_profile.php" class="delete-btn">update profile</a>
         <a href="logout.php" class="delete-btn">logout</a>
      </div>

   </div>

</header>

<style>
   img{
      width: 50px;
      border-radius: 200px;
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