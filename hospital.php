<?php include('includes/header.php') ?>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if( isset($_POST['search']) ){

    $HospitalName=test_input($_POST['hospitalname']);
//    echo $HospitalName;
    $sql = "SELECT * FROM hospital where hname = '$HospitalName' " ;
//    echo $sql;
    $Hospital= $db->query($sql);

} else{

    $sql = "SELECT * FROM hospital";
    $Hospital= $db->query($sql);
//    echo $sql;
}



if( isset($_POST['submit'])){

    $id = test_input($_POST['ID']);
    $HospitalName= test_input( $_POST['HospitalName']);
    $HospitalAddress= test_input ( $_POST['HospitalAddress']);
    $HCity= test_input ( $_POST['HospitalCity']);
    $HState = test_input ( $_POST['HospitalState']);
    $HZip = test_input ( $_POST['ZipCode']);
    

    $sql= "INSERT INTO hospital VALUES ($id,'$HospitalName' ,'$HospitalAddress' ,'$HCity' ,'$HState','$HZip') ";

    if($db->query($sql)== TRUE){
//
//        echo $id;
//        echo $HospitalName;
//        echo $HospitalAddress;
//        echo $HCity;
        //echo "<script>alert('Data Added Successfully')</script>";
        //header("hospital.php");
        //$this->redirect("treatupdate.php" ));
//        echo "Data Added Successfully";

    } else{
//        echo $id;
//        echo $HospitalName;
//        echo $HospitalAddress;
//        echo $HCity;
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
              <li class="sidebar-list-item"><a href="charts.html" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Charts</span></a></li>
              <li class="sidebar-list-item"><a href="treatment.php" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Treatment</span></a></li>
              <li class="sidebar-list-item"><a href="hospital.php" class="sidebar-link text-muted active"><i class="o-survey-1 mr-3 text-gray"></i><span>Hospital</span></a></li>
              <li class="sidebar-list-item"><a href="login.html" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Login</span></a></li>
        </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="nav-item" style="padding-left: 20px">
                <form id="searchForm" action="hospital.php" method="post" class="ml-auto d-none d-lg-block">
                    <div class="form-group position-relative mb-0" >
                        <button type="submit" name ="search"  value="search"  style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
                        <input type="text" placeholder="Search ..."  name="hospitalname"  class="form-control form-control-sm border-0 no-shadow pl-4">
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
                    <h6 class="text-uppercase mb-0">Hospital Table</h6>
                  </div>

                  <div class="card-body">                          
                    <table class="table table-striped table-sm card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Hospital Name</th>
                          <th>HospitalAddress</th>
                          <th>Hospital City</th>
                          <th>Hospital State</th>                       
                          <th>Zip Code</th>


                            <th >Update</th>
                            <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        if ($Hospital->num_rows > 0) {
                            while($treat = $Hospital->fetch_assoc()) {
//
//                            echo $treat['tid'];
//                            echo $treat['tname'];
//                            echo $treat['ttype'];
//                            echo $treat['deid'];
                        ?>
                        <tr>
                          <th scope="row"><?php echo $treat['hid']?></th>
                          <td><?php echo $treat['hname']?></td>
                          <td><?php echo $treat['hst_address']?></td>
                          <td><?php echo $treat['hst_city']?></td>
                          <td><?php echo $treat['hstate']?></td>
                          <td><?php echo $treat['hzip']?></td>


                          <td>

                              <!-- update area !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!--> 
                              <form method="get" action ="treatupdate.php" method="post" id="edit<?php echo $treat['hid']?>" style="display:none; " >
                                  <input value="<?php echo $treat['hid']?>" name = 'uid' />
                              </form>

                              <button  onclick="document.getElementById('edit<?php echo $treat['hid']?>').submit();"
                                       class="btn btn-success btn-sm btn-raised" >
                                  <i class="fas fa-edit" aria-hidden="true">

                                  </i>
                              </button>
                            </td>


                              <!-- Delete Area -->
                            <td>

                              <form method="post" action ="hospitaldelete.php" id="delete<?php echo $treat['hid']?>" style="display:none; " >
                                  <input value="<?php echo $treat['hid']?>" name = 'uid' />

                              </form>

                              <button   onclick="document.getElementById('delete<?php echo $treat['hid']?>').submit();"
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
                          <form class="form-inline" action="hospital.php" method="post">
                              <div class="form-group">
                                  <input id="inlineFormInput" name="ID" type="text" value="<?php echo $id ?>" placeholder="ID" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <input id="inlineFormInputGroup" name="HospitalName" type="text" value="<?php    echo $HospitalName ?>" placeholder="Hospital Name" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <input id="inlineFormInputGroup" name="HospitalAddress" type="text" value="<?php    echo $HospitalAddress ?>" placeholder="HospitalAddress" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <input id="inlineFormInputGroup" name="HospitalCity" type="text" value="<?php    echo $HCity ?>" placeholder="Hospital City" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <input id="inlineFormInputGroup" name="HospitalState" type="text" value="<?php    echo $HState ?>" placeholder="Hospital State" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <input id="inlineFormInputGroup" name="ZipCode" type="text" value="<?php    echo $HZip ?>" placeholder="ZipCode" class="mr-3 form-control">
                              </div>
                              <div class="form-group">
                                  <!-- <button type="submit" name="submit" class="btn btn-primary">Add</button> -->
                                  <button type="submit" name="search" value = "seach" class="btn btn-primary">Add</button>

                              </div>
                          </form>
                      </div>
                  </div>

              </div>
            </div>
          </section>
        </div>
<?php include('includes/footer.php') ?>