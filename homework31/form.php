<?php
$name=$math=$physic=$chemis=$gender=""; 
$errname=$errmath=$errphysic=$errchemis=$errgender="";
// check form and validate
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] =="POST") {
		if (empty($_POST['name'])) {
		    $errname = "Tên không được để trống!";
		}else{
			$name = $_POST['name'];
			if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
				$errname = "Mời bạn nhập đúng chữ cái";
			}
		}
		if (empty($_POST['math'])) {
		    $errmath = "Vui lòng điền điểm!";
		}else{
			$math = $_POST['math'];
			if (!preg_match('/^[0-9]+$/', $math)) {
				$errmath = "Mời bạn nhập số";
			}
		}
		if (empty($_POST['physic'])) {
		    $errphysic = "Vui lòng điền điểm!";
		}else{
			$name = $_POST['physic'];
			if (!preg_match('/^[0-9]+$/', $math)) {
				$errphysic = "Mời bạn nhập số";
			}
		}
		if (empty($_POST['chemis'])) {
		    $errchemis = "Vui lòng điền điểm!";
		}else{
			$name = $_POST['chemis'];
			if (!preg_match('/^[0-9]+$/', $math)) {
				$errchemis = "Mời bạn nhập số";
			}
		}
		 if (empty($_POST['gender'])) {
		    $errgender = "Vui lòng chọn giới tính";
		}else{
			$gender= $_POST['gender'];
		}
    /////// conect DB and insert.////////
	$conn = mysqli_connect('localhost','hoang','123456','StudentManagement');
	if (!$conn) {
		echo 'error:' . mysqli_connect_error();
	}
	// protect DB
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$math = mysqli_real_escape_string($conn, $_POST['math']);
		$physic = mysqli_real_escape_string($conn, $_POST['physic']);
		$chemis = mysqli_real_escape_string($conn, $_POST['chemis']);
	// create sql
		$sql="INSERT INTO student_infor(name,gender,math,physic,chemistry) VALUES ('$name','$gender','$math','$physic','$chemis')";
	// save to DB and check	
		if(mysqli_query($conn, $sql)){
			header("location: http://localhost/PHPProject/homework3/index.php");
		}else{
			echo 'query error: ' . mysql_error($conn);
		}
	
	// exit DB
	mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>form submit</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	<div class="wrapper">
		<h2>Nhập thông tin sinh viên:</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
			<div>
				<label>1.Họ và tên: </label> <br>
				<input type="text" name="name" class="inp">
				<span class="error"> <?php echo "$errname"; ?> </span>
			</div>
			<div> 
				<label>2. Điểm Toán: </label> <br>
				<input type="text" name="math" class="inp">
				<span class="error"> <?php echo "$errmath"; ?> </span>
			</div>
			<div>
				<label>3.Điểm Lý: </label> <br>
				<input type="text" name="physic" class="inp">
				<span class="error"> <?php echo "$errphysic"; ?> </span>
			</div>
			<div>
				<label>4.Điểm Hóa: </label> <br>
				<input type="text" name="chemis" class="inp">
				<span class="error"> <?php echo "$errchemis"; ?> </span>
			</div>
			<div>
				<label>5.Giới tính: </label> <br>
				<input type="radio" name="gender" value="Nam"> <span> Nam</span> <br>
				<input type="radio" name="gender" value="Nữ"> <span> Nữ</span><br>
				<input type="radio" name="gender" value="Khác"> <span> Khác</span><br>
				<span class="error"> <?php echo "$errgender"; ?> </span>
			</div>
			<div class="btn-submit">
				<input type="submit" name="submit" value="Submit"> <span>
			</div>

		</form>
	</div>
</body>
</html>