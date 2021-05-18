<?php
include "config.php";
           if (sizeof($_SERVER["REQUEST_METHOD"] == "POST")) {
                if ($_POST['submit'] == "SUBMIT") {
                $erpid =$_POST['erp-id'];
                $new_name=$_POST['name'];
                $new_gender=$_POST['gender'];
                $new_dob=$_POST['dob'];
                $new_address=$_POST['address'];
                $new_mobile = $_POST["mob"];
                $new_class = $_POST["class"];
                $new_rollno = $_POST["roll"];
                $new_branch = $_POST["branch"];
                $new_email = $_POST["email"];
            //insert values in customer detail

                $sql = "update stud_det set  `sname`='$new_name' ,`gender`='$new_gender' , `addr`='$new_address' ,`branch`='$new_branch', `contact`='$new_mobile',`email`='$new_email',`dob`='$new_dob',`class`='$new_class',`roll`='$new_rollno' where erp_id='$erpid'";

                    if ($conn->query($sql) === true) {
                        header ("location: profile.php");
                    } else {
                        echo "Error" . $conn->error;
                    }


    }
    }
?>