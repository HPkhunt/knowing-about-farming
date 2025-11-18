<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['name'])){
        header('location: ../LoginSignup\login-user.php');
      }
    if(isset($_SESSION['type']) && $_SESSION['type'] == 'farmer')
    {
        header('location: product-list-farmer.php');
    }
    include '../navbar.php';
    include 'product-list-logic.php';

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../../Styles\navbar.css">
    <link rel="stylesheet" href="../Home\home.css">
    <link rel="stylesheet" href="../../Styles\footer.css">
    <link rel="stylesheet" href="./product-list.css">

    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Knowing About Farming</title>
  </head>
  <body>
    <div class="container mt-4" style="min-height: 100vh";>

    <div class="mt-3 mb-3 d-flex justify-content-between align-items-center">
        <h2 class="text-success">Product List</h2>
    </div>
        <div class="row row-cols-1 row-cols-md-5 g-5">
        <?php echo $output; ?>
            <div class="col">
                <div class="card h-100 mi-card">
                    <div class="imagecover">
                <img src="https://www.world-grain.com/ext/resources/Article-Images/2020/02/Wheat_photo-cred-Adobe-stock_E-2.jpg?height=635&t=1582297332&width=1200" class="card-img-top productImage" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Wheat</h5>
                    <p class="card-text"><b><i class="fa fa-inr" aria-hidden="true"></i> 50/</b><span class="text-muted"> Kilogram</span></p>
                    <small class="d-flex align-items-center"><i class="fa fa-check-circle-o fs-5 pe-1 text-success"></i> Vikas Patel</small>
                    <small class="text-muted">Rajkot, Gujarat</small>
                    <hr> <button type="button" class="btn btn-outline-warning w-100">More</button>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 mi-card">
                    <div class="imagecover">
                <img src="" class="card-img-top productImage" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Cotton</h5>
                    <p class="card-text"><b><i class="fa fa-inr" aria-hidden="true"></i> 65/</b><span class="text-muted"> Kilogram</span></p>
                    <small class="d-flex align-items-center"><i class="fa fa-check-circle-o fs-5 pe-1 text-success"></i> Ramesh Prajapati</small>
                    <small class="text-muted">Morbi, Gujarat</small>
                    <hr> <button type="button" class="btn btn-outline-warning w-100">More</button>
                </div>
                </div>
            </div>
            <!-- <div class="col">
                <div class="card h-100 mi-card">
                    <div class="imagecover">
                <img src="http://cdn.shopify.com/s/files/1/0722/2059/files/groundnut_600x600.jpg?v=1629194817" class="card-img-top productImage" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Card title</h5>
                    <p class="card-text"><b><i class="fa fa-inr" aria-hidden="true"></i> 200/</b><span class="text-muted"> Kilogram</span></p>
                    <small class="d-flex align-items-center"><i class="fa fa-check-circle-o fs-5 pe-1 text-success"></i> Vikas patel</small>
                    <small class="text-muted">Rajkot, Gujarat</small>
                    <hr> <button type="button" class="btn btn-outline-warning w-100">More</button>
                </div>
                </div>
            </div> -->
        </div>
    </div>


<?php include '../footer.html'; ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>