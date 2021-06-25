<?php
	$ID=$_POST['ID'];
	$Name=$_POST['name'];
	$category_id=$_POST['category_id'];
	

	
	require 'connection.php';
	

	$sql = "UPDATE subcategories SET subcategory_name=:name, category_id=:category_id WHERE ID=:id";
	$statement = $pdo->prepare($sql);


	try{

	$result=$statement->execute([
		':id'=>$ID,
		':name'=>$Name,
		':category_id'=>$category_id,

	]);
	var_dump($result);
	die();
	}catch(Exception $e){
		throw $e;
	}
	if ($result){
		header('location:subcategory.php');	
	}
	



?>