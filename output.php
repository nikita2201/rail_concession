 <?php

    session_start();

    if(!isset($_SESSION['login_admin']) || $_SESSION['login_admin'] == "") {
        header("Location: admin_login.php");
    }

 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <link rel="stylesheet" href="css/style.css">
     <title>Sign Up</title>
 </head>

 <body>
     <?php
include 'config.php';
$erpnow=$_GET['erpid'];
    
    $sql = "SELECT * FROM stud_det WHERE erp_id = '$erpnow'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $name =$row['sname'] ;
        $gender =$row['gender'] ;
        $address =$row['addr'];
        $mobile =$row['contact'] ;
        $dob =$row['dob'] ;
        $age =$row['age'] ;
        $month=$row['month'];
        $class =$row['class'];
        $rollno =$row['roll'] ;
        $branch =$row['branch'] ;
        $email =$row['email'] ;
        }
    }
    $sql = "SELECT * FROM form WHERE erp_id = '$erpnow' and status='pending'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
                $nor =$row['name_of_railway'];
                $valid_till=$row['valid_till'];
                $duration=$row['duration'];
                $source=$row['from_stn'];
                $destination=$row['to_stn'];
                $class=$row['tclass'];
                $ssn_tkt_no=$row['ssn_ticket_no'];
                $vchno=$row['vch_no'];
        }
    }
    
?>

     <nav>
         <div class="logo"> <img src="images/logo.png" alt="" height="60px"></div>
         <div class="title"><u>Lokmanya tilak college of engineering</u> <br><span>Sector-4 Koparkahirane , Navi Mumbai 400709.</span></div>
     </nav>
     <div class="container">
         <div class="wt">Railway Concession</div>
         <div class="form-container">
             <form action="" method="POST">
                 <label for="erp-id">Erp Id</label><input type="text" name="erp-id" value="<?php echo $erpnow ;?>" readonly><br>
                 <label for="name">Full Name (in block letters)</label><input type="text" name="name" value='<?php echo $name ;?>' readonly><br>
                 <label for=" ">Gender</label><input type="text" name="gender" value="<?php echo $gender ;?>" readonly><br>
                 <label for=" ">Address (as per admission form)</label>
                 <textarea name="address" rows="5" cols="40" wrap="hard" readonly><?php echo $address; ?></textarea><br>
                 <label for=" ">Contact Number</label><input type="text" value="<?php echo $mobile ;?>" readonly><br>
                 <label for=" ">Date Of Birth</label><input type="text" value="<?php echo $dob ;?>" readonly><br>
                 <label for=" ">Age</label><input class="sm" type="text" placeholder="Years" value="<?php echo $age ;?>" readonly><input type="text" class="sm" placeholder="Months" value="<?php echo $month ;?>" readonly><br>
                 <label for=" ">Class &amp; Roll no.</label><input type="text" class="sm" placeholder="Class" value="<?php echo $class ;?>" readonly><input type="text" class="sm" placeholder="Roll no." value="<?php echo $rollno ;?>" readonly><input type="text" class="sm" placeholder="Branch" value="<?php echo $branch ;?>" readonly><br>
                 <label for=" ">Name of railway</label><input type="text" value="<?php echo $nor ;?>" name="tor" readonly><br>
                 <label for="">name of station for journey purpose</label><input type="text" placeholder="From" value="<?php echo $source ;?>" readonly>
                 <input type="text" placeholder="To" value="<?php echo $destination ;?>" readonly><br>
                 <label for=" ">Duration of ticket</label><input type="text" name="dot" value="<?php echo $duration ;?>" readonly><br>
                 <label for=" ">Class of ticket</label><input type="text" name="cot" value="<?php echo $class ;?>" readonly><br>
                 <label for="">Expiry date of season ticket</label><input type="text" value="<?php echo $valid_till ;?>" readonly><br>
                 <label for=" ">Season ticket number</label><input type="text" value="<?php echo $ssn_tkt_no ;?>" readonly><br>
                 <label for=" ">Vch no.</label><input type="text" value="<?php echo $vchno ;?>"><br>

                 <CENTER class="buttons"><a href="approve_move.php?erpid=<?php echo $erpnow ;?>"><span class="go-back-but approve">Approve</span></a> 
                 <a href="admin/table.php"><div class="go-back-but">Go Back</div></a></CENTER>
             </form>
         </div>

 </body>

 </html>
