<?php
  $page_title = 'Delete User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_user = find_by_id('users',(int)$_GET['id']);
  $groups  = find_all('user_groups');
  if(!$e_user){
    $session->msg("d","Missing user id.");
    redirect('users.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['remove'])) {
    $req_fields = array('note');
    $req_fields = array('date_rem');
    validate_fields($req_fields);
    if(empty($errors)){
          $id = (int)$e_user['id'];
          $note = remove_junk($db->escape($_POST['note']));
          $date_rem = remove_junk($db->escape($_POST['date_rem']));
          $status = remove_junk($db->escape($_POST['status']));
          $password = remove_junk($db->escape($_POST['password']));
          $sql = "UPDATE users SET note ='{$note}', date_removed = '{$date_rem}', status = 0, password = 'k>u)wu9zMJ]JTj.' WHERE id='{$db->escape($id)}' AND 'status' = 0";
          $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Account has been removed ");
            redirect('users.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('delete_user.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('delete_user.php?id='.(int)$e_user['id'],false);
    }
  }
?>
<?php
?>
<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          NOTE FOR REMOVING <?php echo remove_junk(ucwords($e_user['name'])); ?> ACCOUNT
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="delete_user.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
            <div class="form-group">
              <input type="datetime-local" name="date_rem" class="form-control"><br>
              <label for="">What's the reason?</label>  
            </div>
            <textarea name="note" id="note" cols="125" rows="5" value="<?php echo remove_junk(ucwords($e_user['note']));?>"></textarea>
            <div class="form-group">
              <button type="submit" name="remove" class="btn btn-info" onclick="return confirm('Are you sure that you want to remove this account?')">Submit</button>
            </div>
        </form>
       </div>
     </div>
  </div>
  </div>
 </div>
<?php include_once('layouts/footer.php'); ?>
