<?php include('includes/header.php') ?>

<?php




function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }



if( isset($_POST['submit'])){
    $uid=  $_POST['uid'];

    $HospitalName= test_input( $_POST['HospitalName']);
    $HospitalAddress= test_input ( $_POST['HospitalAddress']);
    $HospitalCity= test_input ( $_POST['HospitalCity']);
    $HospitalState = test_input ( $_POST['HospitalState']);
    $ZipCode = test_input ( $_POST['ZipCode']);
    $sql= "UPDATE hospital SET hname='$HospitalName', hst_address='$HospitalAddress', hst_city ='$HospitalCity', hstate ='$HospitalState', hzip = '$ZipCode' WHERE hid=$uid";


    if($db->query($sql)== TRUE){
        echo "<script>alert('Data Added Successfully')</script>";
        //echo "Data Added Successfully";
    } else
    echo "Fail to inser data !! Try again";

}
?>



<?php
 if( isset($_GET['uid']))
{

$uid= $_GET['uid'];

  $sql = "SELECT * FROM hospital WHERE hid=$uid";
  $Hospital= $db->query($sql)->fetch_assoc();

  $HospitalName= $Hospital['hname'];
  $HospitalAddress=  $Hospital['hst_address'];
  $HospitalCity= $Hospital['hst_city'];
  $HospitalState  = $Hospital['hstate'];
  $ZipCode = $Hospital['hzip'];

?>


<div class="d-flex align-items-stretch">
    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a href="index.php" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
            <li class="sidebar-list-item"><a href="physician.php" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Physician</span></a></li>
            <li class="sidebar-list-item"><a href="treatment.php" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Treatment</span></a></li>
            <li class="sidebar-list-item"><a href="hospital.php" class="sidebar-link text-muted active"><i class="o-survey-1 mr-3 text-gray"></i><span>Hospital</span></a></li>
            <li class="sidebar-list-item"><a href="login.html" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Logout</span></a></li>
        </ul>
    </div>

    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
            <section class="py-5">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                            <div class="flex-grow-1 d-flex align-items-center">
                                <div class="dot mr-3 bg-violet"></div>
                                <div class="text">
                                    <h6 class="mb-0">Data consumed</h6><span class="text-gray">145,14 GB</span>
                                </div>
                            </div>
                            <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                            <div class="flex-grow-1 d-flex align-items-center">
                                <div class="dot mr-3 bg-green"></div>
                                <div class="text">
                                    <h6 class="mb-0">Open cases</h6><span class="text-gray">32</span>
                                </div>
                            </div>
                            <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                            <div class="flex-grow-1 d-flex align-items-center">
                                <div class="dot mr-3 bg-blue"></div>
                                <div class="text">
                                    <h6 class="mb-0">Work orders</h6><span class="text-gray">400</span>
                                </div>
                            </div>
                            <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                            <div class="flex-grow-1 d-flex align-items-center">
                                <div class="dot mr-3 bg-red"></div>
                                <div class="text">
                                    <h6 class="mb-0">New invoices</h6><span class="text-gray">123</span>
                                </div>
                            </div>
                            <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
                        </div>
                    </div>
                </div>
            </section>
            <section>

                <div class="row">
                    <!-- Horizontal material form -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">

                                <form action="" method="post" >

                                    <!-- Material input -->
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="uid" value="<?php    echo $uid ?>" id="inputid" class="form-control"
                                               readonly>
                                        <label>Hospital Id</label>
                                    </div>

                                    <!-- Material input -->
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="HospitalName" value="<?php    echo $HospitalName ?>" id="inputfirstname"
                                               class="form-control">
                                        <label for="inputfirstname">Hospital Name</label>
                                    </div>

                                    <!-- Material input -->
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="HospitalAddress" value="<?php    echo $HospitalAddress ?>" id="inputlastname"
                                               class="form-control">
                                        <label for="inputlastname">Hospital Address</label>
                                    </div>
                                    <!-- Material input -->
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="HospitalCity" value="<?php    echo $HospitalCity ?>" id="inputlastname"
                                               class="form-control">
                                        <label for="inputlastname">Hospital City</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="HospitalState" value="<?php    echo $HospitalState ?>" id="inputlastname"
                                               class="form-control">
                                        <label for="inputlastname">Hospital State</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="ZipCode" value="<?php    echo $ZipCode ?>" id="inputlastname"
                                               class="form-control">
                                        <label for="inputlastname">ZipCode</label>
                                    </div>
                                    <!-- Material input -->
                                    <div class="md-form">

                                        <input type="submit" name="submit" value="Edit" id="inputsubmit" class="form-control">

                                    </div>



                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Horizontal material form -->

                    <?php }
                    ?>

                </div>
            </section>
        </div>








<?php include('includes/footer.php') ?>
