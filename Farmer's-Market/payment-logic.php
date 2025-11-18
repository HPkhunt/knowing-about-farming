<?php
session_start();
include_once '../config.php';
if(!isset($_SESSION['name'])){
    header('location: ../LoginSignup\login-user.php');
  }
$output = '';

$pid=$_GET['pid'];


$get_product_data_query = "SELECT * FROM product JOIN user WHERE product.pid = '{$pid}' AND product.uid = user.uid";
$get_product_data_run = mysqli_query($conn, $get_product_data_query);
if(mysqli_num_rows($get_product_data_run) > 0){
    while($row = mysqli_fetch_assoc($get_product_data_run))
    {
        $price = $row['pprice'];
        $output .= '<div class="col-3">
                        <div class="card h-100 mi-card">
                            <div class="imagecover">
                                <img src="image/'.$row['pimage'].'"
                                    alt="'.$row['pname'].'" class="card-img-top productImage">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">'.$row['pname'].'</h5>
                                <p class="card-text"><b><i class="fa fa-inr" aria-hidden="true"></i> '.$row['pprice'].'/</b><span
                                        class="text-muted"> '.$row['ppriceunit'].'</span></p>
                                <small class="d-flex align-items-center"><i
                                        class="fa fa-check-circle-o fs-5 pe-1 text-success"></i> '.$row['uname'].'</small>
                                <small class="text-muted">'.$row['ulocation'].'</small>
                                <div class="mt-2 aq">
                                    <label class="col-md-4 control-label w-100" for="quantity">Avaliable Qty. <span class="ml-2"> '.$row['pquantity'].' '.$row['pquantityunit'].'</span></label>
                                </div>
                                <hr>
                                <div>
                                <form action="payment.php?pid='. $pid.'" method="POST">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="quantity">Quantity </label>
                                        <div class="col d-flex">
                                            <input id="quantity" onchange="QuantityPrice()" name="quantity" placeholder="Qty."
                                                value="100" class="form-control w-100 input-md" required type="number">
                                            <select class="form-control form-select" style="" name="unit" id="unit">
                                                <option value="kilogram">Kilogram</option>
                                                <option value="ton">Ton</option>
                                                <option value="quintal">Quintal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
}else{
    $output .= 'No data found';
}



//payment
$paid = "";
$uid = $_SESSION['userid'];
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$unit = mysqli_real_escape_string($conn, $_POST['unit']);
$saddress = mysqli_real_escape_string($conn, $_POST['saddress']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$state = mysqli_real_escape_string($conn, $_POST['state']);
$zip = mysqli_real_escape_string($conn, $_POST['zip']);
$payprice = mysqli_real_escape_string($conn, $_POST['pay']);
$date = date("Y-m-d");

$qty = $quantity." ".$unit;
$address = $saddress.', '.$city.', '.$state.', '.$zip;

if(isset($_POST['payprice']))
{
    $place_order_query  = "INSERT INTO orders (pid, uid, odate, oaddress, oquantity, oprice) VALUES ('$pid', '$uid', '$date', '$address', '$qty', '$payprice')";
    $place_order_run = mysqli_query($conn, $place_order_query);
    if($place_order_run){
        header('location: PaymentDone.php');
    }
    else{
        echo "Something went Wrong";
    }
}


?>