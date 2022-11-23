<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Barangay Manga Appointment Request Services</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/manga.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">



</head>

<body>


  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">BRGY. MANGA</a></h1>
     

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li class="dropdown"><a href="index.php#services"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="reservation_form.php">Barangay Certificate</a></li>
              <li><a href="reservation_form.php">Barangay Clearance</a></li>
              <li><a href="reservation_form.php">Cedula</a></li>
              <li><a href="reservation_form.php">Blotter Request</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto active" href="news.php">News</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Officals</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="index.php#about">Track Code</a></li>
        </ul>
      
       
          
       
      
      </nav>
    
    </div>
  </header>


  <!--Main layout-->
<div class="container d-flex flex-column align-items-center justify-content-center pt-5" data-aos="fade-up">

  <!--Section: Content-->
  <section>
  <?php
          include('config.php');
                              $sql_staff_table = mysqli_query($link,"Select * from news");
                              
                              for($a = 0; $a < $num_rows = mysqli_fetch_array($sql_staff_table); $a++)
                              {
                                $news_id = $num_rows['news_id'];
                                $news_date = $num_rows['news_date'];
                                $news_title = $num_rows['news_title'];
                                $news_content = $num_rows['news_details'];
                              ?>
    <div class="row gx-lg-5">
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <!-- News block -->
        <div>
          <!-- Featured image -->

          <!-- Article data -->
          <div class="row mb-3">
            <div class="col-6">
              <a href="" class="text-info">
            
                News
              </a>
            </div>

            <div class="col-6 text-end">
              <u><?php echo $news_date?></u>
            </div>
          </div>

          <!-- Article title and description -->
          <a href="" class="text-dark">
            <h5><?php echo $news_title ?></h5>

            <p>
            <?php echo $news_content?>
            </p>
          </a>

          <hr />
        </div>
    
        <!-- News block -->
      </div>
   

        <!-- News block -->
      </div>
      <?php } ?>
    </div>

  </section>
  <!--Section: Content-->

  
</div>
<!--Main layout-->

  
    
    
    

  </main>
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Barangay Manga</h3>
            <p>
              0038 Holy Trinity St<br>
              Manga District, Tagbilaran City<br>
              Bohol 6300, Philippines <br><br>
              <strong>Phone:</strong> 0927-916-1440<br>
              <strong>Email:</strong> brgymangabohol.gov.ph<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="news.php">News</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#team">Officials</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="reservation_form.php">Barangay Certificate</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="reservation_form.php">Certificate of Residency</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="reservation_form.php">Cedula</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="reservation_form.php">Blotter</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245.80376752445915!2d123.86232097386477!3d9.692964135537833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa4b8cc8ca8ab7%3A0x4db5636b1ee5e283!2sHoly%20Trinity%20St%2C%20Tagbilaran%20City%2C%20Bohol!5e0!3m2!1sen!2sph!4v1664716296867!5m2!1sen!2sph" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>APQRS</span></strong>. All Rights Reserved
        </div>
    
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>