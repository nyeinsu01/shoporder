<?php
	require 'frontendheader.php';

	$sql ='SELECT * FROM items ORDER BY created_at DESC LIMIT 8';
	$statement = $pdo->prepare($sql);
	$statement->execute();

	$saleitems = $statement->fetchAll();
?>

	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Your Shopping Cart </h1>
  		</div>
	</div>

	<div class="container mt-5">
		
		<!-- Shopping Cart Div -->
		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="index.php" class="btn mainfullbtncolor btn-secondary float-right px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				
				<table class="table">
					<thead>
						<tr>
							<th colspan="3"> Product </th>
							<th colspan="3"> Qty </th>
							<th> Price </th>
							<th> Total </th>
						</tr>
					</thead>
					<tbody id="shoppingcart_table">
						<?php
		            	foreach ($saleitems as $saleitem) {
		            	 	$sale_id = $saleitem['id'];
		            	 	$sale_name = $saleitem['item_name'];

		            	 	$sale_price = $saleitem['price'];
		            	 	$sale_discount = $saleitem['discount'];

		            	 	$sale_photo = $saleitem['photo'];

		            	 	$sale_codeno = $saleitem['codeno'];
		            	 
		            	?>
						<tr>
							<td>
								<form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete!')" action="cart_delete.php" method="POST">
                                                    <input type="hidden" name="id" value="<?= $sale_id ?>">
								<button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"> 
									<i class="icofont-close-line"></i> 
								</button> </form>
							</td>
							<td> 
								<img src="<?= $sale_photo ?>" class="cartImg" width="200" height="70">						
							</td>
							<td> 
								<p><?= $sale_name ?> </p>
								<p><?= $sale_codeno ?></p>
							</td>
							<td>
								<button class="btn btn-outline-secondary plus_btn"> 
									<i class="icofont-plus"></i> 
								</button>
							</td>
							<td>
								<p> 1 </p>
							</td>
							<td>
								<button class="btn btn-outline-secondary minus_btn"> 
									<i class="icofont-minus"></i>
								</button>
							</td>
							<td>
								
								<p class="item-price">
		                        	<?php
		                        	if ($sale_discount) {
		                        		
		                        	
		                        	?>
		                        	<strike><?= $sale_price ?>Ks</strike> 
		                        	<span class="d-block"> <?= $sale_discount ?>Ks</span>

		                        	<?php }
		                        	else{ 
		                        		?>
		                        	<span class="d-block"><?= $sale_price ?>Ks</span>	
		                        	<?php } ?>
		                        </p>
							</td>
							<td>
								230,000 Ks
							</td>
						</tr>
						 <?php } ?>

					</tbody>
					<tfoot id="shoppingcart_tfoot">
						<tr>
							<td colspan="8">
								<h3 class="text-right"> Total : 46,000 Ks </h3>
							</td>
						</tr>
						<tr> 
							<td colspan="5"> 
								<textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
							</td>
							<td colspan="3">
								<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn"> 
									Check Out 
								</button>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

		<!-- No Shopping Cart Div -->
		<div class="row mt-5 noneshoppingcart_div text-center">
			
			<div class="col-12">
				<h5 class="text-center"> There are no items in this cart </h5>
			</div>

			<div class="col-12 mt-5 ">
				<a href="categories" class="btn btn-secondary mainfullbtncolor px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>

		</div>
		

	</div>

<?php
	require 'frontendfooter.php';
?>