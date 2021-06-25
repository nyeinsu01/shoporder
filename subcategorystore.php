<?php

	require 'connection.php'; 
	$Name=$_POST['name'];
	$category_id=$_POST['category_id'];

	$query="INSERT into subcategories(

		Subcategory_name,category_id) values(:Name,:category_id)";

		$statement=$pdo->prepare($query);


		try{
		$statement->execute([
		
			':Name' => $Name,
			':category_id' => $category_id
		]);
		header("location:subcategory.php");
		}
		catch(Exception $e){
			throw $e;
		}




?>