<?php
	$email=$pass=$repass='';
	$success=$err_email=$err_pass=$err_repass='';
	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] =="POST") {
		if (empty($_POST['email'])) {
			$err_email= 'An email is required!';
		}else{
			$email= $_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$err_email= 'Email must be a validate email address';
			}
		}
		if (empty($_POST['pass'])) {
			$err_pass= 'An password is required!';
		}else{
			$pass= $_POST['pass'];
			if (!preg_match('/^[A-Za-z0-9]{6,}$/', $pass)) {
				$err_email= 'Password must be at least 6 digits!';
			}
		}
		if (empty($_POST['repass'])) {
			$err_repass= 'please confirm your password!';
		}else{
			$repass= $_POST['repass'];
			if (strcmp($pass, $repass)!=0) {
				$err_repass= 'Incorrect password!';
			}
		}
		//insert to DB and send email
		$connect= new mysqli("localhost","hoang","123456","accountcontrol");
		if ($connect->connect_errno) {
			die("Failed to connect to MySQL: "). $connect ->connect_error;
		}
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$pass = mysqli_real_escape_string($connect, $_POST['pass']);
		$sql = "INSERT INTO acc_control(email,pass) VALUES ('$email','$pass')";
		if ($connect->query($sql)===TRUE){
			// Send email and show to screen an message
			$mail_to= $email;
			$subject= 'Sign-in your account!';
			$message= "Thank you for using our service! Please click this link below to login to our website: https://localhost/PHPProject/homework4/login_form.php" ;
			$check = mail($mail_to, $subject, $message);
				if($check){
				$success = "An email was send to your email account. Please check your email to completed registration!";
				}else{
				echo 'send mail fail';
				}
		}else{
			die("error").$connect->error;
		}
		//Close DB
		$connect->close();

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration form</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
<body>
		<div class="wrapper">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST'>
				<h1> Register an account </h1>
				<div class="flex">
					<label class="lb">Your Email:</label>
					<input type="text" name="email" class="inp"> 
					<span class="error"><?php echo  $err_email ?> </span>
				</div>
				<div class="flex">
					<label class="lb">Your Password:</label>
					<input type="password" name="pass" class="inp"> 
					<span class="error"><?php echo $err_pass ?> </span>
				</div>
				<div class="flex">
					<label class="lb">Confirm Password:</label>
					<input type="password" name="repass" class="inp">
					<span class="error"><?php echo $err_repass ?> </span>
				</div>
				<div class="btn">
					<input type="submit" name="submit" value="Register">
				</div>
				<h4 class="inform"><?php echo htmlspecialchars($success) ?> </h4>
			</form>
		</div>
</body>
</html>