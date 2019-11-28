<?php include('includes/header.php') ?>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if( isset($_POST['search']) ){

    $TreatmentName=test_input($_POST['treatmentname']);
//    echo $TreatmentName;
    $sql = "SELECT * FROM treatment where tname = '$TreatmentName' " ;
//    echo $sql;
    $Treatment= $db->query($sql);

} else{

    $sql = "SELECT * FROM treatment";
    $Treatment= $db->query($sql);
//    echo $sql;
}



if( isset($_POST['submit'])){

    $id = test_input($_POST['ID']);
    $TreatmentName= test_input( $_POST['TreatmentName']);
    $Type= test_input ( $_POST['Type']);
    $Deid= test_input ( $_POST['DiseaseID']);

    $sql= "INSERT INTO treatment VALUES ($id,'$TreatmentName' ,'$Type' ,'$Deid' ) ";

    if($db->query($sql)== TRUE){
//
//        echo $id;
//        echo $TreatmentName;
//        echo $Type;
//        echo $Deid;
        echo "<script>alert('Data Added Successfully')</script>";
//        echo "Data Added Successfully";

    } else{
//        echo $id;
//        echo $TreatmentName;
//        echo $Type;
//        echo $Deid;
        echo "<script>alert('Data Added Failed!! Try again\";')</script>";
//        echo "Fail to inser data

    }

}


?>






    <div class="d-flex align-items-stretch">
      <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="index.php" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="physician.php" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Charts</span></a></li>
              <li class="sidebar-list-item"><a href="treatment.php" class="sidebar-link text-muted active"><i class="o-table-content-1 mr-3 text-gray"></i><span>Tables</span></a></li>
              <li class="sidebar-list-item"><a href="forms.html" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Forms</span></a></li>
              <li class="sidebar-list-item"><a href="login.html" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Login</span></a></li>
        </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="nav-item" style="padding-left: 20px">
                <form id="searchForm" action="treatment.php" method="post" class="ml-auto d-none d-lg-block">
                    <div class="form-group position-relative mb-0" >
                        <button type="submit" name ="search"  value="search"  style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
                        <input type="text" placeholder="Search ..."  name="treatmentname"  class="form-control form-control-sm border-0 no-shadow pl-4">
                    </div>
                </form>
            </li>
            </ul>
      </div>
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Treatment Table</h6>
                  </div>

                  <div class="card-body">                          
                    <table class="table table-striped table-sm card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Treatment Name</th>
                          <th>Type</th>
                          <th>Disease ID</th>
                            <th >Update</th>
                            <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        if ($Treatment->num_rows > 0) {
                            while($treat = $Treatment->fetch_assoc()) {
//
//                            echo $treat['tid'];
//                            echo $treat['tname'];
//                            echo $treat['ttype'];
//                            echo $treat['deid'];
                        ?>
                        <tr>
                          <th scope="row"><?php echo $treat['tid']?></th>
                          <td><?php echo $treat['tname']?></td>
                          <td><?php echo $treat['ttype']?></td>
                          <td><?php echo $treat['deid']?></td>
                          <td>

                              <!-- update area -->
                              <form method="get" action ="treatupdate.php" id="edit<?php echo $treat['tid']?>" style="display:none; " >
                                  <input value="<?php echo $treat['tid']?>" name = 'uid' />
                              </form>

                              <button  onclick="document.getElementById('edit<?php echo $treat['tid']?>').submit();"
                                       class="btn btn-success btn-sm btn-raised" >
                                  <i class="fas fa-edit" aria-hidden="true">

                                  </i>
                              </button>
                            </td>


                              <!-- Delete Area -->
                            <td>

                              <form method="post" action ="treatdelete.php" id="delete<?php echo $treat['tid']?>" style="display:none; " >
                                  <input value="<?php echo $treat['tid']?>" name = 'uid' />

                              </form>

                              <button   onclick="document.getElementById('delete<?php echo $treat['tid']?>').submit();"
                                        class="btn btn-danger btn-sm btn-raised" >
                                  <i class="fas fa-trash" aria-hidden="true">

                                  </i>
                              </button>
                          </td>
                        </tr>

                            <?php }} ?>

                      </tbody>
                    </table>




                  </div>
                </div>


                  <div class="card">
                      <div class="card-header">
                          <h3 class="h6 text-uppercase mb-0">Insert Data</h3>
                      </div>
                      <div class="card-body">
                          <form class="form-inline" action="" method="post">
                              <div class="form-group">
                                  <input id="inlineFormInput" name="ID" type="text" value="<?php echo $id ?>" placeholder="ID" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <input id="inlineFormInputGroup" name="TreatmentName" type="text" value="<?php    echo $TreatmentName ?>" placeholder="Treatment Name" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <input id="inlineFormInputGroup" name="Type" type="text" value="<?php    echo $Type ?>" placeholder="Type" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <input id="inlineFormInputGroup" name="DiseaseID" type="text" value="<?php    echo $Deid ?>" placeholder="Disease ID" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <button type="submit" name="submit" class="btn btn-primary">Add</button>
                              </div>
                          </form>
                      </div>
                  </div>

              </div>
            </div>
          </section>
        </div>
<?php include('includes/footer.php') ?>