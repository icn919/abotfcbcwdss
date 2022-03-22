<?php
  $page_title = 'All Bus';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_bus = find_all_bus()
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-bed"></span>
          <span>All Bus</span>
       </strong>
         <a href="add_bus.php" class="btn btn-info pull-right">Add New Bus</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Plate Number</th>
            <th>Body Number</th>
            <th>Vin Number</th>
            <th>Seat Capacity</th>
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_bus as $a_bus): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_bus['plate_num']))?></td>
           <td><?php echo remove_junk(ucwords($a_bus['body_num']))?></td>
           <td><?php echo remove_junk(ucwords($a_bus['vin_num']))?></td>
           <td><?php echo remove_junk(ucwords($a_bus['seat_cap']))?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_bus.php?id=<?php echo (int)$a_bus['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
               <a href="delete_bus.php?id=<?php echo (int)$a_bus['id'];?>" class="btn btn-xs btn-danger" class="btn btn-info" onclick="return confirm('Are you sure that you want to remove this Bus details?')" data-toggle="tooltip" title="Remove">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
