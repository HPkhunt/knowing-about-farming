<?php require_once "controllerUserData.php"; ?>
<?php 
    $_SESSION['mobile'] = $mobile;
    $password = $_SESSION['password'];
    // $_SESSION['loginsuccess']

    if(isset($_SESSION['name']))
    {
        header('location: ../Home/home.php');
    }
if($mobile != false && $password != false){
    $sql = "SELECT * FROM user WHERE umobile = '$mobile'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    body{
        padding-left: 100px!important;
        padding-right: 100px!important;
    background-image: url(flr1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    font-family: Bold,sans-serif;
    font-size: 15px;
    font-variant-caps: all-petite-caps;
    line-height: 1.5;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        
        font-size: 17px;
    font-weight: 500;
    transition: all 0.3s ease;
    font-variant-caps: all-petite-caps;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 20%;
        left: 25%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
    }
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">Farmer</a>
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>
   
</head>
    
</body>
</html>