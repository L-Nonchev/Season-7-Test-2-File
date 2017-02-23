<?php 
		

$arrPririty = file('notes.txt');
//sort by priority
$newArrayWithPririty = array();

//priority
$priority = "#1";
while ($priority <= "#5"){
	for ($index = 0; $index < count($arrPririty); $index++){
		$needet = strpos($arrPririty[$index], $priority);
		if ($needet > 0){
			$newArrayWithPririty[]= $arrPririty[$index];
		}
	}
	$priority++;
}

$data2 = implode($newArrayWithPririty);
file_put_contents('priorityNotes.txt', $data2);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Priority</title>
	<link rel="stylesheet" href="assets/css/css.css" />
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body>
<a href="exam.php">Обратно към формата за въвеждане на бележки</a>
	<table>
		<tr>
			<th>Notes</th>
			<th>Priority</th>
		</tr>
	<?php 
	// reed priority ande create table
	$handle = fopen('priorityNotes.txt', 'r');
		$arr= "";
		while (!feof($handle)){
			$line = fgets($handle);
			$arr = explode("#", $line);
			if (strlen($arr[0]) > 0){
				echo "<tr>";
				echo "<td>" . $arr[0] . "</td>";
				echo "<td>" . $arr[1] . "</td>";
				echo "</tr>";
			}
		}
	
	?>	
	</table>
	
</body>
</html>