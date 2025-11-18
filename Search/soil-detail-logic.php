<?php
session_start();
if(!isset($_SESSION['name'])){
    header('location: ../LoginSignup\login-user.php');
  }
include_once '../config.php';
$output = '';

$sid=$_GET['sid'];

$get_data_query = "SELECT * FROM soil WHERE sid = '{$sid}'";
$get_data_run = mysqli_query($conn, $get_data_query);
if(mysqli_num_rows($get_data_run) > 0){
    while($row = mysqli_fetch_assoc($get_data_run))
    {       
        $output .= '<div class="techheading d-flex justify-content-between align-items-end">
                        <h2>'.$row['sname'].'</h2>
                    </div>
                    <hr>
                    <div class="image">
                    <img src="images/soil/'.$row['simage'].'"  width="300" height="200"">

                    </div>
                    <hr>
                    <div class="info">
                        <div class="infobody ">
                            <h5 class="infoheading">Details</h5>
                            <hr>
                            <p>'.$row['sinfo'].'</p>
                        </div>
                    
                    </div>';
    }
}else{
    $output = '<h4 class="text-muted" style="text-align: center;">No Data Found<h4>';
}
?>