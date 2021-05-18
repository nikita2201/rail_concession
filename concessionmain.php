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
    <title>Apply for Concession</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Bangers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
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
            $username = $row['sname'];
        }
    }
?>
<?php
    $GLOBALS['err'] ="";
    $sql = "SELECT * FROM form WHERE erp_id = '$erpid' and status='pending'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        if (sizeof($_POST)>=1) {
                if ($_POST['submit'] == "SUBMIT") {
                $nor =$_POST['tor'];
                $valid_till=$_POST['expdate'];
                $duration=$_POST['dot'];
                $source=$_POST['source'];
                $destination=$_POST['destination'];
                $class=$_POST['cot'];
                $ssn_tkt_no=$_POST['ssn_tkt'];
                $vchno=$_POST['vchno'];
                    $pending="pending";
            //insert values in customer detail

                $sql = "INSERT INTO `form` (`fid`, `erp_id`, `name_of_railway`, `from_stn`, `to_stn`, `duration`, `tclass`, `valid_till`, `ssn_ticket_no`, `vch_no`, `application_date`, `status`) VALUES (NULL, '$erpid', '$nor', '$source', '$destination', '$duration', '$class', '$valid_till', '$ssn_tkt_no', '$vchno', current_timestamp(), '$pending')";

                    if ($conn->query($sql) === true) {
                        header("location: dashboard.php");
                    } else {
                        echo "Error" . $conn->error;
                    }


    }
}
                }
        else{
           $GLOBALS['err'] ="You already have a pending application";

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
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="concessionmain.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Apply for Concession</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./notifications.html">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item active active-pro">
                        <a class="nav-link active" href="upgrade.html">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li> -->
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
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link username">
                                    <span class="no-icon">Welcome <?php echo $username ;?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="form-container">
                        <div class="wt">Concession Form</div>
                        <form action="" method="POST">
                           <div class="err"><?php echo $err ;?></div>
                            <label for="erp-id">Erp Id</label><input type="text" name="erp-id" value="<?php echo $erpid ;?>" readonly required><br>
                            <label for="name">Full Name (in block letters)</label><input type="text" name="name" value="<?php echo $username; ?>" readonly required><br>
                            <label for=" ">Name of railway</label><input type="radio" value="central" name="tor" required>Central <input type="radio" value="western" name="tor" required>Western<br>
                            <label for="">name of station for journey purpose</label><input type="text" name="source" placeholder="From" required><input type="text" value="KOPARKHAIRANE" name="destination" placeholder="To" required><br>
                            <label for=" ">Duration of ticket</label><input type="radio" value="monthly" name="dot" required>Monthly
                            <input type="radio" value="quarterly" name="dot" required>Quarterly<br>
                            <label for=" ">Class of ticket</label><input type="radio" value="first" name="cot" required>First
                            <input type="radio" value="second" name="cot" required>Second<br>
                            <label for="">Expiry date of season ticket</label><input type="date" name="expdate" required><br>
                            <label for=" ">Season ticket number</label><input type="text" name="ssn_tkt" required><br>
                            <label for=" ">Vch no.</label><input type="text" name="vchno" required><br>

                            <CENTER><input type="submit" value="SUBMIT" class="btn-submit" name="submit"></CENTER>

                        </form>
                    </div>
                </div>
            </div>

</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>

<script src="../assets/js/plugins/bootstrap-switch.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<script src="../assets/js/plugins/chartist.min.js"></script>

<script src="../assets/js/plugins/bootstrap-notify.js"></script>

<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>

<script src="../assets/js/demo.js"></script>

</html>
