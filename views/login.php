<?php
if (isset($_POST['submit'])) {
    $data = new UsersController();
    $data->auth();
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
            <img src="views\assets\images\pexels-ivan-samkov-7213368.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
              <h1> Planet.DEv </h1>

              </div>
              <p class="login-card-description">Sign into your account</p>
              <form action="?" method="post" data-parsley-validate="parsley">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <!-- <input type="email" name="email" id="email" class="form-control" placeholder="Email address"> -->
                    <input type="email" name="email" placeholder="email" class="form-control"  data-parsley-trigger="keyup" data-parsley-type="email" data-parsley-required-message="Email is required" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <!-- <input type="password" name="password" id="password" class="form-control" placeholder="***********"> -->
                    <input type="password" name="password" placeholder="password" class="form-control" data-parsley-trigger="keyup"  data-parsley-type="password" required>
                  </div>
                  <!-- <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login"> -->
                  <button class="btn btn-block login-btn mb-4" name="submit" type="submit">Login</button>
                </form>
                <p class="login-card-footer-text">Don't have an account? <a href="<?php echo BASE_URL ?>register" class="text-reset">Register here</a></p>   
            </div>
          </div>
        </div>
      </div>
   
    </div>
   
  </main>

  