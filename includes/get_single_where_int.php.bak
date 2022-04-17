<?php
	if (!isset($conn)) {
		if (!isset($file_path)) {
			$file_path = $_SERVER["DOCUMENT_ROOT"];
		}
		include $file_path."/php/dbh.php";
	}
	$stmt = $conn->prepare("SELECT ? FROM ? WHERE (?) = ('?');";
	$stmt = $conn->bind_param("sssi", $table_name, $column_name, $where_column, $where_value);
	$raw_result = $stmt->execute();
	if ($raw_result->num_rows > 0) {
		$row = $raw_result->fetch_assoc();
		$result = $row[$column_name];
		unset($row);
		unset($raw_result);
	}
	else {
		$result = "null";
	}
?>
