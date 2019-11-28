<?php include('includes/header.php') ?>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if( isset($_POST['search']) ){

    $PhysicianName=test_input($_POST['physician']);
//    echo $TreatmentName;
    $sql = "SELECT * FROM physician where phfnanme = '$PhysicianName' " ;
//    echo $sql;
    $Physician= $db->query($sql);

} else{

    $sql = "SELECT * FROM physician";
    $Physician= $db->query($sql);
//    echo $sql;
}



if( isset($_POST['submit'])){

    $id = test_input($_POST['ID']);
    $PhyName= test_input( $_POST['PhyName']);
    $Tel= test_input ( $_POST['Tel']);
    $Spe = test_input($_POST['Spe']);
    $HID= test_input ( $_POST['HID']);

    $sql= "INSERT INTO physician VALUES ($id,'$PhyName' ,'$Tel' ,'$Spe','$HID' ) ";

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
              <li class="sidebar-list-item"><a href="physician.php" class="sidebar-link text-muted active"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Charts</span></a></li>
              <li class="sidebar-list-item"><a href="treatment.php" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Tables</span></a></li>
              <li class="sidebar-list-item"><a href="forms.html" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Forms</span></a></li>
              <li class="sidebar-list-item"><a href="login.html" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Login</span></a></li>
        </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
          <ul class="sidebar-menu list-unstyled">
              <li class="nav-item" style="padding-left: 20px">
                  <form id="searchForm" action="treatment.php" method="post" class="ml-auto d-none d-lg-block">
                      <div class="form-group position-relative mb-0" >
                          <button type="submit" name ="search"  value="search"  style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
                          <input type="text" placeholder="Search ..."  name="physician"  class="form-control form-control-sm border-0 no-shadow pl-4">
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
                              <h6 class="text-uppercase mb-0">Physician Table</h6>
                          </div>

                          <div class="card-body">
                              <table class="table table-striped table-sm card-text">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Physician Name</th>
                                      <th>Telephone</th>
                                      <th>Speciality</th>
                                      <th>Hospital ID</th>
                                      <th >Update</th>
                                      <th>Delete</th>
                                  </tr>
                                  </thead>
                                  <tbody>

                                  <?php
                                  if ($Physician->num_rows > 0) {
                                      while($phy = $Physician->fetch_assoc()) {
//
//                            echo $treat['tid'];
//                            echo $treat['tname'];
//                            echo $treat['ttype'];
//                            echo $treat['deid'];
                                          ?>
                                          <tr>
                                              <th scope="row"><?php echo $phy['phid']?></th>
                                              <td><?php echo $phy['phfname']?></td>
                                              <td><?php echo $phy['phtel']?></td>
                                              <td><?php echo $phy['phspl']?></td>
                                              <td><?php echo $phy['hid']?></td>
                                              <td>

                                                  <!-- update area -->
                                                  <form method="get" action ="physicianupdate.php" id="edit<?php echo $phy['phid']?>" style="display:none; " >
                                                      <input value="<?php echo $phy['phid']?>" name = 'uid' />
                                                  </form>

                                                  <button  onclick="document.getElementById('edit<?php echo $phy['phid']?>').submit();"
                                                           class="btn btn-success btn-sm btn-raised" >
                                                      <i class="fas fa-edit" aria-hidden="true">

                                                      </i>
                                                  </button>
                                              </td>


                                              <!-- Delete Area -->
                                              <td>

                                                  <form method="post" action ="physiciandelete.php" id="delete<?php echo $phy['phid']?>" style="display:none; " >
                                                      <input value="<?php echo $phy['phid']?>" name = 'uid' />

                                                  </form>

                                                  <button   onclick="document.getElementById('delete<?php echo $phy['phid']?>').submit();"
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
                              <form class="form-inline" action="physician.php" method="post">
                                  <div class="form-group">
                                      <input id="inlineFormInput" name="ID" type="text" value="<?php echo $id ?>" placeholder="Physician ID" class="mr-3 form-control">
                                  </div>
                                  <div class="form-group">
                                      <input id="inlineFormInputGroup" name="PhyName" type="text" value="<?php    echo $PhyName ?>" placeholder="Physician Name" class="mr-3 form-control">
                                  </div>
                                  <div class="form-group">
                                      <input id="inlineFormInputGroup" name="Tele" type="text" value="<?php    echo $Tel ?>" placeholder="Telephone" class="mr-3 form-control">
                                  </div>
                                  <div class="form-group">
                                      <input id="inlineFormInputGroup" name="Spe" type="text" value="<?php    echo $Spe ?>" placeholder="Special" class="mr-3 form-control">
                                  </div>
                                  <div class="form-group">
                                      <input id="inlineFormInputGroup" name="HID" type="text" value="<?php    echo $HID ?>" placeholder="Hospital ID" class="mr-3 form-control">
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