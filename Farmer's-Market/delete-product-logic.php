<?php
session_start();
include_once '../config.php';
if(!isset($_SESSION['name'])){
    header('location: ../LoginSignup\login-user.php');
  }
error_reporting(0);
$pid = $_GET['pid'];
$uid = $_SESSION['userid'];
if(isset($pid)){

    $get_product_detail_query = "SELECT * FROM product WHERE pid = '{$pid}'";
    $get_product_detail_run = mysqli_query($conn, $get_product_detail_query);
    $product_detail = mysqli_fetch_assoc($get_product_detail_run);
    $old_image = 'image/'.$product_detail['pimage'];
    if(unlink($old_image)){
        $delete_product_query = "DELETE FROM product WHERE pid = '{$pid}' and uid = '$uid'";
        $delete_product_run = mysqli_query($conn, $delete_product_query);
        
        if($delete_product_run){
                header('location: product-list-farmer.php');
        }
        else{
            echo "Some thing went wrong";
        }
    }
}

?>