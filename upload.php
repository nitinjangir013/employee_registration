<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emp_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_FILES['file']['name'])){

	/* Getting file name */
	$filename = $_FILES['file']['name'];

	/* Location */
	$location = "./assets/images/".$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);

	/* Valid extensions */
	$valid_extensions = array("jpg","jpeg","png");

	$response = 0;
	/* Check file extension */
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
	   	/* Upload file */
	   	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
	     	$response = $location;
	     	$sql = "INSERT INTO `emp_list` ( image_add) VALUES (  '".$response."')";

			if ($conn->multi_query($sql) === TRUE) {
			  $sql1 = "SELECT * FROM `emp_list`";
			  $result = $conn->query($sql1);
			  if ($result->num_rows > 0)
			  { 
			    // $data  = array();
			    while($productlist = $result->fetch_assoc())
			    {
			      $data= $productlist;
			    }
			    header("Content-Type: application/json");
			    echo json_encode($data);
			    exit();
			  }
			  else
			  {
			    echo "0 results";
			  }
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}

	   	}
	}

	// echo $response;
	// exit;
}

// echo 0;


$conn->close();
?>