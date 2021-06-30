<?php
	require 'frontendheader.php';
	require 'connection.php';
	$id = $_GET['id'];

	$sql = 'SELECT i.id,i.codeno,i.item_name,i.photo,i.price,i.discount,i.description,i.brand_id,b.Name,s.ID from items i JOIN subcategories s ON s.ID=i.subcategory_id JOIN brands b ON b.ID=i.brand_id where i.id=:id';
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':id',$id);
	$statement->execute();

	$disitems =$statement->fetchAll();
	
	$sql = 'SELECT * FROM items order by rand() LIMIT 8';
	$statement = $pdo->prepare($sql);
	$statement->execute();

	$items =$statement->fetchAll();
	

?>

	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Code Number </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="index.php" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> Category </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> Category Name </a>
		    	</li>
		    	<li class="breadcrumb-item active" aria-current="page">
					Subcategory Name
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<?php
		            	foreach ($disitems as $disitem) {
		            	 	$id = $disitem['id'];
		            	 	$name = $disitem['item_name'];

		            	 	$price = $disitem['price'];
		            	 	$discount = $disitem['discount'];
		            	 	$description = $disitem['description'];
		            	 	$photo = $disitem['photo'];

		            	 	$codeno = $disitem['codeno'];}
		            	 	
		            	 	$brand = $disitem['Name'];

		            	?>
			
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<img src="<?=$photo ?>" class="img-fluid" width="250" height="250">
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				
				<h4> <?= $name ?> </h4>

				<div class="star-rating">
					<ul class="list-inline">
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
					</ul>
				</div>

				 <p class="text-truncate"><?=  $description ?></p>

				<p> 
					<span class="text-uppercase "> Current Price : </span>
					<strike><?= $price ?>Ks</strike> 
		            <span class="d-block text-danger"><?= $discount ?>Ks</span>
				</p>

				<p> 
					<span class="text-uppercase "> Brand : </span>
					<span class="ml-3 text-decoration-none"> <?= $brand  ?></span>
				</p>


				<a href="cart1.php" class="addtocartBtn text-decoration-none">
					<i class="icofont-shopping-cart mr-2"></i> Add to Cart
				</a>
				
			</div>
		</div>


		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">
		            	
		            

		            	<?php
		            	foreach ($items as $item) {
		            	 	$id = $item['id'];
		            	 	$photo = $item['photo'];

		            	?>
		                <div class="item">
		                    <div class="pad15">
		                    <a href="detail.php?id=<?= $id ?>" style="color:black; text-decoration:none;" >
		                    	<input type="hidden" name="discount_id" value="<?= $id ?>">
		                    	<img src="<?= $photo ?>" class="img-fluid" width="200" height="70">
		                        
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


		
	</div>





	
<?php
	require 'frontendfooter.php';
?>