<br></br>
<footer class="footer">

   <section class="box-container">

      <div class="box">
         <h3>links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> >home</a>
         <a href="shop.php"> <i class="fas fa-angle-right"></i> >medicine</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> >about</a>
         <a href="contact.php"> <i class="fas fa-angle-right"></i> >contact</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <p> <i class="fas fa-envelope"></i> tanjumobony44@gmail.com </p>
         <p> <i class="fas fa-envelope"></i> fahimamony@gmail.com </p>
         <p> <i class="fas fa-envelope"></i> jannatmim@gmail.com </p>
         <p> <i class="fas fa-map-marker-alt"></i>Telihour, Sheikghat, Sylhet</p>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> >facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> >twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> >instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> >linkedin </a>
      </div>

   </section>

   <p class="credit"> &copy; copyright by <span>Prethy,Moni,Mim </span></p>

</footer>

<style>
   .footer{
    background-color: #2e4cf3;
   }

   .footer .box-container{
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
      gap:2.5rem;
      align-items: flex-start;
   }

   .footer .box-container .box h3{
      text-transform: uppercase;
      color:var(--black);
      margin-bottom: 2rem;
      font-size: 2rem;
   }

   .footer .box-container .box a,
   .footer .box-container .box p{
      display: block;
      padding:1.3rem 0;
      font-size: 1.6rem;
      color:var(--white);
   }

   .footer .box-container .box a i,
   .footer .box-container .box p i{
      color:#2e4cf3;
      padding-right: 1rem;
   }

   .footer .box-container .box a:hover{
      text-decoration: underline;
      color:red;
   }

   .footer .credit{
      margin-top: 2rem;
      padding: 2rem 1.5rem;
      padding-bottom: 2.5rem;
      line-height: 1.5;
      border-top: var(--border);
      text-align: center;
      background-color: white;
      font-size: 2rem;
      color:var(--black);
   }

   .footer .credit span{
      color:#2d3330;
   }

</style>