<?php
session_start();
include_once '../config.php';
$output = '';


$get_product_data_query = "SELECT * FROM product JOIN user WHERE product.uid = user.uid";
$get_product_data_run = mysqli_query($conn, $get_product_data_query);
if(mysqli_num_rows($get_product_data_run) > 0){
    while($row = mysqli_fetch_assoc($get_product_data_run))
    {       
        $output .= '<a href="product-detail.php?pid='.$row['pid'].'">
                        <div class="col">
                            <div class="card h-100 mi-card">
                                <div class="imagecover">
                                    <img src="image/'.$row['pimage'].'" class="card-img-top productImage" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">'.$row['pname'].'</h5>
                                    <p class="card-text"><b><i class="fa fa-inr" aria-hidden="true"></i> '.$row['pprice'].'/</b><span class="text-muted"> '.$row['ppriceunit'].'</span></p>                    
                                    <small class="d-flex align-items-center"><i class="fa fa-check-circle-o fs-5 pe-1 text-success"></i> '.$row['uname'].'</small>
                                    <small class="text-muted">'.$row['ulocation'].'</small>
                                    <hr> <button type="button" class="btn btn-outline-warning w-100">More</button> 
                                </div>
                            </div>
                        </div>
                    </a>';
    }
}else{
    $output .= 'No data found';
}
?>