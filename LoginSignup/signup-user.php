<?php require_once "controllerUserData.php";
    error_reporting(0);
    if(isset($_SESSION['name']))
    {
        header('location: ../Home/home.php');
    }
    ?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $signupmobile=$_POST['mobile'];
    // echo $signupmobile;

    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    // echo $mobile;
}

    // if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //     $signupname=$_POST['name'];
    //     $signupemail=$_POST['email'];
    //     $signupmobile=$_POST['mobile'];
    //     $signuplocation=$_POST['location'];
    //     $signuppassword=$_POST['password'];
    //     $signupcpassword=$_POST['cpassword'];
    //     $signuptype=$_POST['type'];

        // $exitsql="SELECT * FROM `user` WHERE `uemail`='$signupemail'";
        // $result= mysqli_query($con, $exitsql);
        // $row= mysqli_num_row($con, $exitsql);
        // echo $row;

        // if ($row > 0) {
        //     echo 'yes';
        //     // echo '<script>alert("email is already exits");</script>';
        // }else {
        //     echo'hi';
        //     if ($signuppassword == $signupcpassword) {
        //         echo 'hello';
        //         $signupsql="INSERT INTO `user`(`uname`, `uemail`, `upassword`, `umobile`, `ulocation`, `utype`) VALUES ('$signupname','$signupemail','$signuppassword',$signupmobile','$signuplocation','$signuptype')";
        //         $result= mysqli_query($con, $signupsql);
        //         if ($result) {
        //             header("Location: /KnowingAboutfarming/Pages/LoginSignup/login-user.php");
        //         }else{
        //             // <script>alert("database issue");</script>
        //         }
        //     }else{
        //         // <script>alert("password does not matched");</script>
        //     }


        // }




    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Sign Up </h2>
                    <p class="text-center"><br></p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }elseif(count($errors) > 1){
                        ?>
                    <div class="alert alert-danger">
                        <?php
                            foreach($errors as $showerror){
                                ?>
                        <li><?php echo $showerror; ?></li>
                        <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required
                            value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required
                            value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">

                        <input class="form-control" type="number"  name="mobile" placeholder="Mobile Number"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="location" placeholder="City/Village" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password"
                            required>
                    </div>
                    <div class="form-group">
                        <select name="type" id="" class="form-control" required>
                            <option value="">--Select User Type--</option>
                            <option value="farmer">Farmer</option>
                            <option value="retailer">Retailer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Sign Up">
                    </div>
                    <div class="link login-link text-center">Already a Member? <a href="login-user.php">Log-In Here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>