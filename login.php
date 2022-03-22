<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) {
    redirect('home.php', false);
  }
?>
  <link rel="icon" href="img/iconcelyrosa.png">
  <link rel="stylesheet" href="libs/css/main.css" />
  <meta name="viewport" content="width=device-width, initial-scale=0.50">
<body id="formlogin">
  <script type="text/javascript">
          function back(){
            window.location.replace('main.php');
          }     
  </script>

<div class="login-container">
      <div class="text-center">
         <h2>Celyrosa Bus Express</h2>
         <p>Monitoring System</p><br>
       </div>
       <?php echo display_msg($msg); ?>
        <form method="post" action="auth.php" class="clearfix">
          <div class="form-element">
                <input type="name" class="form-control" name="username" placeholder="Username" required>
          </div>
          <div class="form-element">
              <input type="password" name= "password" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-element">
                  <button type="submit" class="btn btn-info  pull-right">Login</button>
          </div>
        
      </form>
      <input type="button" name="back" onclick="back()" value="Back">
</div>

</body>
<?php include_once('layouts/footer.php'); ?>
