<?php
  ob_start();
  require_once('includes/load.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Celyrosa Bus Express</title>
    <link rel="icon" href="img/iconcelyrosa.png">
    <link rel="stylesheet" href="libs/css/main.css" />
    <meta name="viewport" content="width=device-width, initial-scale=0.50">
  </head>
  <body id="formlogin">
<script type="text/javascript">
  function selPsngr(){
    window.location.replace('passenger.php');
  }
  function selLogin(){
    window.location.replace('login.php');
  }
</script>
<div class="login-container">
    <div class="text-center">
  <h2>Select User</h2>
        <input type="button" name="selPsngr" onclick="selPsngr()" value="Passenger">
        <input type="button" name="selLogin" onclick="selLogin()" value="Login"><br>
        <a style="color: rgb(7, 204, 30);" href="https://www.mediafire.com/file/lk9v156ldeegluk/Celyrosa+App.apk/file?fbclid=IwAR1hU-NOuq_dd52hb7mpZVwQTzHVxkw0rawlhxoMPogH0knPvBuSridsZ_g" download rel="noopener noreferrer" target="_blank">
         Download Celyrosa App</a>
</div>
  </body>
</html>

<?php include_once('layouts/footer.php'); ?>
