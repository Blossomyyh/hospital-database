
<?php  include('includes/db.php')  ?>

<?php

$uid= $_POST['uid'];
echo $uid;

$sql= "DELETE FROM physician WHERE phid =$uid";

if($db->query($sql)== TRUE){
    echo "<script>alert('Data Deleted Successfully')</script>";
    //echo "Data deleted Successfully";
} else
    echo "<script>alert('Data Deleted Failed! Try again!')</script>";
//echo "Fail to delete data !! Try again";
//header("physician.php");

exit;

//Penicillin 1.2MU  1000001  PHARMA  100001
?>
