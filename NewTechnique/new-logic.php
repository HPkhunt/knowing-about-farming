<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header('location: ../LoginSignup\login-user.php');
      }
    include_once '../config.php';
    
        $search_value = mysqli_real_escape_string($conn,$_POST["searchTerm"]);
        if(empty($search_value)){
            $search_query = "SELECT * FROM technique ";
        }
        else{
            $search_query = "SELECT * FROM technique WHERE tname LIKE '%$search_value%' ";
        }

        $search_query_run = mysqli_query($conn, $search_query);

        $output = '<div class="customrow rowheading">
                        <div class="main">
                            <div class="bullet"></i></div>
                            <div class="content">
                                <h5>Technique Name</h5>
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
                                    <div class="bullet"><i class="fa fa-leaf"></i></div>
                                    <div class="content">
                                        <h5>'.$row['tname'].'</h5>
                                    </div>
                                </div>
                                <div class="more">
                                    <a href="newmore.php?tid='.$row['tid'].'"> <button type="button" class="btn btn-outline-warning w-100 "> Explore
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