<?php
  $page_title = 'Add Bus';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  if(isset($_POST['add_bus'])){

    $req_fields = array('plate-num', 'body-num', 'vin-num','seat-cap');
    validate_fields($req_fields);

    if(find_by_plateNum($_POST['plate-num']) === false ){
      $session->msg('d','<b>Sorry!</b> Entered Plate Number already in database!');
      redirect('add_bus.php', false);
    }
    elseif(find_by_vinNum($_POST['vin-num']) === false) {
      $session->msg('d','<b>Sorry!</b> Entered VIN Number already in database!');
      redirect('add_bus.php', false);
    }
    elseif(find_by_bodyNum($_POST['body-num']) === false) {
      $session->msg('d','<b>Sorry!</b> Entered Body Number already in database!');
      redirect('add_bus.php', false);
    }

  if(empty($errors)){
    $plate = remove_junk($db->escape($_POST['plate-num']));
    $body = remove_junk($db->escape($_POST['body-num']));
    $vin= remove_junk($db->escape($_POST['vin-num']));
    $seat = remove_junk($db->escape($_POST['seat-cap']));
    $query = "INSERT INTO bus (plate_num,body_num,vin_num,seat_cap) VALUES ('{$plate}', '{$body}', '{$vin}', '{$seat}')";
      if($db->query($query)){
          //sucess
          $session->msg('s',"Bus Account has been created! ");
          redirect('add_bus.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create Bus Account!');
          redirect('add_bus.php', false);
        }
        } else {
          $session->msg("d", $errors);
          redirect('add_bus.php',false);
        }
  }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add New Bus</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_bus.php">
            <div class="form-group">
                <label for="name">Plate Number</label>
                <input type="text" class="form-control" name="plate-num" placeholder="Plate Number">
            </div>
            <div class="form-group">
                <label for="name">Body Number</label>
                <input type="text" class="form-control" name="body-num" placeholder="Body Number">
            </div>
            <div class="form-group">
                <label for="name">Vin Number</label>
                <input type="text" class="form-control" name="vin-num" placeholder="Vin Number">
            </div>
            <div class="form-group">
                <label for="name">Seat Capacity</label>
                <input type="text" class="form-control" name="seat-cap" placeholder="Seat Capacity">
            </div>
            
            
            
            <div class="form-group clearfix">
              <button type="submit" name="add_bus" class="btn btn-primary">Add Bus</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
