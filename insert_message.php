<?php
date_default_timezone_set('Asia/Manila');
$current_date = date("Y-m-d H:i:s");
$name = $_REQUEST['name'];
$comments = $_REQUEST['comments'];


require_once('includes/load.php');

$db->query("INSERT INTO comments(name, comments, status, date_publish) VALUES('$name','$comments', 'unread', '$current_date' )");

if(isset($_POST['button'])){

    $result = $db->query("SELECT * FROM comments ORDER BY id ASC");
    while($row=mysqli_fetch_array($result)){
    echo "<div class='comments_content'>";
    echo "<h4><a href='delete.php?id=" . $row['id'] . "'> X</a></h4>";
    echo "<h1>" . $row['name'] . "</h1>";
    echo "<h2>" . $row['date_publish'] . "</h2></br></br>";
    echo "<h3>" . $row['comments'] . "</h3>";
    echo "</div>";
}
}
$session->msg()
?>
