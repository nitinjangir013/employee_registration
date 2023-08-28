<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registration Form</title>
		<link rel="stylesheet" href="./assets/css/style.css">
	</head>
	<body>
		<div class="container">
			<!-- Start Heading Element -->
			<h1 class="heading">Registration Form</h1>
			<!-- End Heading Element -->
			<!-- Start Form list Container Element -->
			<div class="form_list_container">
				<!-- Start Form Container Element -->
				<div class="form_container">
					<div class="form">
						<!-- Profile image Input Element -->
						<div class="inputBox">
							<input type="file" name="file" id="file" required>
							<span>Profile image</span>
						</div>
						<!-- Employee Name input Element -->
						<div class="inputBox">
							<input type="text" name="" id="emp_name" required>
							<span>Name</span>
						</div>
						<!-- Emolpyee Email input Element -->
						<div class="inputBox">
							<input type="text" name="" id="email" required>
							<span>Email</span>
						</div>
						<!-- Employee Company Select Element -->
						<div class="inputBox">
							<select name="" id="company" required>
								<option value="--">Select company</option>
								<option value="BST">BST</option>
								<option value="Amazon">Amazon</option>
								<option value="Apple">Apple</option>
								<option value="Google">Google</option>
								<option value="Microsoft">Microsoft</option>
							</select>
							<span>Company</span>
						</div>
						<!-- Start Emploayee Address input Elements -->
						<div class="inputBox">
							<input type="text" name="" id="address" required>
							<span>Address</span>
						</div>
						<div class="inputBox">
							<input type="text" name="" id="cityname" required>
							<span>City</span>
						</div>
						<div class="inputBox">
							<input type="text" name="" id="statename" required>
							<span>State</span>
						</div>
						<div class="inputBox">
							<input type="text" name="" id="countryname" required>
							<span>Country</span>
						</div>
						<!-- End Employee address inputs Elements -->
						<div class="btn"><button>Submit</button></div>
					</div>
				</div>
				<!-- End Form container Element -->
				<!-- Start Employees Table container Element -->
				<div class="emp_table_container">
					<header>
						<div class="inputBox">
							<input type="text" name="" id="search">
							<span>Search</span>
						</div>
					</header>
					<div class="table_box">
						<table>
							<thead>
								<tr>
									<td>S.no.</td>
									<td>Profile Image</td>
									<td>Name</td>
									<td>Email</td>
									<td>Company</td>
									<td>Address</td>
									<td>City</td>
									<td>State</td>
									<td>Country</td>
								</tr>
							</thead>
							<tbody id="emp-table">
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
								$counter=1;
								$sql1 = "SELECT * FROM `emp_list`";
							  	$result = $conn->query($sql1);
							  	if ($result->num_rows > 0)
							  	{ 
							    	while($productlist = $result->fetch_assoc())
							    	{
							    	  ?>
							    	  <tr>
										<td><?php echo $counter++ ?></td>
										<td><img src="<?php echo $productlist['image_add'] ?>" alt="Profile Image" class="pro_img"></td>
										<td><?php echo $productlist['name'] ?></td>
										<td><?php echo $productlist['email'] ?></td>
										<td><?php echo $productlist['company'] ?></td>
										<td><?php echo $productlist['address'] ?></td>
										<td><?php echo $productlist['city'] ?></td>
										<td><?php echo $productlist['state'] ?></td>
										<td><?php echo $productlist['country'] ?></td>
									</tr>
							    	  <?php
							   		}
								}
							  	else
							  	{
							    	echo "<tr></tr>";
							  	}

								$conn->close();
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- End Employees Table container Element -->
			</div>
			<!-- End Form list Container Element -->
		</div>
		<!-- javaScript Connect -->
		<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
		<script src="./assets/js/custom.js"></script>
	</body>
</html>