<?php
session_start();
if(!isset($_SESSION['name'])){
    header('location: ../LoginSignup\login-user.php');
  }
include_once '../config.php';

if(isset($_POST['addproduct'])){
    $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_type = mysqli_real_escape_string($conn, $_POST['product_type']);
    $product_desc = mysqli_real_escape_string($conn, $_POST['product_desc']);
    $available_quantity = mysqli_real_escape_string($conn, $_POST['available_quantity']);
    $qty_unit = mysqli_real_escape_string($conn, $_POST['qty_unit']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $price_unit = mysqli_real_escape_string($conn, $_POST['price_unit']);

    //merge price
    

    if(isset($_FILES['image_file'])){
        $img_name =  $_FILES['image_file']['name'];
        $img_type = $_FILES['image_file']['type'];
        $tmp_name = $_FILES['image_file']['tmp_name'];

        //expload image and check its jpg,png etc.
        $img_expload = explode('.',$img_name);
        $img_ext = end($img_expload);

        $extensions = ['png', 'jpeg', 'jpg'];
        if(in_array($img_ext, $extensions) === true) {
            $time = time();
            $new_img_name = $time.$img_name;
            $uid = $_SESSION['userid'];

            if(move_uploaded_file($tmp_name, "image/".$new_img_name)) {
                //insert all data in table
                $addproduct_query = "INSERT INTO product (uid, pname, ptype, pdescription, pcategory, pprice, ppriceunit, pquantity, pquantityunit, pimage)
                VALUES('$uid', '$product_name', '$product_type', '$product_desc', '$product_category', '$price', '$price_unit', '$available_quantity', '$qty_unit', '$new_img_name')";
                $addproduct_insert = mysqli_query($conn, $addproduct_query);
                if($addproduct_insert) {
                    echo "done";
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
}

?>