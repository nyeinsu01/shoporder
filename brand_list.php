<?php
			require 'connection.php';
			$query="select ID,Name from brands";
			$result=$pdo->query($query);
			$brands=$result->fetchAll(PDO::FETCH_ASSOC);
			

			if (isset($edit_brand_id)) {
			
				foreach ($brands as $brand) {
				$brand_id=$brand['ID'];
				$Name=$brand['Name'];

				
				if ($edit_brand_id==$brand_id) {
				echo "<option value='$brand_id' selected='selected'>$Name</option> ";	
				}
				echo "<option value='$brand_id'>$Name</option> ";
			}

			}else{

			foreach ($brands as $brand) {
				$brand_id=$brand['ID'];
				$Name=$brand['Name'];
				echo "<option value='$brand_id'>$Name</option> ";
			}}

		?>