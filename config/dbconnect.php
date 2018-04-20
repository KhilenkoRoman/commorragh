<?php



function sql_req($requsest)
{
	require 'database.php';
	try {
		$conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare($requsest); 
    	$stmt->execute();
    	if ($stmt->setFetchMode(PDO::FETCH_ASSOC))
    	{
    		$result = $stmt->fetchAll();
			return ($result);
    	}
    	else
    		return true;	
	}
	catch (Exception $e) {
    	return('Error : ' . $e->getMessage());
	}
}

function sql_send($requsest)
{
	require 'database.php';
	try {
		$conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare($requsest); 
    	$stmt->execute();
    	return true;
	}
	catch (Exception $e) {
    	return('Error : ' . $e->getMessage());
	}
}