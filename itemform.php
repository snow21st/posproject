<?php 
include('backend_header.php');
include('dbconnect.php');


$sql="SELECT * FROM subcategories ";
$stmt=$conn->prepare($sql);
$stmt->execute();

$categories=$stmt->fetchAll();


$sql1="SELECT * FROM brands ";
$stmt=$conn->prepare($sql1);
$stmt->execute();

$brands=$stmt->fetchAll();
?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1> <i class="icofont-list"></i> Add Item Form </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <a href="item_list.php" class="btn btn-outline-primary">
        <i class="icofont-double-left"></i>
      </a>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form action="additem.php" method="post" enctype="multipart/form-data">
           <input type="hidden" name="codeno" value="<?php echo time() ?>"  />
           
           <div class="form-group row">
            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name_id" name="name" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
            <div class="col-sm-10">
              <input type="file" id="photo_id" name="photo">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
             <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Unit Price</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Discount</a>
              </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
               <input type="number" class="form-control" id="name_id" name="price" value="">
             </div>
             <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col 12">
               <input type="number" class="form-control" id="name_id" name="discount" >
               
             </div>
           </div>

         </div>
       </div>
     </div>
     
     <div class="form-group row">
      <label for="name_id" class="col-sm-2 col-form-label"> Description </label>
      <div class="col-sm-10">
       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
     </div>
   </div>

   
   
   <div class="form-group row">
    <label for="photo_id" class="col-sm-2 col-form-label"> Brand </label>
    <div class="col-sm-10">
     <select class="browser-default custom-select custom-select-lg mb-3" name="brandid">
      
      <?php 
      foreach ($brands as $brand) {
        $id=$brand['id'];
        $name=$brand['name'];
        
        ?>
        <option value=" <?=$id; ?> ">
          <?=$name; ?>
        </option>
      <?php } ?>
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="photo_id" class="col-sm-2 col-form-label"> Sub-Category </label>
  <div class="col-sm-10">
   <select class="browser-default custom-select custom-select-lg mb-3" name="subid">
    
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