
<?php  include('includes/db.php')  ?>

<?php

    $uid= $_POST['uid'];
    echo $uid;

    $sql= "DELETE FROM hospital WHERE hid =$uid";

    if($db->query($sql)== TRUE){
        echo "<script>alert('Data Deleted Successfully')</script>";
//        header("Location: hospital.php");

        //echo "Data deleted Successfully";
    } else{
        echo "<script>alert('Data Deleted Failed! Try again!')</script>";}
        //echo "Fail to delete data !! Try again";

    exit;

    //Penicillin 1.2MU  1000001  PHARMA  100001
?>

