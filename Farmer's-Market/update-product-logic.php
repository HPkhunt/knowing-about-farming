<?php
session_start();
include_once '../config.php';

error_reporting(0);
$pid = $_GET['pid'];

if(isset($pid)){
    $get_product_detail_query = "SELECT * FROM product WHERE pid = '{$pid}'";
    $get_product_detail_run = mysqli_query($conn, $get_product_detail_query);
    
    if(mysqli_num_rows($get_product_detail_run) > 0){
        while ($product_detail = mysqli_fetch_assoc($get_product_detail_run)) {
            $output = $product_detail;

        }        
    }
    else{
        echo "Some thing went wrong";
    }
}
    //update
if(isset($_POST['updateproduct'])){
    
    $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_type = mysqli_real_escape_string($conn, $_POST['product_type']);
    $product_desc = mysqli_real_escape_string($conn, $_POST['product_desc']);
    $available_quantity = mysqli_real_escape_string($conn, $_POST['available_quantity']);
    $qty_unit = mysqli_real_escape_string($conn, $_POST['qty_unit']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $price_unit = mysqli_real_escape_string($conn, $_POST['price_unit']);


    if($_FILES['image_file']['name'] != ""){
        $img_name =  $_FILES['image_file']['name'];
        $img_type = $_FILES['image_file']['type'];
        $tmp_name = $_FILES['image_file']['tmp_name'];
        $old_image = 'image/'.$output['pimage'];

        //expload image and check its jpg,png etc.
        $img_expload = explode('.',$img_name);
        $img_ext = end($img_expload);

        $extensions = ['png', 'jpeg', 'jpg'];
        if(in_array($img_ext, $extensions) === true) {
            $time = time();
            $new_img_name = $time.$img_name;
            $uid = $_SESSION['userid'];

            if(move_uploaded_file($tmp_name, "image/".$new_img_name) && unlink($old_image)) {
                //insert all data in table
                $updateproduct_query = "UPDATE product SET uid = '$uid', pname = '$product_name', 
                                                        ptype = '$product_type', 
                                                        pdescription = '$product_desc', 
                                                        pcategory = '$product_category', 
                                                        pprice = '$price', 
                                                        ppriceunit = '$price_unit', 
                                                        pquantity = '$available_quantity', 
                                                        pquantityunit = '$qty_unit',
                                                        pimage = '$new_img_name' WHERE pid = '{$pid}'";
                $updateproduct_run = mysqli_query($conn, $updateproduct_query);
                if($updateproduct_run) {
                    // echo "done";
                    header('location: product-list-farmer.php');
                }
                else{
                    echo 'Some thing went wrong';
                }
            }
        } else {
            $image_error = "*Please select an Image file - jpeg, png, jpg!!!";
        }
    }
    else{
        $uid = $_SESSION['userid'];
        //insert all data in table
        $updateproduct_query = "UPDATE product SET uid = '$uid', 
                                            pname = '$product_name', 
                                            ptype = '$product_type', 
                                            pdescription = '$product_desc', 
                                            pcategory = '$product_category', 
                                            pprice = $price, 
                                            ppriceunit = '$price_unit', 
                                            pquantity = '$available_quantity', 
                                            pquantityunit = '$qty_unit' WHERE pid = '$pid'";
        $updateproduct_run = mysqli_query($conn, $updateproduct_query);
        if($updateproduct_run) {
            // echo "done";
            header('location: product-list-farmer.php');
        }
        else{
            echo 'Some thing went wrong';
        }
    }
}


 

?>