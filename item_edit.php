<?php 
include('backend_header.php');
include('dbconnect.php');

$id=($_GET['id']);

$query="SELECT * FROM items 
WHERE id=:id";
$stmt=$conn->prepare($query);
$stmt->bindParam(':id',$id);
$stmt->execute();
$items=$stmt->fetch(PDO::FETCH_OBJ);

$sql="SELECT * FROM subcategories ";
$stmt=$conn->prepare($sql);
$stmt->execute();

$subcategories=$stmt->fetchAll();


$sql1="SELECT * FROM brands ";
$stmt=$conn->prepare($sql1);
$stmt->execute();

$brands=$stmt->fetchAll();


?>




<main class="app-content">
  <div class="app-title">
    <div>
      <h1> <i class="icofont-list"></i> Edit Item Form </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <a href="item-list.php" class="btn btn-outline-primary">
        <i class="icofont-double-left"></i>
      </a>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form action="updateitem.php" method="post" enctype="multipart/form-data">
           
          <input type="hidden" name="id" value=" <?=$items->id ?> ">
                                <input type="hidden" name="oldphoto" value=" <?=$items->photo ?> ">
                                    <input type="hidden" name="codeno" value=" <?=$items->codeno ?> ">
           <div class="form-group row">
            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name_id" name="name" value="<?php echo $items->name ?> ">
            </div>
          </div>


                   <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Photo</label>
        <div class="col-sm-10">
         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Old Photo</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">New Photo</a>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <img src="<?php echo $items->photo ?>" alt="" style="height: 150px;width: 200px">
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col 12">
              <input type="file" class="form-control" name="photo">
        
            </div>
          </div>

        </div>
      </div>
    </div>


                   <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-price-tab" data-toggle="pill" href="#pills-price" role="tab" aria-controls="pills-home" aria-selected="true">Unit Price</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-discount-tab" data-toggle="pill" href="#pills-discount" role="tab" aria-controls="pills-profile" aria-selected="false">Discount</a>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-price" role="tabpanel" aria-labelledby="pills-price-tab">
          <input type="number" class="form-control" id="name_id" name="price" value="<?php echo"$items->price" ?>">
          </div>
          <div class="tab-pane fade" id="pills-discount" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col 12">
               <input type="text" class="form-control" id="name_id" name="discount" value="<?php echo"$items->discount" ?>">
        
            </div>
          </div>

        </div>
      </div>
    </div>

     <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo"$items->description" ?></textarea>
                                    </div>
                                </div>
             <div class="form-group row">
            <label for="photo_id" class="col-sm-2 col-form-label"> Brand </label>
            <div class="col-sm-10">
              <?php 
              $query="SELECT * FROM brands";
              $stmt=$conn->prepare($query);
              $stmt->execute();
              $brands=$stmt->fetchall(PDO::FETCH_ASSOC);
              ?>

              <select class="browser-default custom-select custom-select-lg mb-3" name="brandid">
                <?php foreach ($brands as $brand) {

                  ?>
                  <option  value="<?php echo $brand['id']; ?>"
                    <?php 
                    if ($items->brand_id==$brand['id']) {
                      echo "selected";
                    }

                    ?>
                    >
                    <?php echo $brand['name']; ?>
                  </option>

                <?php }  ?>
              </select>
            </div>


          </div>
          <div class="form-group row">
            <label for="photo_id" class="col-sm-2 col-form-label"> Sub-Categories </label>
            <div class="col-sm-10">
              <?php 
              $query="SELECT * FROM categories";
              $stmt=$conn->prepare($query);
              $stmt->execute();
              $categories=$stmt->fetchall(PDO::FETCH_ASSOC);
              ?>

              <select class="browser-default custom-select custom-select-lg mb-3" name="subid">
                <?php foreach ($subcategories as $subcategory) {

                  ?>
                  <option  value="<?php echo $subcategory['id']; ?>"
                    <?php 
                    if ($items->subcategory_id==$subcategory['id']) {
                      echo "selected";
                    }

                    ?>
                    >
                    <?php echo $subcategory['name']; ?>
                  </option>

                <?php }  ?>
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