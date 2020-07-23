<?php
	include './config/db.php';
	$file_handle = fopen("wordbank.txt", "rb");
	while(!feof($file_handle)) {
		$line_of_text = fgets($file_handle);
		$parts = explode(' ', $line_of_text);
		$mac[] = $parts[0];
	}
	fclose($file_handle);

	for($i=0; $i<count($mac); $i++){
		$q = $db->pdo->prepare("insert into tbl_wordbank set wordbank = '".trim($mac[$i])."'");
		$q->execute();
	}