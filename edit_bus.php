<?php
  $page_title = 'Edit Bus';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_bus = find_by_id('bus',(int)$_GET['id']);
  if(!$e_bus){
    $session->msg("d","Missing user id.");
    redirect('bus.php');
  }
?>

<?php
  if(isset($_POST['update'])){

   $req_fields = array('plate-num', 'body-num', 'vin-num', 'seat-cap');
   validate_fields($req_fields);
   if(empty($errors)){
            $plate = remove_junk($db->escape($_POST['plate-num']));
           $body = remove_junk($db->escape($_POST['body-num']));
          $vin = remove_junk($db->escape($_POST['vin-num']));
         $seat = remove_junk($db->escape($_POST['seat-cap']));

        $query  = "UPDATE bus SET ";
        $query .= "plate_num='{$plate}',body_num='{$body}',vin_num='{$vin}',seat_cap='{$seat}'";
        $query .= "WHERE ID='{$db->escape($e_bus['id'])}'";
        $result = $db->query($query);
         if($result && $db->affected_rows() === 1){
          //sucess
          $session->msg('s',"Bus has been updated! ");
          redirect('edit_bus.php?id='.(int)$e_bus['id'], false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to updated Bus!');
          redirect('edit_bus.php?id='.(int)$e_bus['id'], false);
        }
   } else {
     $session->msg("d", $errors);
    redirect('edit_bus.php?id='.(int)$e_bus['id'], false);
   }
 }
?>

<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Update <?php echo remove_junk(ucwords($e_bus['plate_num'])); ?> Details
        </strong>
       </div>
       <div class="panel-body">
       <form method="post" action="edit_bus.php?id=<?php echo (int)$e_bus['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Plate Number</label>
                  <input type="name" class="form-control" name="plate-num" value="<?php echo remove_junk(ucwords($e_bus['plate_num'])); ?>">
            </div>
            <div class="form-group">
                  <label for="name" class="control-label">Body Number</label>
                  <input type="name" class="form-control" name="body-num" value="<?php echo remove_junk(ucwords($e_bus['body_num'])); ?>">
            </div>
            <div class="form-group">
                <label for="name">Phonenumber</label>
                <input type="text" class="form-control" name="vin-num" placeholder="Phonenumber" value="<?php echo remove_junk(ucwords($e_bus['vin_num'])); ?>">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" class="form-control" name="seat-cap" placeholder="Email" value="<?php echo remove_junk(ucwords($e_bus['seat_cap'])); ?>">
            </div>
            
            
            
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Update</button>
            </div>
        </form>
       </div>
     </div>
  </div>


 </div>
<?php include_once('layouts/footer.php'); ?>
