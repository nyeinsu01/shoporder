<?php
    require 'backendheader.php';
    require 'connection.php';
    $query="SELECT i.ID,i.item_name,i.codeno,i.photo,i.price,i.discount,i.description,b.Name from items i JOIN brands b ON b.ID=i.brand_id";
    $sql="SELECT i.ID,i.item_name,i.codeno,i.photo,i.price,i.discount,i.description,s.Subcategory_name from items i JOIN subcategories s ON s.ID=i.subcategory_id";
    $result=$pdo->query($query,$sql);
    $brands=$result->fetchAll(PDO::FETCH_ASSOC);
    
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
                                        $ID = $item['ID'];
                                        $item_name = $item['item_name'];
                                        $brand = $item['Name'];
                                        $subcategory = $item['Subcategory_name'];
                                        
                                        
                                        ?>
                                        <tr>
                                            <td> <?= $i++ ?> . </td>
                                            <td>
                                                <div class="d-flex no-block align-items-center">
                                                    <?php if ($photo) {
                                                     ?>
                                                    <div class="mr-3">
                                                        <img src="<?= $photo; ?>" alt="user" class="rounded-circle" width="45" height="55" />
                                                    </div>
                                                <?php } ?>
                                                <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                 <?=  $Name; ?></h5> </div></div>
                                            </td>
                                            
                                            <td>
                                                <a href="" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <a href="" class="btn btn-outline-danger">
                                                    <i class="icofont-close"></i>
                                                </a>
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
