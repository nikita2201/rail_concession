<?php
include 'config.php';

session_start();
//if (sizeof($_POST)>=1) {
    $erpnow=$_GET['erpid'];
    
    
    $sql="update form set status = 'approved' where erp_id ='$erpnow'";
if ($conn->query($sql) === TRUE) {
    header("Location: admin/table.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
    
//}
?>
