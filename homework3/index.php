<?php
// connect to DB
 $conn = mysqli_connect('localhost','hoang','123456','StudentManagement');
 if (!$conn) {
        echo 'Kết nối thất bại' . mysqli_connect_error();
    }
// write query for all field
 $sql = "SELECT *, (math+physic+chemistry) AS total FROM student_infor ORDER BY total DESC";
// make query and get result
 $result = mysqli_query($conn,$sql);
// fetch the resulting rows as an array
 $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
 //free result and close DB
 mysqli_free_result($result);
 mysqli_close($conn);
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Student Infomation</title>
 	<link rel="stylesheet" type="text/css" href="./style.css">
 </head>
 <body>
 	<div class="wrapper">
 		<h2>Thông tin sinh viên </h2>
 		<table>
 			<thead>
 				<tr>
 					<th>STT</th>
 					<th>Họ Và Tên</th>
 					<th>Giới Tính</th>
 					<th>Điểm Toán</th>
 					<th>Điểm Lý</th>
 					<th>Điểm Hóa</th>
 					<th>Tổng Điểm </th>
 				</tr>
 			</thead>         
            <tbody>
                <?php foreach ($students as $student) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($student['id']) ?></td>
                    <td><?php echo htmlspecialchars($student['name']) ?></td>
                    <td><?php echo htmlspecialchars($student['gender']) ?></td>
                    <td><?php echo htmlspecialchars($student['math']) ?></td>
                    <td><?php echo htmlspecialchars($student['physic']) ?></td>
                    <td><?php echo htmlspecialchars($student['chemistry']) ?></td>
                    <td><?php echo htmlspecialchars($student['total']) ?></td>
                </tr>   
                <?php } ?>
            </tbody>
            
 		</table>
 	</div>
 </body>
 </html>