<?php
	require 'frontendheader.php';
	$sql ='SELECT * FROM items ORDER BY created_at DESC LIMIT 8';
	$statement = $pdo->prepare($sql);
	$statement->execute();

	$items = $statement->fetchAll();

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
							<th colspan="4"> Product </th>
							<th colspan="3"> Qty </th>
							<th> Price </th>
							<th> Total </th>
						</tr>
					</thead>
		<tbody id="shoppingcart">
        
        </tbody>
        <!-- <tfoot id="shoppingcart_tfoot">
        	<tr>
        		<td colspan="8">
        			<h3 class="text-right">Total : <span class="cartTotal"></span> </h3>
        		</td>
        	</tr>
        </tfoot> -->
		</table>
		</div>
	</div>
	
	
		<!-- No Shopping Cart Div -->
		<!-- <div class="row mt-5 noneshoppingcart_div text-center">
			
			<div class="col-12">
				<h5 class="text-center"> There are no items in this cart </h5>
			</div>

			<div class="col-12 mt-5 ">
				<a href="index.php" class="btn btn-secondary mainfullbtncolor px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>

		</div> -->
		

	</div>
	<script type="text/javascript" src="frontend/js/jquery.min.js"></script>
 	<script type="text/javascript" src="frontend/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
	 <script type="text/javascript" src="frontend/js/custom.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			count();
			getData();

			function count(){


			var shop_str=localStorage.getItem("onlineshop");
			if (shop_str){
			var shop_arr=JSON.parse(shop_str);
			var count=0;
			var total=0;
			$.each(shop_arr,function(i,v){
						var unitprice = v.price;
						var discount = v.discount;
						var qty = v.qty;
						if (discount) {
							var price = discount;
						}else{
							var price = unitprice;
						}
						var amount=v.qty*v.price;

						count += qty ++;
						total += amount ++;})
	
					$('.count').html(count);
					$('.cartTotal').html(total+'Ks');
				}
				else{
					$('.count').html(0);
					$('.cartTotal').html(0+'Ks');
				}
}

			function getData(){
				var shop_str=localStorage.getItem('onlineshop');
				if (shop_str) {
					var shop_arr=JSON.parse(shop_str);
					var html='';
					var j=1;
					var total=0;
					$.each(shop_arr,function(i,v){
						var unitprice = v.price;
						var discount = v.discount;
						if (discount) {
							var price = discount;
						}else{
							var price = unitprice;
						}
						var amount=v.qty*v.price;

						
						html+=`<tr>
						<td>
						<button class="btn btn-outline-danger remove btn-sm " data-key="${i}" style="border-radius: 50%"> 
							<i class="icofont-close-line"></i> 
						</button>
						</td>`

						html+=`<td>${j++}</td>
						<td><img src="${v.photo}" class="cartImg" width="70" ></td>
						<td>${v.name}</td>
						
						<td><button class="min  btn btn-outline-danger" data-key="${i}"> - </button></td>
						<td>${v.qty}</td>
						<td><button class="max  btn btn-outline-danger" data-key="${i}"> + </button>
						</td>`;
						if (discount > 0) {
						html+=`<td><p class="item-price">
		                        	
		                        	<strike>${unitprice}Ks</strike> 
		                        	<span class="d-block"> ${discount}Ks</span>
		                        	
		                       </p></td>`;}
		                       else{
		                       	html+=`<td><p class="item-price">
		                        	
		                        	${unitprice}Ks
		                        	
		                        	
		                       </p></td>`;
		                       }
						html+=`<td>${amount}</td>
						</tr>`;
						total+=amount;
					});
					html+=`<tr>
					<td colspan="6"></td>
					<td >Total</td>
					<td>${total} Ks</td></tr>`
					$('#shoppingcart').html(html);
				};
			};

			$('tbody').on('click','.min',function(){
				var key=$(this).data('key');
				var shop_str=localStorage.getItem('onlineshop');
				if (shop_str){
					var shop_arr=JSON.parse(shop_str);

					$.each(shop_arr,function(i,v){
						if (key==i){
							v.qty--;
							if (v.qty==0){
								shop_arr.splice(key,1);
							}
						}
					})

					var shopData=JSON.stringify(shop_arr);
					localStorage.setItem('onlineshop', shopData);
						getData();
						count();
				}
			})
		
			$('tbody').on('click','.max',function(){
				var key=$(this).data('key');
				var shop_str=localStorage.getItem('onlineshop');
				if (shop_str){
					var shop_arr=JSON.parse(shop_str);
					$.each(shop_arr,function(i,v){
						if (key==i){
							v.qty++;
						}
						var shopData=JSON.stringify(shop_arr);
						localStorage.setItem('onlineshop', shopData);
						getData();
						count();
					})
				}
			})


			$('tbody').on('click','.remove',function(){
				var key=$(this).data('key');
				var shop_str=localStorage.getItem('onlineshop');
				if (shop_str){
					var shop_arr=JSON.parse(shop_str);

					$.each(shop_arr,function(i,v){
						if (key==i){
							
							
								shop_arr.splice(key,1);
							}
						}
					)

					var shopData=JSON.stringify(shop_arr);
					localStorage.setItem('onlineshop', shopData);
						getData();
						count();
				}
			})


			
		});
	</script>


<?php
	require 'frontendfooter.php';
?>