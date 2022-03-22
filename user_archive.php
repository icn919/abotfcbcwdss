<?php
  $page_title = 'Removed User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $inactive_users = find_remove_user();

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
          <span class="glyphicon glyphicon-th"></span>
          <span>Inactive Users</span>
       </strong>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Name </th>
            <th>Username</th>
            <th>Phonenumber</th>
            <th>Email</th>
            <th class="text-center" style="width: 15%;">User Role</th>
            <th class="text-center" style="width: 10%;">Status</th>
            <th style="width: 20%;">Date Deleted</th>
            <th class="text-center" style="width: 20%">Note</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($inactive_users as $a_user): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['phonenumber']))?></td>
           <td><?php echo remove_junk(lcfirst($a_user['email']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
           <td class="text-center">
           <?php if($a_user['status'] === '3'): ?>
            <span class="label label-success"><?php echo "Active"; ?></span>
          <?php else: ?>
            <span class="label label-remove"><?php echo "Remove"; ?></span>
          <?php endif;?>
           </td>
           <td><?php echo ($a_user['date_removed'])?></td>
           <td><?php echo remove_junk(ucwords($a_user['note']))?></td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
 
<?php include_once('layouts/footer.php'); ?>
