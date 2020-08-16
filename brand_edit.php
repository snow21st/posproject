<?php 
include('backend_header.php');
include('dbconnect.php');

$id=($_GET['id']);

$query="SELECT * FROM brands 
       WHERE id=:id";
 $stmt=$conn->prepare($query);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $brand=$stmt->fetch(PDO::FETCH_OBJ);
 ?>

<main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Edit Brand Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="brand_list.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="brand_update.php" method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="id" value=" <?=$brand->id ?> ">
                                <input type="hidden" name="oldphoto" value=" <?=$brand->logo ?> ">
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?php echo $brand->name ?> ">
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
   			<img src="<?php echo $brand->logo ?>" alt="" style="height: 150px;width: 200px">
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