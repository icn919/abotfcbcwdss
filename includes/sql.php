<?php
  require_once('includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}

/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}

/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/
function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM " .$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }

 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
 /*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }

  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
  /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user groups table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.phonenumber,u.email,u.user_level,u.status,u.last_login, u.date_removed,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level WHERE note IS NULL ORDER BY u.user_level ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  function find_all_user1(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.phonenumber,u.email,u.user_level,u.status,u.last_login, u.date_removed,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level WHERE note IS NULL AND u.user_level = '1' ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  function find_all_user2(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.phonenumber,u.email,u.user_level,u.status,u.last_login, u.date_removed,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level WHERE note IS NULL AND u.user_level = '2' ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }

  function find_all_user3(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.phonenumber,u.email,u.user_level,u.status,u.last_login, u.date_removed,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level WHERE note IS NULL AND u.user_level = '3' ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }

  function find_all_bus(){
    global $db;
    $results = array();
    $sql  = "SELECT * FROM bus ";
    $result = find_by_sql($sql);
    return $result;
  }

  function find_all_comment(){
    global $db;
    $results = array();
    $sql  = "SELECT * FROM comments ";
    $result = find_by_sql($sql);
    return $result;
  }

  function find_all_status(){
    global $db;
    $results = array();
    $sql  = "SELECT * FROM comments where `status` = 'unread'";
    $result = find_by_sql($sql);
    return $result;
  }



  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/
  function find_inactive_user(){
    global $db;
    $results = array();
    $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status, u.last_login, u.note, u.date_removed,";
    $sql .="g.group_name ";
    $sql .="FROM users u ";
    $sql .="LEFT JOIN user_groups g ";
    $sql .="ON g.group_level=u.user_level WHERE note IS NOT NULL ORDER BY u.name ASC";
    $result = find_by_sql($sql);
    return $result;
  }

function find_remove_user(){
  global $db;
  $results = array();
  $sql = "SELECT u.id,u.name,u.username,u.phonenumber,u.email,u.user_level,u.status, u.last_login, u.date_removed, u.note,";
  $sql .="g.group_name ";
  $sql .="FROM users u ";
  $sql .="LEFT JOIN user_groups g ";
  $sql .="ON g.group_level=u.user_level WHERE note IS NOT NULL ORDER BY u.name ASC";
  $result = find_by_sql($sql);
  return $result;
}

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Function to check existing data on Database
  /*--------------------------------------------------------------*/
  function find_by_userName($val){
    global $db;
    $sql = "SELECT username FROM users WHERE username = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }

  function find_by_eMail($val){
    global $db;
    $sql = "SELECT email FROM users WHERE email = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }

  function find_by_plateNum($val){
    global $db;
    $sql = "SELECT plate_num FROM bus WHERE plate_num = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }

  function find_by_vinNum($val){
    global $db;
    $sql = "SELECT vin_num FROM bus WHERE vin_num = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  function find_by_bodyNum($val){
    global $db;
    $sql = "SELECT body_num FROM bus WHERE body_num = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val){
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }

  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level){
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  
  /*--------------------------------------------------------------*/
  /* Function for checking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Please login...');
            redirect('index.php', false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "Sorry! you dont have permission to view the page.");
            redirect('home.php', false);
      endif;

     }

?>
