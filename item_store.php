<?php
	
	require 'connection.php';


	$codeno = $_POST['name1'];
	$photo = $_FILES['photo'];
	$item_name = $_POST['name2'];
	$price = $_POST['name3'];
	$discount = $_POST['name4'];
	$description = $_POST['address'];
	$brand_id = $_POST['brand_id'];
	$subcategory_id=$_POST['subcategory_id'];
	

	$source_dir = 'image/item/';

	//image/category/apple.png;

	$filename =  mt_rand(100000,999999);
	$file_array = explode('.',$photo['Name']);
	$file_exe = $file_array[1];

	$filepath = $source_dir.$filename.'.'.$file_exe;
	move_uploaded_file($photo['tmp_name'], $filepath);

	var_dump($photo);

	$sql = "INSERT INTO items (codeno,item_name,photo,price,discount,description,brand_id,subcategory_id) VALUES (:codeno,:item_name,:photo,:price,:discount,:description,:brand_id,:subcategory_id)";
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':codeno',$codeno);
	$statement->bindParam(':item_name',$item_name);
	$statement->bindParam(':photo',$filepath);
	$statement->bindParam(':price',$price);
	$statement->bindParam(':discount',$discount);
	$statement->bindParam(':description',$description);
	$statement->bindParam(':brand_id',$brand_id);
	$statement->bindParam(':subcategory_id',$subcategory_id);
	
		try{
		$statement->execute([
			':codeno' => $codeno,
			':item_name' => $item_name,
			':photo' => $filepath;
			':price' =>$price;
			':discount' => $discount;
			':description' => $description;
			':brand_id' => $brand_id;
			':subcategory_id' => $subcategory_id;
		]);
		header("location:item.php");
		}
		catch(Exception $e){
			throw $e;
		}



?>


