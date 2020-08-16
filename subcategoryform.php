<?php 
include('backend_header.php');
include('dbconnect.php');
$sql="SELECT * FROM categories ";
$stmt=$conn->prepare($sql);
$stmt->execute();

$categories=$stmt->fetchAll();



?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Sub Category Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="Subcategory_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="subcategoryadd.php" method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_id" name="name">
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Category </label>
                        <div class="col-sm-10">
                         <select class="browser-default custom-select custom-select-lg mb-3" name="categoryid">
                            
                          <?php 
                            foreach ($categories as $category) {
                              $id=$category['id'];
                              $name=$category['name'];
                            
                           ?>
                            <option value=" <?=$id; ?> ">
                              <?=$name; ?>
                            </option>
                          <?php } ?>
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
</main>



<?php 
include('backend_footer.php');
?>