<?php 
	require 'frontendheader.php';

	require 'connection.php';
	$id = $_GET['id'];
	$sql = 'SELECT i.id,i.codeno,i.item_name,i.photo,i.price,i.discount,i.description,i.brand_id,b.Name,s.ID from items i JOIN subcategories s ON s.ID=i.subcategory_id JOIN brands b ON b.ID=i.brand_id where b.ID=:id';
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':id',$id);
	$statement->execute();

	$brands =$statement->fetchAll();


	$sql = 'SELECT * FROM items LIMIT 4';
	$statement = $pdo->prepare($sql);
	$statement->execute();

	$items =$statement->fetchAll();
?>

<div class="jumbotron jumbotron-fluid subtitle">

  		<div class="container">
  			<?php
			        		foreach ($brands as $brand) {
			        			$bID = $brand['id'];
			        			$bName = $brand['Name'];
			        			$bphoto = $brand['photo'];
			        			$iname = $brand['item_name'];
			        			$price = $brand['price'];
			        			$discount = $brand['discount'];
			        			$codeno = $brand['codeno'];
			        		
			        	?>
    		  <?php } ?>
    		
    		<h1 class="text-center text-white"><?= $bName ?> </h1>
  		</div>
</div>
	
	<!-- Content -->
	<div class="container mt-5">


		<div class="row mt-5">
            <div class="col">
            	<?php
			        		foreach ($brands as $brand) {
			        			$bID = $brand['id'];
			        			$bName = $brand['Name'];
			        			$bphoto = $brand['photo'];
			        			$iname = $brand['item_name'];
			        			$price = $brand['price'];
			        			$discount = $brand['discount'];
			        			$codeno = $brand['codeno'];
			        		
			        	?>
                <div class="bbb_viewed_title_container">
                    <h3 class="bbb_viewed_title"> <?= $bName ?>  </h3>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					        		<img src="<?= $bphoto ?>" class="img-fluid">
					            	<p class="text-truncate"><?= $iname ?></p>
					            	<p class="item-price">
					            		<strike><?= $price ?> Ks </strike> 
					            		<span class="d-block"><?= $discount ?> Ks</span>
					            	</p>

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
								<button  class="addtocart btn btn-outline-danger" data-id="<?= $bid ?>" data-name="<?= $iname ?>" data-price="<?= $price ?>" data-discount="<?= $discount ?>" data-photo="<?= $bphoto ?>" data-code="<?= $codeno ?>">Add to Cart</button>
								</a>

					        	</div>
					        </div>
					       <?php } ?>
					    </div> 
					</div>
                </div>
              
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
            	
                <div class="bbb_viewed_title_container">
                    <h3 class="bbb_viewed_title"> Brand Category  </h3>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
					    <div class="owl-item">
					    	<?php
			        		foreach ($brands as $brand) {
			        			$bID = $brand['id'];
			        			$bName = $brand['Name'];
			        			$bphoto = $brand['photo'];
			        			$iname = $brand['item_name'];
			        			$price = $brand['price'];
			        			$discount = $brand['discount'];
			        			$codeno = $brand['codeno'];
			        		
			        	?>
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					        		<img src="image/item/saisai_one.jpg" class="img-fluid">
					            	<p class="text-truncate"><?= $iname ?></p>
					            	<p class="item-price">
					            		<strike><?= $price ?> Ks</strike> 
					            		<span class="d-block">230,000 Ks</span>
					            	</p>

					                <div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
										</ul>
									</div>

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>
					        	</div>
					        </div>
					        <?php } ?>
					    </div>

					    

					</div>
                </div>
            </div>
        </div>

	</div>

<?php 
	require 'frontendfooter.php';
?>