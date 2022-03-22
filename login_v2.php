<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) {
     redirect('index.php', false);
  }
?>
  <link rel="icon" href="img/iconcelyrosa.png">
  <link rel="stylesheet" href="libs/css/main.css" />
  <meta name="viewport" content="width=device-width, initial-scale=0.50">
<div class="login-container">
    <div class="text-center">
       <h1>Celyrosa Express</h1>
       <p>Monitoring System</p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth_v2.php">
        <div class="form-element">
              <label>Username</label>
              <input type="name" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-element">
            <label>Password</label>
            <input type="password" name= "password" class="form-control" placeholder="password">
        </div>
        <div class="form-element">
                <button type="submit" class="btn btn-info  pull-right">Login</button>
        </div>
    </form>
</div>
<?php include_once('layouts/header.php'); ?>
