<?php
	
	require 'connection.php';

	$Name = $_POST['name'];
	$logo = $_FILES['photo'];
	$ID = $_POST['id'];
	$oldlogo = $_POST['oldlogo'];

	$source_dir = 'image/brand/';

	if (isset($logo) && $logo['size']>0) {
	
	$filename = mt_rand(100000,999999);
	$file_array = explode('.',$logo['name']);
	$file_exe = $file_array[1];

	$filepath = $source_dir.$filename.'.'.$file_exe;
	move_uploaded_file($logo['tmp_name'], $filepath);

	unlink($oldlogo);
	}else{
		$filepath = $oldlogo;
	}

	$sql = "UPDATE brands SET Name=:Name, photo=:logo WHERE ID=:ID";
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':Name', $Name);
	$statement->bindParam(':logo', $filepath);
	$statement->bindParam(':ID', $ID);

	$statement->execute();

	header('location:brand.php');


?> 