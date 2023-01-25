<?php
if (isset($_POST['submit'])) {

    $data = new UsersController();
    $data->register();
}

?>


<head>
<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="views/assets/css/login.css">

</head>
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">

    <div class="container">
      <?php include('./views/includes/alerts.php') ?>
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="views/assets/images/pexels-ivan-samkov-7213354.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper ">
                <h1> Planet.DEv </h1>
              </div>
              <p class="login-card-description"> Welcome to be a DEV familly mumber  </p>
              <form action="?" method="post" data-parsley-validate>
                <div class="form-group">
                    <label for="fullname">fullname</label>
                    <input type="text" name="fullname" placeholder="fullname" class="form-control " required data-parsley-trigger="keyup">
                </div>
                  <div class="form-group">
                    <label for="email" >Email</label>
                    <!-- <input type="email" name="email" id="email" class="form-control" placeholder="Email address"> -->
                    <input type="email" name="email" placeholder="email" class="form-control"  data-parsley-trigger="keyup" data-parsley-type="email"   data-parsley-required-message="Email is required" required>
                  </div>
                  <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" placeholder="password" class="form-control"  >
        </div>
                  <!-- <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login"> -->
                  <button class="btn btn-block login-btn mb-4" name="submit" type="submit">sign up</button>
                </form>
                <p class="login-card-footer-text">Allready have an account? <a href="<?php echo BASE_URL ?>login" class="text-reset">signin here</a></p>  
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </main>

