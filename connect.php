<html>

<body>
    <?php

    session_start();    
    require_once "config.php";

if (isset($_POST)) {
    if ($_POST['submit'] == "SUBMIT") {

        $name = $_POST["name"];
        $erp = $_POST["erp-id"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $mobile = $_POST["mob"];
        $dob = $_POST["dob"];
        $age = $_POST["age"];
        $month=$_POST["month"];
        $class = $_POST["class"];
        $rollno = $_POST["roll"];
        $branch = $_POST["branch"];
        $email = $_POST["email"];
        $options = [
            'cost' => 12,
        ];
        $pass = $_POST["pass"];
        $cpassword = $_POST["cpassword"];
        //insert values in customer details
        $sql = "SELECT * FROM stud_det WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            if ($pass == $cpassword) {
                $pass = password_hash($_POST["pass"], PASSWORD_BCRYPT, $options);
                $sql = "INSERT INTO `stud_det` (`erp_id`, `sname`, `gender`, `addr`, `contact`, `dob`, `age`,`month`, `class`,`branch`, `roll`, `password`, `email`) VALUES ('$erp', '$name', '$gender', '$address', '$mobile', '$dob', '$age','$month', '$class','$branch', '$rollno', '$pass', '$email')";

                if ($conn->query($sql) === true) {
                    header("Location: index.php");
                } else {
                    echo "Error" . $conn->error;
                }
            } else {
                $php_errormsg = "Password doesn't match";
            }
        }
        else{
            $_SESSION['error'] = "Email already exists";
        }

    }

}


?>

</body>

</html>
