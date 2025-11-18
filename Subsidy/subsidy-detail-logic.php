<?php
session_start();
if(!isset($_SESSION['name'])){
    header('location: ../LoginSignup\login-user.php');
  }
include_once '../config.php';
$output = '';

$subid=$_GET['subid'];

$get_data_query = "SELECT * FROM subsidy WHERE subid = '{$subid}'";
$get_data_run = mysqli_query($conn, $get_data_query);
if(mysqli_num_rows($get_data_run) > 0){
    while($row = mysqli_fetch_assoc($get_data_run))
    {       
        $output .= '<div class="techheading d-flex justify-content-between align-items-end">
                        <h2>'.$row['subname'].'</h2>
                        <h6>Type: '.$row['subtype'].'</h6>
                    </div>
                    <hr>
                    
                    <hr>
                    <div class="info">
                        <div class="infobody ">
                            <h5 class="infoheading">Details</h5>
                            <hr>
                            <p>'.$row['subinfo'].'</p>
                        </div>
                        <div class="sourcelink">
                            <h5 class="linkheading">For more detailed check out below link</h5>
                            <hr>
                            <h6 class="linkurl">
                                <a href="'.$row['suburl'].'"
                                    target="_blank">Read me ...</a>
                            </h6>
                        </div>
                    </div>';
    }
}else{
    $output = '<h4 class="text-muted" style="text-align: center;">No Data Found<h4>';
}
?>