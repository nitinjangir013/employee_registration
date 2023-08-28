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
// Upadte Data In MYSQL
$sql = "UPDATE `emp_list` SET `name`='".$_POST['name']."',`email`='".$_POST['email']."',`company`='".$_POST['company']."',`address`='".$_POST['address']."',`city`='".$_POST['city']."',`state`='".$_POST['state']."',`country`='".$_POST['country']."' WHERE id=".$_POST['id'];


if ($conn->multi_query($sql) === TRUE) {
  // Select All Data
  $sql1 = "SELECT * FROM `emp_list`";
  $result = $conn->query($sql1);
  if ($result->num_rows > 0)
  { 
    $data  = array();
    while($productlist = $result->fetch_assoc())
    {
      $data[]= $productlist;
    }
    // JSON object
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

$conn->close();
?>