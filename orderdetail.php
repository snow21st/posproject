 <?php 
include('backend_header.php');
include('dbconnect.php');
$vno=$_GET['voucher'];
	
$query="SELECT orderdetails.*,items.name as iname,items.description as des,
items.price as oprice,items.discount as discount
FROM orderdetails
LEFT JOIN items
ON items.id=orderdetails.item_id
WHERE orderdetails.voucherno=$vno
";


 
$stmt=$conn->prepare($query);
$stmt->execute();
$orders=$stmt->fetchall(PDO::FETCH_OBJ);

$i=1;



$voucherdate=date('Y-m-d');
?>
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
          <p>A Printable Invoice Format</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <a class="app-header__logo" href="index.html">
                <img src="logo/logo_wh_transparent.png" style="width: 50px; height: 50px">
                Shopules
            </a>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: <?=$voucherdate?></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>Vali Inc.</strong><br>518 Akshar Avenue<br>Gandhi Marg<br>New Delhi<br>Email: hello@vali.com</address>
                </div>
                <div class="col-4">To
                  <address><strong>John Doe</strong><br>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107<br>Phone: (555) 539-1037<br>Email: john.doe@example.com</address>
                </div>
                <div class="col-4"><b>Invoice #007612</b><br><br><b>Order ID:</b> 4F3S8J<br><b>Payment Due:</b> 2/22/2014<br><b>Account:</b> 968-34567</div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
						<th>Qty</th>
						<th>Item Name</th>
						<th>Voucher No</th>
						<th>Description</th>
						<th>Subtotal</th>
                    </thead>
                    <tbody>
                     	
                    	<?php foreach ($orders as $order):  // foreach with end foreach  end with ":";
                    	$qty=$order->qty;
                    	$name=$order->iname;
                    	$voucherno=$order->voucherno;
                    	$description=$order->des;
                    	$oprice=$order->oprice;
                    	
                    	$discount=$order->discount;
              			 $newprice = $oprice-$discount;
              			
						$subtotal=$newprice*$qty;
                
                
               				 ?>
                    	
                      <tr>
                        <td><?=$qty?></td>
                        <td><?=$name?></td>
                        <td><?=$voucherno?></td>
                        <td><?=$description?></td>
                        <td><?=$subtotal?></td>
                      </tr>
                     <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>


<?php 
include('backend_footer.php');
?>