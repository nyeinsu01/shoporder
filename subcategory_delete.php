<?php
	
	
	$ID=$_POST['ID'];
	
	require 'connection.php';
	var_dump($ID);

	
	$query="DELETE from subcategories where ID=:ID";
	$statement=$pdo->prepare($query);
	
	try{
		//execute statement and get return value in $result
	$result=$statement->execute([
		':ID'=> $ID,
	]);

	if($result){
		header('location:subcategory.php');
	}
}catch(Exception $e){
	throw $e;
}

?>