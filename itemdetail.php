<?php 

include('backend_header.php');
include('dbconnect.php');
$id=($_GET['id']);



$query="SELECT i.*,br.name as brandname,sc.name as scname
FROM items i,brands br,subcategories sc
WHERE i.brand_id=br.id
And i.subcategory_id=sc.id
AND i.id=$id


";
$stmt=$conn->prepare($query);
$stmt->execute();
$items=$stmt->fetch(PDO::FETCH_OBJ);
$oprice=($items->price);
(int)$dprice=($items->discount);
$newprice=$oprice-$dprice;
?>
<style>
    
    .gallery-wrap .img-big-wrap img {
    height: 550px;
    width: 500px;
    display: inline-block;
    cursor: zoom-in;
}


.gallery-wrap .img-small-wrap .item-gallery {
    width: 60px;
    height: 60px;
    border: 1px solid #ddd;
    margin: 7px 2px;
    display: inline-block;
    overflow: hidden;
}

.gallery-wrap .img-small-wrap {
    text-align: center;
}
.gallery-wrap .img-small-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 4px;
    cursor: zoom-in;
}
</style>
<main class="app-content">
    <!-- Page Content -->
     <div class="app-title">
        <div>

        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <a href="item-list.php" class="btn btn-outline-primary">
            <i class="icofont-double-left"></i>
        </a>
    </ul>
</div>
<div class="container">
   






    <div class="container">
    

    
<div class="card">
    <div class="row">
        <aside class="col-sm-5 border-right">
<article class="gallery-wrap"> 
<div class="img-big-wrap">
  <div> <a href="#"><img src="<?php echo"$items->photo" ?>"></a></div>
</div> <!-- slider-product.// -->
<!-- slider-nav.// -->
</article> <!-- gallery-wrap .end// -->
        </aside>
        <aside class="col-sm-7">
<article class="card-body p-5">
    <h3 class="title mb-3"> <?php 
    echo "$items->name";
    ?></h3>

<p class="price-detail-wrap"> 
    <span class="price h3 text-warning"> 
       Price <span class="num"> <?php echo "$newprice"; ?>  </span><span class="currency">MMK</span> <br>
       <?php if ($dprice>0): ?>
          <strike>  <?php echo "$items->price"; ?>  </span><span class="currency">MMK</span><span class="num">
    </span>   </strike>
       <?php endif ?>
    
  
</p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Description</dt>
  <dd><p><?php echo "$items->description"; ?> </p></dd>
</dl>
<dl class="param param-feature">
  <dt>Brand</dt>
  <dd><?php echo "$items->brandname"; ?></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Code No</dt>
  <dd><?php echo "$items->codeno"; ?></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Sub Category</dt>
  <dd><?php echo "$items->scname"; ?> </dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Discount</dt>
  <dd><?php echo "$items->discount"; ?>  MMK </dd>
</dl>
<hr>
    <!-- <div class="row">
        <div class="col-sm-5">
            <dl class="param param-inline">
              <dt>Quantity: </dt>
              <dd>
                <select class="form-control form-control-sm" style="width:70px;">
                    <option> 1 </option>
                    <option> 2 </option>
                    <option> 3 </option>
                </select>
              </dd>
            </dl>  <!-- item-property .// -->
        <!-- </div>
        <div class="col-sm-7">
            <dl class="param param-inline">
                  <dt>Size: </dt>
                  <dd>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <span class="form-check-label">SM</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <span class="form-check-label">MD</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <span class="form-check-label">XXL</span>
                    </label>
                  </dd>
            </dl>  <!-- item-property .// -->
    <!--     </div> 
    </div>  -->
    <!-- <hr>
    <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
    <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
</article> 
        </aside>  -->
    <!-- </div>  --><!-- row.// --> 

</div> <!-- card.// -->


</div>
<!--container.//-->




</main>       
<?php 
include('backend_footer.php');
?>