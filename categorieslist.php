<?php 
include('backend_header.php');
include('dbconnect.php');

$sql="SELECT * FROM categories ";
$stmt=$conn->prepare($sql);
$stmt->execute();

$categories=$stmt->fetchAll();
$i=1;



?>




<!--main content-->

<main class="app-content">
  <div class="app-title">
    <div>
      <h1> <i class="icofont-list"></i> Category </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <a href="category_new.php" class="btn btn-outline-primary">
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
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categories as $category):  // foreach with end foreach  end with ":";

                  $id=$category['id'];
                  $name=$category['name'];
                  $photo=$category['photo'];
              ?>
                <tr>
                  <td> <?=$i;?> </td>
                  <td> 
                    <img src=" <?=$photo ?> " alt=""class="img-fluid " style="width: 150px; height: 100px" >
                  <?=$name?></td>
                  <td>
                    <a href="category_edit.php?id=<?=$id?>" class="btn btn-warning">
                      <i class="icofont-ui-settings"></i>
                    </a>

                    <a href="category_delete.php?id=<?=$id?>" class="btn btn-outline-danger">
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