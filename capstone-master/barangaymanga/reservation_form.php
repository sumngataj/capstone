<?php
  $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0987654321-@#%^&*";
  $num = rand(1000000, 20000000);
  $gen =   substr(str_shuffle($char),0,10);
  $c = $num.$gen;
  $shuffle = str_shuffle($c);

  if(isset($_POST['submit']) && isset($_FILES['my_image']) && $_POST['g-recaptcha-response'] != ""){
    include('config.php');
    $secret = '6Ldur-UiAAAAAJ8FDYjJanJA6bN6R2StIpG6AVNm';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if($responseData->success){
      echo "<pre>";
      print_r($_FILES['my_image']);
      echo "</pre>";
      $name = $_POST['name'];
      $email = $_POST['email'];
      $date = $_POST['date'];
      $time = $_POST['time'];
      $type = $_POST['service'];
      $purpose = $_POST['purpose'];
      $img_name = $_FILES['my_image']['name'];
      $img_size = $_FILES['my_image']['size'];
      $tmp_name = $_FILES['my_image']['tmp_name'];
      $error = $_FILES['my_image']['error'];
      if ($error === 0) {
      if ($img_size > 125000) {
        $em = "Sorry, your file is too large.";
          header("Location: reservation_form.php?error=$em");
      }else {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
  
        $allowed_exs = array("jpg", "jpeg", "png"); 
  
        if (in_array($img_ex_lc, $allowed_exs)) {
          $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
          $img_upload_path = 'uploads/'.$new_img_name;
          move_uploaded_file($tmp_name, $img_upload_path);

          $sql = "INSERT into appointment (user_appointment_id, user_tracking_code, name, user_email, user_docu_type, user_date, user_time, user_proof_img, user_purpose, user_approval_status)values('','$shuffle','$name','$email','$type','$date','$time','$new_img_name','$purpose','pending')";
          mysqli_query($link, $sql);
          $message = "Your request has been sent! Please check your email for the approval of your status.";
          echo "<script type='text/javascript'>alert('$message');
          window.location.assign('index.php')</script>";
        }else {
          $em = "You can't upload files of this type";
              header("Location: reservation_form.php?error=$em");
        }
      }
    }else {
      $em = "unknown error occurred!";
      header("Location: reservation.php?error=$em");
    }

    
 
    }
  }

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
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>


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
          <li><a class="nav-link scrollto" href="news.php">News</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Officals</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="index.php#about">Track Code</a></li>
        </ul>
      
       
          
       
      
      </nav>
    
    </div>
  </header>


  <!--Main layout-->
<div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

        <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                        <form method="post" class="user"  enctype="multipart/form-data">
                          
                           
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                       <input type="text" name="name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Name" required/>  
                                       <label class="form-label" for="">Name</label>
                                      </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="email" name="email" value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="E-Mail" required/>
                                      <label class="form-label" for="">Email address</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="date" name="date" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="reservation" aria-required="true" aria-invalid="false" placeholder="Reservation" required/>
                                      <label class="form-label" for="">Date</label>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="time" id="time" name="time" class="form-control" aria-required="true" aria-invalid="false" placeholder="Select time" tabindex="0">
                                      <label class="form-label" for="">Time</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3 mb-sm-0">
                                  <select name="service" id="select" class="form-control" required />
                                    <option selected>Select Service...</option>
                                    <option>Barangay Certificate</option>
                                    <option>Barangay Clearance</option>
                                    <option>Cedula</option>
                                    <option>Blotter</option>
                                  </select>
                                  <label for="select">Services</label>
                                </div>
                                <div class="form-group mb-3 mb-sm-0">
                                <input type="file" name="my_image"> 
                                  <label class="form-label" for="">Document Requirements</label>
                                </div>
                                <div class="form-group mb-3 mb-sm-0">
                                  <textarea type="text" name="purpose" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Purpose" required></textarea></span>  
                                  <label class="form-label" for="">Purpose</label>
                                </div>
                                <div class="form-group mb-3 mb-sm-0">
                                <div class="g-recaptcha" data-sitekey="6Ldur-UiAAAAAGKJC79YsTICvJwvm51M5Sn1JhFp"></div>
                                </div>
                                <br>

                                <button class="btn btn-primary" name="submit" type="submit">Submit Form</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
      </div>
    </div>
  </div>
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