<?php

	require 'connection.php'; 
	$ID = $_POST['ID'];
	var_dump($ID);

	$sql = 'DELETE FROM categories WHERE ID=:ID';
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':ID',$ID);
	$statement->execute();

	header('location:categorylist.php')

?>