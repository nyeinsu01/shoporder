<?php
			require 'connection.php';
			$query="select ID,Name from categories";
			$result=$pdo->query($query);
			$categories=$result->fetchAll(PDO::FETCH_ASSOC);
			

			if (isset($edit_category_id)) {
			
				foreach ($categories as $category) {
				$category_id=$category['ID'];
				$Name=$category['Name'];

				
				if ($edit_category_id==$category_id) {
				echo "<option value='$category_id' selected='selected'>$Name</option> ";	
				}
				echo "<option value='$category_id'>$Name</option> ";
			}

			}else{

			foreach ($categories as $category) {
				$category_id=$category['ID'];
				$Name=$category['Name'];
				echo "<option value='$category_id'>$Name</option> ";
			}}

		?>