<?php 
include('backend_header.php');
include('dbconnect.php');

$query="SELECT c.name as category_name,
        sc.name as subcategory_name,
       
        sc.*
        FROM subcategories sc
        JOIN categories c
        ON sc.category_id=c.id
        
         ";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $subcategories=$stmt->fetchall(PDO::FETCH_ASSOC);
$i=1;



?>




<!--main content-->

 <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Sub Category List</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategoryform.php" class="btn btn-outline-primary">
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
                                          <th>Subcategory Name</th>
                                          <th>Category Name</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                <?php foreach ($subcategories as $subcategory):  // foreach with end foreach  end with ":";

                  $id=$subcategory['id'];
                  $scname=$subcategory['subcategory_name'];
                  $cname=$subcategory['category_name'];
                  
              ?>
                <tr>
                  <td> <?=$i;?> </td>
                  <td> 
                   
                  <?=$scname?></td>
                   <td> 
                   
                  <?=$cname?></td>
                  <td>
                    <a href="subcategory_edit.php?id=<?=$id?>" class="btn btn-warning">
                    <i class="icofont-pencil-alt-2"></i>
                    </a>

                    <a href="subcategory_delete.php?id=<?=$id?>" class="btn btn-outline-danger">
                      <i class="icofont-close"></i>
                    </a>
                  </td>

                </tr>
                   <?php 
                    $i++;
                 endforeach; ?>
              </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


<!-- Essential javascripts for application to work-->
<?php 
include('backend_footer.php');
?>