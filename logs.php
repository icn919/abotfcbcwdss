<?php

require_once('includes/load.php');

$result = $db->query("SELECT * FROM comments ORDER BY id DESC");

while($row=mysqli_fetch_array($result)){
    echo "<div class='comments_content'>";
    if($row['status'] =='unread') {
    echo "<h4><a href='view.php?id=" . $row['id'] . "'>Mark as Read</a></h4>";
    }
    echo "<h1>" . $row['name'] . "</h1>";
    echo "<h2>" . $row['date_publish'] . "</h2></br></br>";
    echo "<h4><a href='delete.php?id=" . $row['id'] . "'> X</a></h4>";
    echo "<h3>" . $row['comments'] . "</h3>";
    echo "</div>";
}
$session->msg()
?>

