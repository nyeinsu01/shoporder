<?php

	require 'backendheader.php'; 
    
?>
	 <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Item Form </h1>
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
                            <form action="item_store.php" method="POST" enctype="multipart/form-data">
                                

                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Code No. </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name1">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                      <input type="file" id="photo_id" name="photo">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name2">
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
                                        <input type="text" class="form-control mt-3" name="name3">
                                    </div>
                                    <div class="tab-pane fade" id="discount-tab">
                                        <input type="text" class="form-control mt-3" name="name4">
                                    </div>
                                </div>
                            </div>
                        </div>
                                

                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                      <textarea name="address" rows="3" cols="30" class="form-control"></textarea>
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
                                <select class="form-control" name="subcategory_id" id="choose_file">
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
                                            Save
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