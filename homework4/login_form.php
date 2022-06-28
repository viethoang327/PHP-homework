<?php
	$email=$pass="";
	$err_email=$err_pass="";
	if (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']=='POST') {
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		//connect DB
		$connect= new mysqli("localhost","hoang","123456","accountcontrol");
		if ($connect->connect_errno) {
			die("Failed to connect to MySQL: "). $connect ->connect_error;
		}
		// query DB
		$sql = "SELECT email,pass FROM acc_control WHERE email = '$email'";
		$result = $connect->query($sql);
		//fetch to arr
		$arr_result = $result->fetch_array(MYSQLI_ASSOC);
		// print_r($arr_result);die;
		// compare password 
		if ($arr_result['pass']===$pass) {
			header("location: http://localhost/PHPProject/homework4/index.html");
		}else{
			$err_pass = " Incorrect email or password, please try again!";
		}
		// free result and close DB
		$result -> free_result();
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
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
		<div class="wrapper">
			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
				<h1> Login your account </h1>
				<div class="flex">
					<label class="lb">Your Email:</label>
					<input type="text" name="email" class="inp">
				</div>
				<div class="flex">
					<label class="lb">Your Password:</label>
					<input type="password" name="pass" class="inp">
				</div>			
				<div class="btn">
					<input type="submit" name="login" value="Login">
				</div>
				<h4 class="error"><?php echo htmlspecialchars($err_pass) ?> </h4>
			</form>
		</div>
</body>
</html>