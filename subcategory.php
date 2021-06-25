<?php
    require 'backendheader.php';
    require 'connection.php';
    $query="SELECT s.ID,s.subcategory_name,c.Name from subcategories s JOIN categories c ON c.ID=s.category_id";
    $result=$pdo->query($query);
    $subcategories=$result->fetchAll(PDO::FETCH_ASSOC);
    
?>

            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Subcategory </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategory_form.php" class="btn btn-outline-primary">
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
                                          <th>Category</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    


                                        <?php
                                         $i=1;
                                        foreach ($subcategories as $subcategory) {
                                        $ID = $subcategory['ID'];
                                        $Name=$subcategory['subcategory_name'];
                                        $category_name=$subcategory['Name'];

                                        
                                        ?>

                                        <tr>
                                            <td> <?= $i++ ?> . </td>
                                            <td>
                                            <div class="d-flex no-block align-items-center">
                                                <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                 <?=  $Name; ?></h5> </div></div>

                                            </td>
                                            <td>
                                            
                                                <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                 <?=  $category_name; ?></h5> </div>

                                            </td>
                                            <td>
                                                <a href="subcategory_edit.php?ID=<?= $ID ?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete!')" action="subcategory_delete.php" method="POST">

                                                    <input type="hidden" name="ID" value="<?= $ID ?>">
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
