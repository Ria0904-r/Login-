<?php
require_once('config.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div>
		<?php
		if(isset($_POST['create'])){
			$firstname   = $_POST['firstname'];
			$lastname    = $_POST['lastname'];
			$email       = $_POST['email'];
			$password    = $_POST['password'];
			$dob         = $_POST['dob'];
			$gender      = $_POST['gender'];

			$sql = "INSERT INTO users (firstname, lastname , email , password, dob, gender) VALUES(?,?,?,?,?,?)";
			$stmtinsert = $db->prepare($sql);
			$result = $stmtinsert->execute([$firstname, $lastname , $email , $password, $dob, $gender]);

			if($result){
				echo 'Successfully saved.';
			}else{
				echo 'There were errors while saving the data';
			}
		

		}
			
			?>
	</div>

	<div>
		<form action="registration.php" method="post">
			<div class="container">

				<div class="row">
					<div class="col-sm-3">
				<h1>Registration</h1>
				<p>Fill up the form with correct details.</p>
				<hr class="mb-3">
				<label for="firstname"><b>First Name</b></label>
				<input class="form-control" type="text" name="firstname" required>

				<label for="lastname"><b>Last Name</b></label>
				<input class="form-control"type="text" name="lastname" required>

				<label for="email"><b>Email</b></label>
				<input class="form-control"type="email" name="email" required>

				<label for="password"><b>Password</b></label>
				<input class="form-control"type="password" name="password" required>

				<label for="dob"><b>DOB</b></label>
				<input class="form-control"type="date" name="dob" required>

				<form action="/action_page.php">
            <p><b>Gender:</b></p>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label><br>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label>

<hr class="mb-4">
				<input class="btn btn-primary" type="submit" name="create" value="Sign Up">
				</div>
				</div>





			
			</div>
		</form>
	</div>

</body>
</html>