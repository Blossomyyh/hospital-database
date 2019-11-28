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

    $TreatmentName= test_input( $_POST['TreatmentName']);
    $TreatmentType= test_input ( $_POST['TreatmentType']);
    $Deid= test_input ( $_POST['Deid']);
    $sql= "UPDATE treatment SET tname='$TreatmentName', ttype='$TreatmentType', deid='$Deid'  WHERE tid=$uid";


    if($db->query($sql)== TRUE){
        echo "<script>alert('Data Added Successfully')</script>";
        echo "Data Added Successfully";
    } else
    echo "Fail to inser data !! Try again";

}
?>



<?php
 if( isset($_GET['uid']))
{

$uid= $_GET['uid'];

  $sql = "SELECT * FROM treatment WHERE tid=$uid";
  $Treatment= $db->query($sql)->fetch_assoc();


  $TreatmentName= $Treatment['tname'];
  $TreatmentType=  $Treatment['ttype'];
  $Deid= $Treatment['deid'];

?>


<div class="d-flex align-items-stretch">
    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a href="index.php" class="sidebar-link text-muted active"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
            <li class="sidebar-list-item"><a href="charts.html" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Charts</span></a></li>
            <li class="sidebar-list-item"><a href="treatment.php" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Tables</span></a></li>
            <li class="sidebar-list-item"><a href="forms.html" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Forms</span></a></li>
            <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Pages</span></a>
                <div id="pages" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                        <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page one</a></li>
                        <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page two</a></li>
                        <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page three</a></li>
                        <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page four</a></li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-list-item"><a href="login.html" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Login</span></a></li>
        </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-database-1 mr-3 text-gray"></i><span>Demo</span></a></li>
            <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-imac-screen-1 mr-3 text-gray"></i><span>Demo</span></a></li>
            <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Demo</span></a></li>
            <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Demo</span></a></li>
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
                                        <label>User Id</label>
                                    </div>

                                    <!-- Material input -->
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="TreatmentName" value="<?php    echo $TreatmentName ?>" id="inputfirstname"
                                               class="form-control">
                                        <label for="inputfirstname">Medicine Name</label>
                                    </div>

                                    <!-- Material input -->
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="TreatmentType" value="<?php    echo $TreatmentType ?>" id="inputlastname"
                                               class="form-control">
                                        <label for="inputlastname">Company Name</label>
                                    </div>
                                    <!-- Material input -->
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" name="Deid" value="<?php    echo $Deid ?>" id="inputlastname"
                                               class="form-control">
                                        <label for="inputlastname">Price</label>
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
