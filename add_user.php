<?php
  $page_title = 'Add User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_user'])){

    $req_fields = array('full-name','phonenumber','email','username','password','level' );
    validate_fields($req_fields);

    if(find_by_userName($_POST['username']) === false ){
      $session->msg('d','<b>Sorry!</b> Entered Username already in database!');
      redirect('add_user.php', false);
    }
    elseif(find_by_eMail($_POST['email']) === false) {
      $session->msg('d','<b>Sorry!</b> Entered Email already in database!');
      redirect('add_user.php', false);
    }

  if(empty($errors)){
    $name = remove_junk($db->escape($_POST['full-name']));
    $phonenumber = remove_junk($db->escape($_POST['phonenumber']));
    $email = remove_junk($db->escape($_POST['email']));
    $username = remove_junk($db->escape($_POST['username']));
    $password = remove_junk($db->escape($_POST['password']));
    $user_level = (int)$db->escape($_POST['level']);
    $password = sha1($password);
    $query = "INSERT INTO users (name,phonenumber,email,username,password,user_level,status) VALUES ('{$name}', '{$phonenumber}','{$email}','{$username}', '{$password}', '{$user_level}','1')";
      if($db->query($query)){
          //sucess
          $session->msg('s',"User account has been created! ");
          redirect('add_user.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add_user.php', false);
        }
        } else {
          $session->msg("d", $errors);
          redirect('add_user.php',false);
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
          <span>Add New User</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_user.php">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="full-name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="name">Phonenumber</label>
                <input type="text" class="form-control" name="phonenumber" placeholder="Phonenumber">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name ="password"  placeholder="Password">
            </div>
            <div class="form-group">
              <label for="level">User Role</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
