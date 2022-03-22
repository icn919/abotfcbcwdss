<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('bus',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Bus information has been deleted.");
      redirect('bus.php');
  } else {
      $session->msg("d","Bus information deletion failed Or Missing Prm.");
      redirect('bus.php');
  }
?>
