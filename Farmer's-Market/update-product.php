<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['name'])){
        header('location: ../LoginSignup\login-user.php');
      }
    if(!isset($_SESSION['type']) && !($_SESSION['type'] == 'farmer')){
        header('location: /knowingaboutfarming\Pages\Farmer\'s-market\product-list.php');
    }
    include '../navbar.php';

    include 'update-product-logic.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Source+Serif+4&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="../../images\Farming_logo-bg-t (1).png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../../Styles\navbar.css">
    <link rel="stylesheet" href="../Home\home.css">
    <link rel="stylesheet" href="../../Styles\footer.css">
    <link rel="stylesheet" href="./product-list.css">
    <link rel="stylesheet" href="./add-product.css">

    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <title>Knowing About Farming</title>
</head>

<body onload="cate()">
    <div class="container add-product">
        <!-- Form Name -->
        <legend><strong class="text-success">UPDATE PRODUCT</strong></legend>


        <form action="update-product-logic.php?pid=<?php echo $pid ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <fieldset>

                <!-- error -->
                <!-- <div class="form-group">
                    <label class="text-danger"> <span style="font-size: 20px;">*</span> All field are required </label>
                </div> -->



                <!-- Text input-->
                <!-- <div class="form-group">
        <label class="col-md-4 control-label" for="product_id">PRODUCT ID</label>  
        <div class="col">
        <input id="product_id" name="product_id" placeholder="PRODUCT ID" class="form-control w-100 input-md" required="" type="text">
            
        </div>
        </div> -->

                <!-- Text input-->
                <!-- <div class="form-group">
        <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
        <div class="col">
        <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control w-100 input-md" required="" type="text">
            
        </div>
        </div> -->


                <!-- Select category -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_category">PRODUCT CATEGORY <span
                            style="font-size: 20px;">*</span></label>
                    <div class="col">
                        <select id="product_category" name="product_category"
                            class="form-control form-select w-100 form-select" onchange="cate()" ; required>
                            <option value="">--Select--</option>
                            <option value="horticulture" <?php if($output['pcategory'] == 'horticulture') {echo 'selected="selected"';} ?>>Horticulture</option>
                            <option value="food" <?php if($output['pcategory'] == 'food') {echo 'selected="selected"';} ?>>Food</option>
                            <option value="cash" <?php if($output['pcategory'] == 'cash') {echo 'selected="selected"';} ?>>Cash</option>
                            <option value="other" <?php if($output['pcategory'] == 'other') {echo 'selected="selected"';} ?>>Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_type">PRODUCT NAME <span
                            style="font-size: 20px;">*</span></label>
                    <div class="col d-flex ">
                        <select id="product_type" name="product_type"
                            class="form-control form-select w-100 form-select me-2" onchange="cate()" required>
                            <option value="">--Select--</option>
                            <optgroup hidden="hidden" id="food" label="Food">
                                <option value="wheat" <?php if($output['ptype'] == 'wheat') {echo 'selected="selected"';} ?> >wheat</option>
                                <option value="rice" <?php if($output['ptype'] == 'rice') {echo 'selected="selected"';} ?> >rice</option>
                                <option value="other" <?php if($output['ptype'] == 'other') {echo 'selected="selected"';} ?> >Other</option>
                            </optgroup>
                            <optgroup hidden="hidden" id="cash" label="Cash">
                                <option value="sugarcan" <?php if($output['ptype'] == 'sugarcan') {echo 'selected="selected"';} ?> >Sugarcan</option>
                                <option value="oil seed" <?php if($output['ptype'] == 'oil seed') {echo 'selected="selected"';} ?> >oil seed</option>
                                <option value="other" <?php if($output['ptype'] == 'other') {echo 'selected="selected"';} ?> >Other</option>
                            </optgroup>
                            <optgroup hidden="hidden" id="horticulture" label="Horticulture">
                                <option value="Fruit <?php if($output['ptype'] == 'fruit') {echo 'selected="selected"';} ?> ">Fruit</option>
                                <option value="vegitable" <?php if($output['ptype'] == 'vegitable') {echo 'selected="selected"';} ?> >Vegitable</option>
                                <option value="other" <?php if($output['ptype'] == 'other') {echo 'selected="selected"';} ?> >Other</option>
                            </optgroup>
                            <optgroup hidden="hidden" id="other" label="Other">
                                <option value="other" <?php if($output['ptype'] == 'other') {echo 'selected="selected"';} ?> `>Other</option>
                            </optgroup>
                        </select>
                        <input id="product_name" style="width: 50%;" value="<?php echo $output['pname'];?>" name="product_name" placeholder="PRODUCT NAME"
                            class="form-control w-100 input-md" type="text" required />

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_desc">PRODUCT DESCRIPTION <span
                            style="font-size: 20px;">*</span> </label>
                    <div class="col">
                        <textarea id="product_desc" style="height: 120px;" name="product_desc"
                            placeholder="PRODUCT DESCRIPTION " class="form-control w-100 input-md" required
                            type="text"><?php echo $output['pdescription'];?></textarea>

                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="available_quantity">AVAILABLE QUANTITY <span
                            style="font-size: 20px;">*</span></label>
                    <div class="col d-flex">
                        <input id="available_quantity" name="available_quantity" placeholder="AVAILABLE QUANTITY" value="<?php echo $output['pquantity'];?>"
                            class="form-control w-100 input-md" type="number" required />
                        <select class="form-control form-select" style="width: 20%;" name="qty_unit" id="qty_unit">
                            <option value="kilogram" <?php if($output['pquantityunit'] == 'kilogram') {echo 'selected="selected"';} ?> >Kilogram</option>
                            <option value="ton" <?php if($output['pquantityunit'] == 'ton') {echo 'selected="selected"';} ?> >Ton</option>
                            <option value="quintal" <?php if($output['pquantityunit'] == 'quintal') {echo 'selected="selected"';} ?> >Quintal</option>
                        </select>
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="price">PRICE <span
                            style="font-size: 20px;">*</span></label>
                    <div class="col d-flex">
                        <input id="price" name="price" placeholder="PRICE" class="form-control w-100 input-md" value="<?php echo $output['pprice'];?>"
                            type="number" required /><span class="ps-2 pe-2" style="font-size: 28px" > / </span>
                        <select class="form-control form-select" style="width: 20%;" name="price_unit" id="price_unit">
                            <option value="kilogram" <?php if($output['ppriceunit'] == 'kilogram') {echo 'selected="selected"';} ?> >Kilogram</option>
                            <option value="ton" <?php if($output['ppriceunit'] == 'ton') {echo 'selected="selected"';} ?> >Ton</option>
                            <option value="quintal" <?php if($output['ppriceunit'] == 'quintal') {echo 'selected="selected"';} ?> >Quintal</option>
                        </select>
                    </div>
                </div>


                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="image_file">PRODUCT IMAGE(PNG/JPEG/JPG) <span
                            style="font-size: 20px;">*</span></label>
                    <div class="col-md-4">
                        <input id="image_file" name="image_file"  class="input-file" type="file" />
                        <label for="image_file" class="text-danger"><?php echo $image_error?></label>
                    </div>
                </div>


                <!-- Button -->
                <div class="form-group mt-5 ">
                    <!-- <label class="col-md-4 control-label" for="updatebutton">Single Button</label> -->
                    <div class="col-md-4 ">
                        <button id="updatebutton" value="Update_Product" name="updateproduct"
                            class="btn btn-outline-success w-75">Update</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>

    <script>

    form.onsubmit = (e) => {
        e.preventDefault();
    }


    function concate() {
        var price = document.getElementById('price').value;
        var qty_unit = document.getElementById('price_unit').value;
        var priceperqty_unit = price + "/ " + qty_unit;
        alert(priceperqty_unit);
        // var category = document.getElementById('product_category').value;
        // alert(category);
    }


    function cate() {
        var category = document.getElementById('product_category').value;
        var pname = document.getElementById('productname');
        // pname.setAttribute = 0;

        var food = document.getElementById('food');
        var horticulture = document.getElementById('horticulture');
        var cash = document.getElementById('cash');
        var other = document.getElementById('other');

        if (category == 'food') {
            food.removeAttribute("hidden");
            horticulture.setAttribute("hidden", "hidden");
            cash.setAttribute("hidden", "hidden");
            other.setAttribute("hidden", "hidden");
            pname.selectedIndex != 0;

        } else if (category == 'horticulture') {
            food.setAttribute("hidden", "hidden");
            horticulture.removeAttribute("hidden");
            cash.setAttribute("hidden", "hidden");
            other.setAttribute("hidden", "hidden");
        } else if (category == 'cash') {
            food.setAttribute("hidden", "hidden");
            horticulture.setAttribute("hidden", "hidden");
            cash.removeAttribute("hidden");
            other.setAttribute("hidden", "hidden");

        } else {
            food.setAttribute("hidden", "hidden");
            horticulture.setAttribute("hidden", "hidden");
            cash.setAttribute("hidden", "hidden");
            other.removeAttribute("hidden");
        }
    }
    </script>


    <?php include '../footer.html'; ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>