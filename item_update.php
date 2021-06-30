<?php
	
	require 'connection.php';

	$ID = $_POST['id'];
	$codeno = $_POST['name1'];
	$photo = $_FILES['photo'];
	$item_name = $_POST['name2'];
	$price = $_POST['name3'];
	$discount = $_POST['name4'];
	$description = $_POST['address'];
	$brand_id = $_POST['brand_id'];
	$subcategory_id=$_POST['subcategory_id'];
	$oldlogo1=$_POST['oldlogo1'];

	$source_dir = 'image/item/';

	
	if (isset($photo) && $photo['size']>0) {
	
	$filename =  mt_rand(100000,999999);
	$file_array = explode('.',$photo['name']);
	$file_exe = $file_array[1];

	$filepath = $source_dir.$filename.'.'.$file_exe;
	move_uploaded_file($photo['tmp_name'], $filepath);

	unlink($oldlogo1);
	}else{
		$filepath = $oldlogo1;
	}
	
	

	$sql = "UPDATE items SET codeno=:codeno, item_name=:item_name, photo=:photo, price=:price, discount=:discount, description=:description, brand_id=:brand_id, subcategory_id=:subcategory_id WHERE id=:id";


	$statement = $pdo->prepare($sql);
	$statement->bindParam(':codeno',$codeno);
	$statement->bindParam(':item_name',$item_name);
	$statement->bindParam(':photo',$filepath);
	$statement->bindParam(':price',$price);
	$statement->bindParam(':discount',$discount);
	$statement->bindParam(':description',$description);
	$statement->bindParam(':brand_id',$brand_id);
	$statement->bindParam(':subcategory_id',$subcategory_id);
	$statement->bindParam(':id',$ID);
	
		
	$statement->execute();
		
		
		header('location:item.php');	
	



?>


