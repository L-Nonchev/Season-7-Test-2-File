<?php 

// create new note with  Priority
if (isset($_POST['submit'])){
	//check for corect prirty
	if ((strlen($_POST['prioritet']) === 1) && ($_POST['prioritet'] > 0) && ($_POST['prioritet'] < 6)){
		//check for corect note
		if (((strlen($_POST['note'])) <= 50) && (strlen($_POST['note'])) > 0){
			$newNote = htmlentities($_POST['note']);
			$prioritet = (int)($_POST['prioritet']);
			$data =  $newNote . "#" . $prioritet .PHP_EOL;
			//create new element in note
			file_put_contents("notes.txt", $data, FILE_APPEND);
		}else {
			echo "Моля въведете бележка не по-дъла от 50 символа !";
		}
	}else{
		echo "Моля въведете прироите в интервала 1-5";
	}	
}
// Delete a note;
if (isset($_POST['delete-note'])){
	$cutNumber = $_POST['cut-note'];
	if ($cutNumber > 0){
		$cutNumber--;
		$arrForDeleteElements = file('notes.txt');
		$gosho = array_splice($arrForDeleteElements, $cutNumber, 1);
		file_put_contents('notes.txt', $arrForDeleteElements);
	}
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Notes</title>
</head>
<body>
	<form action="exam.php" method="post">
		<label for="note">Моля въведете белейка</label>
		<input type="text" name="note" maxlength="50" />
		<br />
		<label for="note">Моля въведете Приоритет</label>
		<input type="number" name="prioritet" maxlength="1" />
		<br />
		<input type="submit" name="submit" value="Dobavi belejka" />
		<br />
		<label for="note">Моля напишете бележката <br />която искате да изтриете</label>
		<input type="number" name="cut-note" maxlength="100" />
		<br />
		<input type="submit" name="delete-note" value="Delete note" />
		<br />
		<a href="Priority.php">Към страницата с подредеи бележки</a>
	</form>
	
	
	<h1>Notes :</h1>
	<ul>
	<?php 
	// read note
		$arrNotes = "";
		$handle= fopen("notes.txt", "r");
		while (!feof($handle)){
			$line = fgets($handle);
			$arrNotes = explode("#", $line);
			if (strlen($arrNotes[0]) > 0){
				echo "<li>". $arrNotes[0] . "</li>";
				switch ($arrNotes[1]) {
					case 1: ?> <img alt="priority-1" src="assets/img/1.png"> <?php
						break;
					case 2: ?> <img alt="priority-1" src="assets/img/2.png"> <?php
						break;
					case 3: ?> <img alt="priority-1" src="assets/img/3.jpg"> <?php
						break;
					case 4: ?> <img alt="priority-1" src="assets/img/4.png"> <?php
						break;
					case 5: ?> <img alt="priority-1" src="assets/img/5.png"> <?php
						break;
				}	
			}
		}	
		fclose($handle);
	?>
	</ul>	
</body>
</html>