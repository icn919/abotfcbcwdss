<ul>
  <li>
    <a href="admin.php">
      <i class="glyphicon glyphicon-home"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-user"></i>
      <span>User Management</span>
    </a>
    <ul class="nav submenu">
      <li><a href="group.php">User Categories</a> </li>
      <li><a href="users.php">Manage Users</a> </li>
      <li><a href="user_archive.php">Archive</a> </li>
   </ul>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-bed"></i>
      <span>Bus Management</span>
    </a>
    <ul class="nav submenu">
       <li><a href="bus.php">All Bus List</a> </li>
   </ul>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-tasks"></i>
       <span>Monitoring</span>
      </a>
      <ul class="nav submenu">
         <li><a href="gps_tracker.php">Bus Tracker</a> </li>
         <li><a href="seat_monitoring.php">Seat Monitoring</a> </li>
     </ul>
  </li>
  <li>

    <a href="message.php" class="submenu-toggle">
      <i class="glyphicon glyphicon-bell"></i>
        <span>Notification</span>
             <?php
                $query = ("SELECT * from `comments` where `status` = 'unread' order by `date` DESC");
                if(count(find_all_status($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(find_all_status($query)); ?></span>
              <?php
                }
              ?>
            </a>
  </li>
  <li>
    <a href="about.php" >
      <i class="glyphicon glyphicon-info-sign"></i>
      <span>About</span>
    </a>
  </li>
</ul>
