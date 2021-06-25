<?php

	require 'connection.php'; 
	$ID = $_POST['ID'];
	

	$sql = 'DELETE FROM brands WHERE ID=:ID';
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':ID',$ID);
	$statement->execute();

	header('location:brand.php')

?>