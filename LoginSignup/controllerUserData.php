<?php 
include './vendor/autoload.php';
// use Twilio\Rest\Client;

session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();
$sid= 'ACbd0cfccae90c04d986ff7591091c3343';
$token = 'ba630f7f0d4ff2e97edd231c80927361';

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $type = mysqli_real_escape_string($con, $_POST['type']);

    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }

    if (isset($mobile) ) {
        $mobile_check = "SELECT * FROM user WHERE umobile = '$mobile'";
        $res = mysqli_query($con, $mobile_check);
        if(mysqli_num_rows($res) > 0){
            $errors['mobile'] = "Mobile Number that you have entered is already exist!";
        }

        if(count($errors) === 0){
            $encpass = md5($password);
            $code = rand(999999, 111111);
            $status = "verified";
            $insert_data = "INSERT INTO user (uname, uemail, upassword, umobile, ulocation, utype, code, status)
                            values('$name', '$email', '$encpass', '$mobile', '$location', '$type','$code', '$status')";
            $data_check = mysqli_query($con, $insert_data);

            if($data_check){
                header("Location: /KnowingAboutfarming/Pages/LoginSignup/login-user.php");
            }else{
                $errors['db-error'] = "Failed while inserting data into database!";
            }
        }
    }
}
    //if user click verification code submit button
    if(isset($_POST['check'])){

        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['uemail'];
            $mobile = $fetch_data['umobile'];
            $name = $fetch_data['uname'];
            $uid = $fetch['uid'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE user SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['userid'] = $uid;
                $_SESSION['type'] = $fetch['utype'];
                $_SESSION['mobile'] = $mobile;
                $_SESSION['password'] = $password;
                header('location: ../Home\home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }


    //if user click login button
    if(isset($_POST['login'])){
        
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_mobile = "SELECT * FROM user WHERE umobile = '$mobile'";
        $res = mysqli_query($con, $check_mobile);
        $status = 'verified';
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['upassword'];
            
            $encpass = md5($password);
            if($encpass == $fetch_pass){
                $_SESSION['mobile'] = $mobile;
                $status = $fetch['status'];
                $name = $fetch['uname'];
                $uid = $fetch['uid'];
                $email = $fetch['uemail'];
                $mobile = $fetch['umobile'];
                $name = $fetch['uname'];
                $uid = $fetch['uid'];
                $code = 0;
                $status = 'verified';
                $update_status = "UPDATE user SET status = '$status'  WHERE umobile = '$mobile'";
                $update_res = mysqli_query($con, $update_status);
                if($update_res){
                    $_SESSION['name'] = $name;
                    $_SESSION['userid'] = $uid;
                    $_SESSION['type'] = $fetch['utype'];
                    $_SESSION['mobile'] = $mobile;
                    $_SESSION['password'] = $password;
                    $_SESSION['loginsuccess'] = 1;
                    header('location: ../Home\home.php');
                    exit();
                }
                //header('location: ../Home\home.php');
            }else{
                $errors['mobile'] = "Incorrect mobile or password!";
            }
        }else{
            $errors['mobile'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-mobile'])){

        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $check_mobile = "SELECT * FROM user WHERE umobile='$mobile'";
        $run_sql = mysqli_query($con, $check_mobile);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE user SET code = $code WHERE umobile = '$mobile'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                header('location: new-password.php');
                $_SESSION['mobile'] = $mobile;
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['mobile'] = "This Mobile Number does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $mobile = $fetch_data['umobile'];
            $_SESSION['mobile'] = $mobile;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        $_SESSION['mobile'];
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $mobile = $_SESSION['mobile']; //getting this mobile using session
            $encpass = md5($password);
            $update_pass = "UPDATE user SET upassword = '$encpass' WHERE umobile = '$mobile'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>