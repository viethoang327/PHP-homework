<?php 
	include('sinhvien.php');
	include('database.php');
	use Sinhvien\Sinhvien;
	use DB\DB;
	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] =="POST") {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$math = $_POST['math'];
		$physic = $_POST['physic'];
		$chemistry = $_POST['chemistry'];
		
		$student = new Sinhvien('$name','$age','$gender','$math','physic','$chemistry');
		$data = new DB('localhost','hoang','123456','StudentManagement');
			$conn = $data->connect();
			$tab_name = 'infor'; 
			$oder_field = 'name,age,gender,math,physic,chemistry';
			$value = "$name,$age,$gender,$math,$physic,$chemistry";
		$insert = $data->insert($tab_name,$conn,$oder_field,$value);
		echo $insert;
		$data->close($conn,$insert);

	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Show result</title>
	<style type="text/css">
		.center{
			width: 420px;
			height: 600px;
			background-color: goldenrod;
			margin: 0 auto;			
		}
		label, input{
			display: flex;
			margin-top: 5px;
			text-align: center;
		}
		input[type='radio']{
			display: inline;
			
		}		
	</style>

</head>
<body>
	<div class="center">
		<h1>Input student Infor</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<label>Name:</label>
			<input type="text" name="name">
			<label>Age:</label>
			<input type="text" name="age">
			<label>Gender:</label>
			<input type="radio" name="gender" value="Male"> <span>Male</span>
			<input type="radio" name="gender" value="Female"> <span>Female</span>
			<label>Math:</label>
			<input type="text" name="math">
			<label>Physic:</label>
			<input type="text" name="physic">
			<label>Chemistry:</label>
			<input type="text" name="chemistry">
			<input type="submit" name="submit" value="submit">
		</form>

	</div>

</body>
</html>