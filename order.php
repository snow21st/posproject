 <?php 
include('backend_header.php');
include('dbconnect.php');
$query="SELECT * FROM orders";
$stmt=$conn->prepare($query);
$stmt->execute();
$orders=$stmt->fetchall(PDO::FETCH_OBJ);
$i=1;
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1> <i class="icofont-list"></i> Order List</h1>
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
                  <th> Date</th>
                  <th>Voucher No</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orders as $order):  // foreach with end foreach  end with ":";
                $id=$order->id;
                $date=$order->orderdate;
                $voucher=$order->voucherno;
                $total=$order->total;

                $status="";

                if($order->status==0)
                {
                    $status="Order";
                }
                else if($order->status==1){
                    $status="Order confirm";
                }
                else{
                    $status="Cancel Order";
                }

                
                ?>
                <tr>
                  <td> <?=$i;?> </td>
                  <td> <?=$date?> </td>

                   
                 
                 <td> <?=$voucher?></td>
                   
                  <td> <?=$total?> MMK</td>
                  <td> <?=$status?></td>
                  
                  
                  


                  <td>
                   
                    <a href="orderdetail.php?voucher=<?=$voucher?>" class="btn btn-outline-info">
                      <i class="icofont-info"></i>
                    </a>
                    <?php if ($order->status==0):
                       
                     ?>

                    <a href="orderconfirm.php?id=<?=$id?>" class="btn btn-outline-success">
                      <i class="icofont-ui-check"></i>
                    </a>

                    <a href="orderdelete.php?id=<?=$id?>" class="btn btn-outline-danger">
                      <i class="icofont-ui-close"></i>
                    </a>
                  </td>
                    <?php endif; ?>
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

<?php 
include('backend_footer.php');
?>