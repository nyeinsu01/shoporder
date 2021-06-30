<?php

	if (isset($_REQUEST['id'])) {
            
            $ID=$_REQUEST['id'];
            
            require 'connection.php';
            require 'backendheader.php';
            
            $query="SELECT * from items where id=:ID ";
            
             $statement = $pdo->prepare($query);
             
            
            $result=$statement->execute([
            ':ID'=> $ID
            ]);
            $items=$statement->fetch(PDO::FETCH_ASSOC);

            $item_name=$items['item_name'];
            $edit_brand_id=$items['brand_id'];
            $edit_subcategory_id=$items['subcategory_id'];
            $ID=$items['id'];

        }
    
?>




	 <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Item Edit Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="item.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
     </div>
     <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="item_update.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $ID?>">
                                <input type="hidden" name="oldlogo1" value="<?=$items['photo'] ?>">
                                

                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Code No. </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name1" value="<?=$items['codeno']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                      <input type="file" id="photo_id" name="photo">
                                      <img src="<?=$items['photo']?>" alt="logo" class="w-25">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name2"  value="<?=$items['item_name']?>">
                                    </div>
                                </div>

                               
                                

                        <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label"> Price </label>
                            <div class="bs-component col-sm-10">
                                <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#price-tab">Unit Price</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#discount-tab">Discount</a></li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="price-tab">
                                        <input type="text" class="form-control mt-3" name="name3" value="<?= $items['price'] ?>">
                                    </div>
                                    <div class="tab-pane fade" id="discount-tab">
                                        <input type="text" class="form-control mt-3" name="name4" value="<?= $items['discount'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name3"  value="<?=$items['price']?>">

                                    </div>

                                </div>

                                 <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name4"  value="<?=$items['discount']?>">

                                    </div>
                                    
                                </div>

                                

                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                      <textarea name="address" rows="3" cols="30" class="form-control" ><?=$items['description']?></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                <label for="choose_file" class="col-sm-2 col-form-label" >Choose Brand</label>
                                <div class="col-sm-10">
                                <select id="choose_brand" name="brand_id" class="form-control">
                                <optgroup label="Choose Brand">
                                <?php
                                require 'brand_list.php';
                                ?> </optgroup>
                                </select>
                            </div>
                            </div>


                                <div class="form-group row">
                                <label for="choose_file" class="col-sm-2 col-form-label" >Choose Subcategory</label>
                                <div class="col-sm-10">
                                <select class=" form-control" name="subcategory_id" id="choose_file">
                                <optgroup label="Choose Subcategory">
                                <?php
                                require 'subcategory_list.php';
                                ?> </optgroup>
                                
                                </select>
                            </div>
                            </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                           Update
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
     </div>

<?php

	require 'backendfooter.php'; 
?>