<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
	$name = $_POST['userName'];
	$email = $_POST['userEmail'];
	$password = md5($_POST['userPassword']);
	$phoneNumber = $_POST['userPhoneNumber'];

	$ret = mysqli_query($con, "SELECT userEmail FROM users WHERE userEmail='$email' ");
	$result = mysqli_fetch_array($ret);

	if ($result > 0) {
		$msg = "This email is already associated with another account.";
	} else {
		//insert new user
		$query = mysqli_query($con, "INSERT INTO users(userName, userEmail, userPassword,  userPhoneNumber) value('$name', '$email', '$password', '$phoneNumber' )");

		if ($query) {
			$msg = "You have successfully registered!";

			$sqlGetUserId = mysqli_query($con, "SELECT userID AS id FROM users WHERE userEmail='$email'");
			$user = mysqli_fetch_assoc($sqlGetUserId);
			$userID = $user['id'];

			$sqlInsertIncome = mysqli_query($con, "INSERT INTO income_categories(name, position, userID) VALUES('Salary', '1', '$userID'),
																										   ('Allowance', '2', '$userID'),
																										   ('Interest Money', '3', '$userID'),
																										   ('Gift', '4', '$userID'),
																										   ('Others', '5', '$userID')");

			$sqlInsertExpense = mysqli_query($con, "INSERT INTO expense_categories(name, position, userID) VALUES('Bills', '1', '$userID'),
																										     ('Groceries', '2', '$userID'),
																										     ('Restaurants', '3', '$userID'),
																									  	     ('Movies', '4', '$userID'),
																										     ('Games', '5', '$userID'),
																										     ('Home Mortgage', '6', '$userID'),
																										     ('Rentals', '7', '$userID'),
																										     ('Parking Fees', '8', '$userID'),
																										     ('Public Transport', '9', '$userID'),
																										     ('Pets', '10', '$userID')");

			if ($sqlInsertIncome) {
				$msg .= "<br/>Default income categories added!";
			} else {
				$msg .= "<br/>Failed to add default income categories!";
			}

			if ($sqlInsertExpense) {
				$msg .= "<br/>Default expense categories added!";
			} else {
				$msg .= "<br/>Failed to add default expense categories!";
			}
		} else {
			$msg = "Something Went Wrong! Please try again";
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YourExpenses | Register</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="images/yourexpenses.png" sizes="113x113">
	<script type="text/javascript">
		function checkpass() {
			if (document.register.userPassword.value != document.register.userRepeatPassword.value) {
				alert('Password and Repeat Password fields do not match');
				document.register.userRepeatPassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading" style="text-align: center;">Register</div>
				<div class="panel-body">
					<form role="form" action="" method="post" id="" name="register" onsubmit="return checkpass();">
						<p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
																					echo $msg;
																				}  ?> </p>
						<fieldset>
							<div class="form-group">
								<input type="text" class="form-control" name="userName" placeholder="Name" required="true">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="userPhoneNumber" placeholder="Phone Number" maxlength="10" pattern="[0-9]{10}" required="true">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="userEmail" placeholder="Email" required="true">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="userPassword" placeholder="Password" required="true">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="userRepeatPassword" placeholder="Repeat Password" required="true">
							</div>
							<div class="checkbox">
								<button type="submit" class="btn btn-primary" name="submit" value="submit" style="width: 100%;">REGISTER</button><br><br>
								<p style="text-align: center;">Already registered? <a href="index.php">Login Now</a></p>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>

</html>