<?php

    session_start();

    if(!isset($_SESSION['login_user']) || $_SESSION['login_user'] == "") {
        header("Location: index.php");
    }

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Profile</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Bangers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php
include 'config.php';
$useremail=$_SESSION['login_user'];
    
    $sql = "SELECT * FROM stud_det WHERE email = '$useremail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $name =$row['sname'] ;
        $gender =$row['gender'] ;
        $address =$row['addr'];
        $mobile =$row['contact'] ;
        $dob =$row['dob'] ;
        $month=$row['month'];
        $class =$row['class'];
        $rollno =$row['roll'] ;
        $branch =$row['branch'] ;
        $erpid =$row['erp_id'] ;
        }
    
    }
    
?>
    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        LTCE
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="concessionmain.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Apply for Concession</p>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Student Portal</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link username">
                                    <span class="no-icon">Welcome <?php echo $name ;?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <span class="no-icon">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="container">
                <div id="profile">
                <div class="wt">Profile</div>
                <div class="row">                 
                            <form action="">
                                <div class="profile-title">Personal Details</div>
                                <div class="details">

                                    <label for="erp-id">Erp Id</label><input type="text" class="inputt" pattern="^[0-9]{9,10}$" title="Please enter valid ERP Id" name="erp-id" placeholder="eg: 1706000XX" value="<?php echo $erpid ;?>" readonly><br>
                                    <label for="name">Full Name </label><input type="text" name="name" value='<?php echo $name ;?>' readonly><br>
                                    <label for="">Gender</label><input type="text" name="gender" value="<?php echo $gender ;?>" readonly><br>

                                    <label for="">Date Of Birth</label><input type="text" value="<?php echo $dob ;?>" readonly><br>
                                    <label for="">Class &amp; Roll no.</label><input type="text" class="sm" placeholder="Class" value="<?php echo $class ;?>" readonly><input type="text" class="sm" placeholder="Roll no." value="<?php echo $rollno ;?>" readonly><br>
                                    <label for="">Branch</label><input type="text" class="sm" placeholder="Branch" value="<?php echo $branch ;?>" readonly><br>

                                <div class="profile-title">Contact Details</div>

                                    <label for="">Address</label>
                                    <textarea name="address" rows="5" cols="40" wrap="hard" readonly><?php echo $address; ?></textarea><br>
                                    <label for="">Contact Number</label><input type="text" value="<?php echo $mobile ;?>" readonly><br>
                                    <label for="email-id">Email-Id</label><input type="email" name="email" value="<?php echo $useremail;?>" readonly><br>
                                </div>
                                <a href="editprofile.php"><div class="edit-profile">Edit Profile</div></a>
                            </form>
                        </div>
                    </div>
                </div>

</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="assets/js/plugins/chartist.min.js"></script>
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="assets/js/demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>


</html>
