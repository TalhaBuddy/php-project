<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PlantGinex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style-form.css"> -->
    <link rel="stylesheet" href="style.css">
<style>
  
</style>
  </head>
<body>
 
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>
<?php include("navbar.php") ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/1.jpg);">
            <h2>LOGIN YOUR ACCOUNT</h2>
        </div>

    
    </div>
   
   
<!-- sign up  -->

<!-- Section: Design Block -->
<section>
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: linear-gradient(rgb(161 114 0 / 80%),rgba(0,0,0,0.8)) ,url(img/bg-img/1.jpg) !important;
        height: 200px;
        ">
	<!-- <h4 style="color:white;text-transform:capitalize;text-align:center;">Hello <?php echo $usernamee ?></h4>	 -->
	</div>
  <!-- Background image -->
<center>
  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -150px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        width:60%;
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5 text-center">Login Your Account</h2>
       
		  <form method="post" action="login.php" id="login-form">
      <?php include("error.php"); ?>     
      <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-12 mb-4">
                <div class="form-outline">
				<label class="form-label" for="form3Example1">Username</label> 
				<input type="text" id="form3Example1" class="form-control" name="username" id="your_name" placeholder="Please Enter Your Username" style="height:60px;" required/>
                </div>
              </div>
              <div class="col-md-12 mb-4">
  <div class="form-outline">
    <label class="form-label" for="form3Example2">Enter Your Password</label>
    <div class="input-group">
    <input style="position:relative;height: 60px;" name="password" type="password" value="" class="input form-control" id="password" placeholder="Enter Your Password" required="true" aria-label="password" aria-describedby="basic-addon1">      <div class="input-group-append">
        <span class="input-group-text input-group-addon d-flex justify-content-center align-items-center" onclick="togglePasswordVisibility()">
          <i id="toggleIcon" class="fa fa-eye" style="height:30px; margin-top: 15px;"></i>
        </span>
      </div>
    </div>
  </div>
</div>

            </div>
<br>
            <!-- Submit button --><center>
            <button type="submit" name="login_user" class="btn btn-danger btn-block mb-4" style="width:70%">
              Login
            </button>       <br>
          	<a href="register.php" style="text-decoration:none;">Don't Have an Account?</a>
<!-- Add this link/button below the login form -->

          </center>
          </form>		
        </div>
      </div>
    </div>
</center>
  </div>
</section>
<!-- Section: Design Block -->



<script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var toggleIcon = document.getElementById("toggleIcon");
      
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
      }
    }
  </script>




<?php include("footer.php"); ?>



<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>
</html>