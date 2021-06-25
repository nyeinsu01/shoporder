<?php
			require 'connection.php';
			$query="select ID,Subcategory_name from subcategories";
			$result=$pdo->query($query);
			$subcategories=$result->fetchAll(PDO::FETCH_ASSOC);
			

			if (isset($edit_subcategory_id)) {
			
				foreach ($subcategories as $subcategory) {
				$subcategory_id=$subcategory['ID'];
				$sName=$subcategory['Subcategory_name'];

				
				if ($edit_subcategory_id==$subcategory_id) {
				echo "<option value='$subcategory_id' selected='selected'>$sName</option> ";	
				}
				echo "<option value='$subcategory_id'>$sName</option> ";
			}

			}else{

			foreach ($subcategories as $subcategory) {
				$subcategory_id=$subcategory['ID'];
				$sName=$subcategory['Subcategory_name'];
				echo "<option value='$subcategory_id'>$sName</option> ";
			}}

		?>