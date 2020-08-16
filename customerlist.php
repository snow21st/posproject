 <?php 
include('backend_header.php');
include('dbconnect.php');
$query="SELECT * FROM users";
$stmt=$conn->prepare($query);
$stmt->execute();
$users=$stmt->fetchall(PDO::FETCH_OBJ);
$i=1;
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1> <i class="icofont-list"></i> User List</h1>
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
                  <th> User No</th>
                  <th>User Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user):  // foreach with end foreach  end with ":";
                $id=$user->id;
                $name=$user->name;
             
                $status="";

                if($user->status==0)
                {
                    $status="Inactive";
                }
               
                else{
                    $status="Active";
                }

                
                ?>
                <tr>
                  <td> <?=$i;?> </td>
                  <td> <?=$id?> </td>

                   
                 
                 <td> <?=$name?></td>
                 
                  <td> <?=$status?></td>
                  
                  
                  


                  <td>
                   
                   <!--  <a href="orderdetail.php?id=<?=$id?>" class="btn btn-outline-info">
                      <i class="icofont-info"></i>
                    </a> -->
                   

                    <a href="useractive.php?id=<?=$id?>" class="btn btn-outline-success">
                      <i class="icofont-ui-check"></i>
                    </a>

                    <a href="userdelete.php?id=<?=$id?>" class="btn btn-outline-danger">
                      <i class="icofont-ui-close"></i>
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

<?php 
include('backend_footer.php');
?>