<?php
include 'config.php';
session_start();
if(isset($_SESSION['login_name'])){
  header ('Location:index.php');     
}
if(isset($_POST['submit'])){

		$user = $_POST['uname'];
		$pass = $_POST['pass'];
	
	$query_admin = "SELECT * from users where user_username = '".$user."' AND user_password ='".$pass."'";

		$fetch_admin = mysqli_query($link,$query_admin) or die (mysqli_error());

					$fetch_admin_result = mysqli_fetch_array($fetch_admin);

						if (is_array($fetch_admin_result))
						{
							$_SESSION['login_name'] = $_POST['uname'];
							$_SESSION['login_session'] = "submit";
							echo '<script type="text/javascript">';
							echo 'alert("Successful Login! \n WELCOME - '.$user.'   ");';
							echo 'window.location.href="index.php"';
							echo '</script>';
						}

						else
						{
							echo '<script>';
							echo 'alert("Error Credentials!" ) ;';
							echo 'window.location.href = "login.php";';
							echo '</script>';
						}
	}
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<title>Login</title>
  <link href="img/manga.png" rel="icon">

	<link rel="stylesheet" href="css/style.css" type="text/css" >
  
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
</head>
<body>

<section class="vh-100" style="background-color: #4e73df;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/sample2.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST">

                  <div class="d-flex align-items-center mb-3 pb-1">
                  <img src="img/manga.png">
                    <span class="h1 fw-bold mb-0" style="padding-left: 20px; ">Login</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="uname" required/>
                    <label class="form-label" for="form2Example17">Username</label>
                  </div>
                  
                  <div class="form-outline mb-4">
                    <input type="password" class="form-control form-control-lg" name="pass" required placeholder="••••••••••••••••"  id="passwordInputIndex"/>
                    <label class="form-label" for="passwordInputIndex">Password</label>
                    <p id="text">WARNING! Caps lock is ON.</p>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Login</button>
                  </div>

                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript" src='js/detectCapslock.js'> </script>
</body>
</html>