<?php
	
	require 'connection.php';

	$name = $_POST['name'];
	$photo = $_FILES['photo'];

	$source_dir = 'image/brand/';

	//image/category/apple.png;

	$filename =  mt_rand(100000,999999);
	$file_array = explode('.',$photo['name']);
	$file_exe = $file_array[1];

	$filepath = $source_dir.$filename.'.'.$file_exe;
	move_uploaded_file($photo['tmp_name'], $filepath);

	var_dump($photo);

	$sql = "INSERT INTO brands (Name, photo) VALUES (:Name,:logo)";
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':Name',$name);
	$statement->bindParam(':logo',$filepath);
	$statement->execute();

	header('location:brand.php');

