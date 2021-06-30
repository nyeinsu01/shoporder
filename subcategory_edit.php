<?php
        if (isset($_REQUEST['ID'])) {
            
            $ID=$_REQUEST['ID'];
            
            require 'connection.php';
            require 'backendheader.php';
            
            $query="SELECT * from subcategories where ID=:ID ";
            
            $statement=$pdo->prepare($query);
            
            $result=$statement->execute([
                ':ID' => $ID
            ]);
            
            $subcategories=$statement->fetch(PDO::FETCH_ASSOC);
          
            $Name=$subcategories['subcategory_name'];
            $edit_category_id=$subcategories['category_id'];
            $ID=$subcategories['ID'];


        }
    ?>


	 <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Subcategory Edit Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategory.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
     </div>

     <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="subcategory_update.php" method="POST" >
                                <input type="hidden" name="ID" value="<?= $ID?>">
                                <input type="hidden" name="oldname" value="<?=$category['subcategory_name'] ?>">
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?=$subcategories['subcategory_name']?>">
                                    </div>
                                </div>

                                

                                <div class="form-group row">
                                <label for="choose_file" class="col-sm-2 col-form-label" >Choose Category</label>
                                <div class="col-sm-10">
                                <select class=" form-control" id="choose_file" name="category_id">

                                <optgroup label="Choose Subcategory">
                                <?php
                                require 'category_list.php';
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