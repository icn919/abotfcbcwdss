<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <h3>WELCOME!</h3>
         <h1>Celyrosa Bus Express</h1>
         <p style="color: black; font-size: 20px;">Bus and Seats Monitoring System</p>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
