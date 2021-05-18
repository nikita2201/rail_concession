<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/logincss.css">

    <title>LTCE | Railway Concession</title>
</head>

<body>
<?php
include 'config.php';
$php_errormsg="";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $count = "";
    $useremail = $_POST['e-mail'];
    $passw = $_POST['pass'];

    $sql = "SELECT * FROM stud_det WHERE email = '$useremail' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $chk_pass = $row['password'];

        }
        if (password_verify($passw, $chk_pass)) {
        // session_register("useremail");
        $_SESSION['login_user'] = $useremail;

        header("location: dashboard.php");
    } else {
        $php_errormsg = "Your Login Name or Password is invalid";
    }
    }
    else{
        $php_errormsg="User does not exist";
    }

    
}
?>


 <div class="container">
      
        <div class="form-container">
           
            <form class="mt-3" id="login" action=" " method="post">
             <div class="err"><?php echo $php_errormsg ;?></div> 
             <div class="title"> Log In </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="e-mail" placeholder="Enter your email" required>
                </div>
                   <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Enter your password" required>
                </div>
               <center><div class="form-group text-center">
                    <input type="submit" value="Log In" class="btn sb">
                </div></center>
            </form>
        </div>
        <div class="text">Don't have an account ?<a href="student.html">Sign Up</a></div>
    </div>
</body></html>

