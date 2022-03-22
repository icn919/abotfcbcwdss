<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

  if(empty($errors)){

    $user = authenticate_v2($username, $password);

        if($user):
           //create session with id
           $session->login($user['id']);
           //Update Sign in time
           updateLastLogIn($user['id']);
           // redirect user to group home page by user level
           if($user['user_level'] === '1'):
             $session->msg("s", "Hello ".$user['username'].", VNC Thesis Group ");
             redirect('admin_menu.php',false);
           elseif ($user['user_level'] === '2'):
              $session->msg("s", "Hello ".$user['username'].", VNC Thesis Group ");
             redirect('staff_menu.php',false);
           else:
              $session->msg("s", "Hello ".$user['username'].", VNC Thesis Group ");
             redirect('user_menu.php',false);
           endif;

        else:
          $session->msg("d", "Sorry Username/Password incorrect.");
          redirect('index.php',false);
        endif;

  } else {

     $session->msg("d", $errors);
     redirect('login_v2.php',false);
  }

?>
