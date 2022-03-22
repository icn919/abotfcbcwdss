<?php
	
	// include database connection file
	require_once('includes/load.php');


	// load records using select box jquery ajax in PHP
	$plate_num = $_POST['platenum'];

	$query = "SELECT * FROM bus WHERE plate_num = '$plate_num'";

	$result = $db->query($query);
	$output = "";

	if ($result->num_rows > 0) {
		
		$output .= "<table class='table table-hover table-border'>
					    <thead>
					      <tr>
					        <th>Plate Number</th>
					        <th>Body Number</th>
					        <th>Vin Number</th>
					      </tr>
					    </thead>";
		while ($row = $result->fetch_assoc()) {
		$output .= "<tbody>
				      <tr>
				        <td>{$row['plate_num']}</td>
				        <td>{$row['body_num']}</td>
				        <td>{$row['vin_num']}</td>
				      </tr>
				    </tbody>";
		}					    
					    
		$output .= "</table>";
		echo $output;
	}else{
		echo "No records found";
	}
?>