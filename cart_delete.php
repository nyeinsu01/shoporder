<?php

	require 'connection.php'; 
	$ID = $_POST['id'];
	var_dump($ID);

	$sql = 'DELETE FROM items WHERE ID=:ID';
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':ID',$ID);
	$statement->execute();

	header('location:cart.php')

?>