<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/logincss.css">

    <title>Admin Login</title>
</head>

<body>
<?php
include 'config.php';
    $php_errormsg="";
$error="";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['e-mail'];
    $passw = $_POST['pass'];

    $sql = "SELECT * FROM admin WHERE login = '$user' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $chk_pass = $row['pswd'];

        }
        if ($passw==$chk_pass) {
        // session_register("useremail");
        $_SESSION['login_admin'] = $user;

        header("location: admin/table.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
    }
    else{
        $php_errormsg="User does not exist";
    }

}
?>


 <div class="container">
        <div class="form-container">
           <div class="err"><?php echo $php_errormsg ;?></div> 
            <form class="mt-3" id="login" action=" " method="post">
             <div class="title">Admin  Log In </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="e-mail" placeholder="Enter your username" required>
                </div>
                   <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Enter your password" required>
                </div>
               <centre><div class="form-group text-center">
                    <input type="submit" value="Log In" class="btn sb">
                </div></centre>
            </form>
        </div>
    </div>
</body></html>
