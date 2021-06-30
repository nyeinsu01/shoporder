<?php
	require 'frontendheader.php';
	require 'connection.php';

	$sql= 'SELECT * FROM categories order by rand() LIMIT 8';
	$statement = $pdo->prepare($sql);
	$statement->execute();

	$categories = $statement->fetchAll();

	$sql = 'SELECT * FROM items where discount != "" LIMIT 8';
	$statement = $pdo->prepare($sql);
	$statement->execute();

	$discountitems =$statement->fetchAll();

	$sql ='SELECT * FROM items ORDER BY created_at DESC LIMIT 8';
	$statement = $pdo->prepare($sql);
	$statement->execute();

	$saleitems = $statement->fetchAll();

	$sql = "SELECT * FROM brands ORDER BY Name ASC";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $brands = $statement->fetchAll();

    $randomsubcategory_id=6;
    $sql = 'SELECT * FROM items Where subcategory_id = :value1 LIMIT 8';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':value1', $randomsubcategory_id);
    $statement->execute();

    $randomitems = $statement->fetchAll();

?>
<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>
  		
  		<div class="carousel-inner">
    		<div class="carousel-item active">
		      	<img src="backend/images/online.jfif" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="backend/images/onlineshopping.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="backend/images/online.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
  		</div>
	</div>

<!-- Content -->
	<div class="container mt-5 px-5">
		<!-- Category -->
		<div class="row">
			<?php
				foreach ($categories as $category) {
					$randomcategory_id = $category['ID'];
					$randomcategory_name = $category['Name'];
					$randomcategory_img = $category['logo'];
				
			?>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
				<div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center">
				  	<img src="<?= $randomcategory_img; ?>" class="card-img-top" alt="...">
				  	<div class="card-body">
				    	<p class="card-text font-weight-bold text-truncate"> <?= $randomcategory_name; ?> </p>
				  	</div>
				</div>
			</div>
			<?php } ?>
		</div>

		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
		
		<!-- Discount Item -->
		<div class="row mt-5">
			<h1> Discount Item </h1>
		</div>

	    <!-- Disocunt Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	
		            

		            	<?php
		            	foreach ($discountitems as $discountitem) {
		            	 	$di_id = $discountitem['id'];
		            	 	$di_name = $discountitem['item_name'];

		            	 	$di_price = $discountitem['price'];
		            	 	$di_discount = $discountitem['discount'];

		            	 	$di_photo = $discountitem['photo'];

		            	 	$di_codeno = $discountitem['codeno'];

		            	 
		            	?>
		                <div class="item">
		                    <div class="pad15">
		                    <a href="detail.php?id=<?= $di_id ?>" style="color:black; text-decoration:none;" >
		                    	<input type="hidden" name="discount_id" value="<?= $di_id ?>">
		                    	<img src="<?= $di_photo ?>" class="img-fluid" width="200" height="70">
		                        <p class="text-truncate"><?= $di_name ?></p>
		                        <p class="item-price">
		                        	<strike><?= $di_price ?></strike> 
		                        	<span class="d-block"><?= $di_discount ?>Ks</span>
		                        </p>
		                    </a>
		            

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>


								<a href="cart1.php">
								<button  class="addtocart btn btn-outline-danger" data-id="<?= $di_id ?>" data-name="<?= $di_name ?>" data-price="<?= $di_price ?>" data-discount="<?= $di_discount ?>" data-photo="<?= $di_photo ?>" data-code="<?= $di_codeno ?>">Add to Cart</button>
								</a>
		                    </div>
		                </div>
		            <?php } ?>	
		            </a>                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Flash Sale Item -->
		<div class="row mt-5">
			<h1> Flash Sale </h1>
		</div>

	    <!-- Flash Sale Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php
		            	foreach ($saleitems as $saleitem) {
		            	 	$sale_id = $saleitem['id'];
		            	 	$sale_name = $saleitem['item_name'];

		            	 	$sale_price = $saleitem['price'];
		            	 	$sale_discount = $saleitem['discount'];

		            	 	$sale_photo = $saleitem['photo'];

		            	 	$sale_codeno = $saleitem['codeno'];
		            	 
		            	?>
		            	     <a href="detail1.php?id=<?= $sale_id ?>" style="color:black; text-decoration:none;" >
		                    	<input type="hidden" name="sale_id" value="<?= $sale_id ?>">
      
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $sale_photo ?>" class="img-fluid" width="200" height="70">
		                        <p class="text-truncate"><?= $sale_name ?></p>
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
		                        </a>
		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<a href="cart1.php">
								<button  class="addtocart btn btn-outline-danger" data-id="<?= $sale_id ?>" data-name="<?= $sale_name ?>" data-price="<?= $sale_price ?>" data-discount="<?= $sale_discount ?>" data-photo="<?= $sale_photo ?>" data-code="<?= $sale_codeno ?>">Add to Cart</button>
								</a>

		                    </div>
		                </div>
		                <?php } ?>
		                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Random Catgory ~ Item -->
		<div class="row mt-5">
			<h1> Fresh Picks </h1>
		</div>

	    <!-- Random Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	<?php
		            	foreach ($randomitems as $randomitem) {
		            	 	$ri_id = $randomitem['id'];
		            	 	$ri_name = $randomitem['item_name'];

		            	 	$ri_price = $randomitem['price'];
		            	 	$ri_discount = $randomitem['discount'];

		            	 	$ri_photo = $randomitem['photo'];

		            	 	$ri_codeno = $randomitem['codeno'];
		            	 
		            	?>
		            	<a href="detail2.php?id=<?= $ri_id ?>" style="color:black; text-decoration:none;" >
		                    	<input type="hidden" name="sale_id" value="<?= $ri_id ?>">
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $ri_photo ?>" class="img-fluid" width="200" height="70">
		                        <p class="text-truncate"><?= $ri_name ?></p>
		                        <p class="item-price">
		                        	<?php
		                        	if ($ri_discount) {
		                        		
		                        	
		                        	?>
		                        	<strike><?= $ri_price ?>Ks</strike> 
		                        	<span class="d-block"> <?= $ri_discount ?>Ks</span>

		                        	<?php }
		                        	else{ 
		                        		?>
		                        	<span class="d-block"><?= $ri_price ?>Ks</span>	
		                        	<?php } ?>
		                        </p>
		                         </a>
		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<a href="cart1.php">
								<button  class="addtocart btn btn-outline-danger" data-id="<?= $ri_id ?>" data-name="<?= $ri_name ?>" data-price="<?= $ri_price ?>" data-discount="<?= $ri_discount ?>" data-photo="<?= $ri_photo ?>" data-code="<?= $ri_codeno ?>">Add to Cart</button>
								</a>
							</div>
		                </div>
		                    <?php } ?>
		                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		
		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	    <!-- Brand Store -->
	    <div class="row mt-5">
			<h1> Top Brand Stores </h1>
	    </div>

	    <!-- Brand Store Item -->
	    <section class="customer-logos slider mt-5">
	    	<?php
			    foreach ($brands as $brand) {
			    $bphoto = $brand['photo'];
			        		
			?>
	      	<div class="slide">
	      		
	      		<a href="">
		      		<img src="<?= $bphoto ?>" class="img-fluid" width="200" height="70">
		      	</a>

	      	</div>
	      	<?php } ?>
	      	
	   	</section>

	    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	</div>
	<?php
	require 'frontendfooter.php';
	?>