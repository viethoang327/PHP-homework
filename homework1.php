<?php 
// ****Bài 1*****
// $nums=[1, 6, 10, 13, 18, 30, 5, 7, 72 ,91, 64, 58, 17, 23, 48, 73, 19, 36, 86];
// $nums1=[];
// echo "1. Số chia hết cho 2 và 3:";
// echo '<br />';
// foreach ($nums as $num) {
// 		if ($num%2==0&&$num%3==0){
// 			echo "$num";
// 		 	echo "<br />";
// 		 	array_push($nums1, $num);

// 		}		
// 	}

// echo "2. Sắp xếp thứ tự";
// echo '<br />';
// echo "Từ nhỏ đến lớn:";
// echo '<br />';
// sort($nums1);
// print_r($nums1);
// echo '<br />';
// echo "Từ lớn đến nhỏ:";
// echo '<br />';
// rsort($nums1);
// //print_r($nums1);
// var_dump($nums1);

// //****Bài 2****
$students=[
	'Nguyen Van A'=>[
		'tuoi'=>18,
		'lop'=>'12A1',
		'Toan'=>10,
		'Ly'=>7,
		'Hoa'=>8
	],
	'Nguyen Van B'=>[
		'tuoi'=>18,
		'lop'=>'12A2',
		'Toan'=>8,
		'Ly'=>10,
		'Hoa'=>9
	],
	'Nguyen Van C'=>[
		'tuoi'=>18,
		'lop'=>'12A3',
		'Toan'=>10,
		'Ly'=>10,
		'Hoa'=>10
	],
	'Nguyen Van D'=>[
		'tuoi'=>18,
		'lop'=>'12A4',
		'Toan'=>9,
		'Ly'=>9,
		'Hoa'=>10
	]
];
// convert data first!
$grade=array();
foreach ($students as $key => $value) {
	$total=$value['Toan']+ $value['Ly'] + $value['Hoa'];
	$grade[$key]=$total;
}
echo "<br/>";
arsort($grade);
foreach ($grade as $key => $value) {
	echo "=======>"."<br />";
	echo "Ten: $key <br/>";
	echo "Tuoi: $students[key]['tuoi'] <br />";
	echo "Tong diem: $value <br/>";
}

 ?>
