<?php
session_start();
include_once '../config.php';
$output = '';

$pid=$_GET['pid'];

$get_product_data_query = "SELECT * FROM product JOIN user WHERE product.pid = '{$pid}' AND product.uid = user.uid";
$get_product_data_run = mysqli_query($conn, $get_product_data_query);
if(mysqli_num_rows($get_product_data_run) > 0){
    while($row = mysqli_fetch_assoc($get_product_data_run))
    {  
        if (isset($_SESSION['name'])) {
            $output .= '<div class="col-md-4">
                        <img src="image/'.$row['pimage'].'" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">'.$row['pname'].' <span> ('.$row['ptype'].')</span></h2>
                            <h5 class="text-warning"><i class="fa fa-inr" aria-hidden="true"></i> '.$row['pprice'].' / '.$row['ppriceunit'].'</h3>
                            <hr>
                            <h5><b>Description</b></h5>
                            <p class="card-text">'.$row['pdescription'].'</p>
                            <p class="card-text"><b>Category:</b> '.$row['pcategory'].' </p>
                            <hr><a href="payment.php?pid='.$row['pid'].'"> <button type="button" class="btn btn-outline-success w-100">Buy Now</button></a>
                        </div>
                    </div>';
        }  
        else{
            $output .= '<div class="col-md-4">
                        <img src="image/'.$row['pimage'].'" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">'.$row['pname'].' <span> ('.$row['ptype'].')</span></h2>
                            <h5 class="text-warning"><i class="fa fa-inr" aria-hidden="true"></i> '.$row['pprice'].' / '.$row['ppriceunit'].'</h3>
                            <hr>
                            <h5><b>Description</b></h5>
                            <p class="card-text">'.$row['pdescription'].'</p>
                            <p class="card-text"><b>Category:</b> '.$row['pcategory'].' </p>
                            <hr><button type="button" class="btn btn-outline-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Buy Now</button>
                        </div>
                    </div>';
        }   
        
    }
}else{
    $output .= 'No data found';
}
?>

<!-- <button type="button" class="btn btn-outline-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Buy Now</button> -->
