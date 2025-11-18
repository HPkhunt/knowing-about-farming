<?php
session_start();
include_once '../config.php';
$output = '';


$get_product_data_query = "SELECT * FROM product WHERE uid = '{$_SESSION['userid']}'";
$get_product_data_run = mysqli_query($conn, $get_product_data_query);
if(mysqli_num_rows($get_product_data_run) > 0){
    while($row = mysqli_fetch_assoc($get_product_data_run))
    {       
        $output .= '<div class="col">
                        <div class="card h-100 mi-card">
                            <div class="imagecover">
                                <img src="image/'.$row['pimage'].'" class="card-img-top productImage" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">'.$row['pname'].'</h5>
                                <p class="card-text"><b><i class="fa fa-inr" aria-hidden="true"></i> '.$row['pprice'].'/</b><span class="text-muted"> '.$row['ppriceunit'].'</span></p>                    
                                <hr> 
                                <div class="buttons">
                                    <a href="update-product.php?pid='.$row['pid'].'"><button type="button" class="btn btn-outline-warning w-100" href>Edit</button></a>
                                    <a href="delete-product-logic.php?pid='.$row['pid'].'"><button type="button" class="btn btn-outline-danger w-100 mt-2">Delete</button></a>
                                </div> 
                            </div>
                        </div>
                    </div>';
    }
}else{
    $output = '<h4 class="text-muted" style="text-align: center;">No Product Found<h4>';
}
?>