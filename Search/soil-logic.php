<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header('location: ../LoginSignup\login-user.php');
      }
    include_once '../config.php';
    
        $search_value = mysqli_real_escape_string($conn,$_POST["searchTerm"]);
        if(empty($search_value)){
            $search_query = "SELECT * FROM soil";
        }
        else{
            $search_query = "SELECT * FROM soil WHERE sname LIKE '%$search_value%' ";
        }

        $search_query_run = mysqli_query($conn, $search_query);
        // var_dump($search_query_run);exit;

        $output = '<div class="customrow rowheading">
                        <div class="main">
                            <div class="bullet"></i></div>
                            <div class="content">
                                <h5>Soil Name</h5>
                            </div>
                        </div>
                        <div class="more">
                            <h5>Action</h5>
                        </div>
                    </div>';
        if(mysqli_num_rows($search_query_run) > 0){
            while($row = mysqli_fetch_assoc($search_query_run))
            {
                $output .= '<div class="customrow">
                                <div class="main">
                                    <div class="bullet"><i class="far fa-hand-holding-usd"></i></div>
                                    <div class="content">
                                        <h5>'.$row['sname'].'</h5>
                                    </div>
                                </div>
                                <div class="more">
                                    <a href="soil-detail.php?sid='.$row['sid'].'"> <button type="button" class="btn btn-outline-warning w-100 "> Explore
                                        </button></a>
                                </div>
                            </div>';
            }
            
        }
        else{
            $output .= '<div class="customrow d-flex justify-content-center"><h4 class="text-muted" style="text-align: center;">No data Found</h4> </div>';
        }
        echo $output;


?>