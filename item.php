<?php
    require 'backendheader.php';
    require 'connection.php';
    $query="SELECT i.id,i.codeno,i.item_name,i.photo,i.price,i.discount,i.description,b.Name,s.ID from items i JOIN subcategories s ON s.ID=i.subcategory_id JOIN brands b ON b.ID=i.brand_id ";
    $result=$pdo->query($query);
    $items=$result->fetchAll(PDO::FETCH_ASSOC);

?>

            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Item</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="item_form.php" class="btn btn-outline-primary">
                        <i class="icofont-plus"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Brand</th>
                                          <th>Price</th>
                                          <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $i=1;
                                        foreach ($items as $item) {
                                        $id = $item['id'];
                                        $codeno = $item['codeno'];
                                        $photo = $item['photo'];
                                        $item_name = $item['item_name'];
                                        $brand = $item['Name'];
                                        $discount = $item['discount'];
                                        $price = $item['price'];
                                        
                                        
                                        ?>
                                        <tr>
                                            <td> <?= $i++ ?> . </td>
                                            <td>
                                                <div class="d-flex no-block align-items-center">
                                                    <?php if ($photo) {
                                                     ?>
                                                    <div class="mr-3">
                                                        <img src="<?= $photo; ?>" alt="user" class="rounded-circle" width="65" height="70" />
                                                    </div>
                                                <?php } ?>
                                                <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                 <?=  $codeno; ?>
                                                     
                                                 </h5>
                                                 <span class="text-muted"><?= $item_name ?></span>
                                                </div>
                                                </div>

                                            </td>
                                            <td>
                                            
                                               <div class="d-flex no-block align-items-center">
                                                <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                 <?=  $brand; ?></h5> </div></div>

                                            </td>

                                            <td>
                                            
                                                <div class="d-flex no-block align-items-center">
                                                <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                <p class="item-price">
                                                <?php
                                                if ($discount) {
                                        
                                    
                                                ?>
                                                <strike><?= $price ?>Ks</strike> 
                                                <span class="d-block"> <?= $discount ?>Ks</span>

                                                <?php }
                                                else{ 
                                                ?>
                                                <span class="d-block"><?= $price ?>Ks</span>   
                                                <?php } ?>
                                                </p>
                                                </h5> </div>
                                                </div>

                                            </td>
                                            
                                            <td>
                                                <a href="item_edit.php?id=<?= $id ?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete!')" action="item_delete.php" method="POST">
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                <button class="btn btn-outline-danger">
                                                        <i class="icofont-close"></i>
                                                </button>
                                            </form>
                                            </td>

                                        </tr>
                                         <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<?php
    require 'backendfooter.php';
?>
