<?php 
include('backend_header.php');
include('dbconnect.php');

$query="SELECT i.*,br.name as brandname
FROM items i,brands br
WHERE i.brand_id=br.id;

";
$stmt=$conn->prepare($query);
$stmt->execute();
$items=$stmt->fetchall(PDO::FETCH_ASSOC);
$i=1;



?>




<!--main content-->

<main class="app-content">
  <div class="app-title">
    <div>
      <h1> <i class="icofont-list"></i> Items List</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <a href="itemform.php" class="btn btn-outline-primary">
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
                  <th> Name</th>
                  <th>Brand</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($items as $item):  // foreach with end foreach  end with ":";
                $discount=0;
                $id=$item['id'];
                $bname=$item['brandname'];
                $iname=$item['name'];
                $price=$item['price'];
                $discount=$item['discount'];
                $photo=$item['photo'];
                $code=$item['codeno'];
                $newprice=(int)$price-(int)$discount;
                
                
                ?>
                <tr>
                  <td> <?=$i;?> </td>
                  <td> 
                   <img src="<?=$photo?>" style="width: 50px;height: 50px" alt="">
                   <?=$code?> ||
                   <?=$iname?> 

                   
                 </td>
                 <td> 
                   
                  <?=$bname?></td>
                  <?php 
                  if($discount>0):?>
                    <td> 
                      <?=$newprice?>MMK 
                      <br>
                      <strike> <?=$price?>MMK 
                      </strike> 
                    </td>
                    <?php else: ?> 
                     <td> 
                       
                      <?=$price?>MMK 
                      
                    </td>       
                    <?php  
                  endif;?>

                  
                  


                  <td>
                    
                    <a href="itemdetail.php?id=<?=$id?>" class="btn btn-outline-info">
                      <i class="icofont-info"></i>
                    </a>
                    <a href="item_edit.php?id=<?=$id?>" class="btn btn-outline-warning">
                      <i class="icofont-pencil-alt-2"></i>
                    </a>

                    <a href="item_delete.php?id=<?=$id?>" class="btn btn-outline-danger">
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