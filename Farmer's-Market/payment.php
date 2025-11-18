<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['name'])){
        header('location: product-list.php');
    }
    if(isset($_SESSION['type']) && $_SESSION['type'] == 'farmer')
    {
        header('location: product-list-farmer.php');
    }
    include '../navbar.php';
    include 'payment-logic.php';
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
    <!-- <link rel="stylesheet" href="./product-list.css"> -->
    <link rel="stylesheet" href="./payment.css">


    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Knowing About Farming</title>
</head>

<body onload="QuantityPrice()">
    <div class="container orderContainer mt-4" style="min-height: 100vh" ;>

        <div class="mt-3 mb-3 d-flex justify-content-between align-items-center">
            <h3 class="text-success">Order</h3>
        </div>
        <div class="row row-cols-1 row-cols-md-5 g-5"><?php  echo $output; ?>
            <!-- <div class="col-3">
                <div class="card h-100 mi-card">
                    <div class="imagecover">
                        <img src="https://gumlet.assettype.com/freepressjournal/import/2016/10/wheat-protein-skin-care-cosmetiqo.jpg?format=webp&w=400&dpr=2.6"
                            alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Wheat</h5>
                        <p class="card-text"><b><i class="fa fa-inr" aria-hidden="true"></i> 200/</b><span
                                class="text-muted"> Ton</span></p>
                        <small class="d-flex align-items-center"><i
                                class="fa fa-check-circle-o fs-5 pe-1 text-success"></i> Vikas patel</small>
                        <small class="text-muted">Rajkot, Gujarat</small>
                        <hr>
                        <div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="available_quantity">Quantity </label>
                                <div class="col d-flex">
                                    <input id="available_quantity" name="available_quantity" placeholder="Qty."
                                        value="100" class="form-control w-100 input-md" required="" type="number">
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
            </div> -->
            <div class="col-6">
                <div class="card p-3">
                    <h6 class="text-uppercase">Payment details</h6>
                    <div class="inputbox mt-3"> <input type="text" name="cname" class="form-control" required>
                        <span>Name on card</span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2"> <input type="number" name="cnumber" class="form-control"
                                    required> <i class="fa fa-credit-card"></i> <span>Card Number</span> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="edate" class="form-control"
                                        required> <span>Expiry</span> </div>
                                <div class="inputbox mt-3 mr-2"> <input type="number" name="cvv" class="form-control"
                                        required> <span>CVV</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <h6 class="text-uppercase">Billing Address</h6>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="saddress" class="form-control"
                                        required> <span>Street Address</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="city" class="form-control"
                                        required> <span>City</span> </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="state" class="form-control"
                                        required> <span>State/Province</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="number" name="zip" class="form-control"
                                        required> <span>Zip Code</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card p-3 mb-3"> <span>You have to pay</span>
                    <div class="d-flex flex-row align-items-end mb-3">
                        <h1 class="mb-0 yellow">&#8377<span id="payprice"></span></h1>
                    </div>
                    <hr>
                    <div class="mt-4 mb-4 d-flex justify-content-between w-100">
                        <input type="text" name="pay" value="" id="pay" hidden>
                        <button name="payprice" value="payprice" class="btn btn-success px-3" data-bs-toggle="modal" data-bs-target="#">Pay
                        &#8377<span id="payy"></span> </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
<button onclick="Paid()"></button>

    <div class="modal" tabindex="-1" id="SuccessModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Completed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Congratularions!!</p>
                    <p>Your order is place.</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary">Done</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        
    function QuantityPrice() {
        var quantity = document.getElementById('quantity').value;
        var price = quantity * <?php echo $price?>;
        document.getElementById('pay').value = price;
        document.getElementById('payy').innerHTML = price;
        document.getElementById('payprice').innerHTML = price;
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