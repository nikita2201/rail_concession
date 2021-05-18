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
    <title>Dashborad</title>
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
    $useremail =$_SESSION['login_user'] ;
    $sql = "SELECT * FROM stud_det WHERE email = '$useremail' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $erpid=$row['erp_id'];
            $name=$row['sname'];
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="profile.php">
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
                    <li>
                        <a class="nav-link" href="">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
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
                <div class="latest">
                    <div class="prev">Previous Application</div>
                    <?php 
                        $sql = "select * from form where erp_id ='$erpid' ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $status=$row['status'];
                                $date=$row['application_date'];
                            }
                            ?>
                    <div class="row1">
                        <div class="date">Application Date : <?php echo $date; ?></div>
                        <div class="status">
                           <?php 
                            if($status=="approved"){?>
                         <div class="circle" style="background-color: lawngreen;"></div> 
                           <?php
                            }
                            else{
                                ?>
                                <div class="circle" style="background-color: red;"></div>
                                <?php
                            } 
                            ?>                           
                            <?php echo $status ;?>
                        </div>
                    </div>
                    <div class="text-inf">Collect your concession form after two days of applying</div>
                    <?php }
                    else{
                        ?>
                        <div class="block">No Previous Applications</div>
                        <?php
                    }
                    
                    ?>
                           
                            
                </div>
                <div class="recent">
                    <div class="rec">Recent Applications:</div>
                        <table class="table table-striped table-bordered" style="width:100%" id="example">
                            <thead>
                                <th>Application No.</th>
                                <th>Application Date</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Application Status</th>

                            </thead>
                            <tbody>
                               <?php
                                        include "config.php";
                                        
                                            $sql="select * from form where erp_id='$erpid'";
                                            $result=mysqli_query($conn,$sql) or die;
                                            $cn=1;
                                            if($result==true){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $sr=$row['fid'];
                                                    $applicationdate=$row['application_date'];
                                                       $source=$row['from_stn'];
                                                    $statuss=$row['status'];
                                    
                                        ?>
                                <tr>
                                    <td><?php echo $sr; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $source; ?></td>
                                    <td>Koparkhairane</td>
                                    <td><?php echo $statuss; ?></td>
                                </tr>
                                <?php 
                                                }
                                            }
                                
                                            ?>
                            </tbody>
                        </table>
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
