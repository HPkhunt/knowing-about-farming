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
    include 'product-detail-logic.php';

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

    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Knowing About Farming</title>
</head>

<body>
    <div class="container mt-4 d-flex justify-content-center" style="min-height: 100vh" ;>

        <div class="card mb-3" style="max-width: 840px; height: -webkit-fill-available">
            <div class="row g-0">
                <?php echo $output; ?>
                <!-- <div class="col-md-4">
                      <img src="http://cdn.shopify.com/s/files/1/0722/2059/files/groundnut_600x600.jpg?v=1629194817" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                          <h2 class="card-title">Cotton <span> (Wheat)</span></h2>
                          <h5><i class="fa fa-inr" aria-hidden="true"></i>200 / Ton</h3>
                          <hr>
                          <h5>Description</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aliquid architecto maxime totam. Veniam enim totam nesciunt. Iusto reiciendis eligendi repudiandae culpa excepturi suscipit accusantium ex, sed inventore voluptatem. Dignissimos!</p>
                          <hr> <button type="button" class="btn btn-outline-success w-100">Buy Now</button>
                      </div> -->
            </div>
        </div>
    </div>
    </div>
    </div>


    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Login first</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body alert alert-warning m-0">
                    <div class="d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            Need to Login/Signup to Buy this.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="/KnowingAboutfarming/Pages/LoginSignup/signup-user.php"><button type="button" class="btn btn-outline-success">Login/SignUp</button></a>
                </div>
            </div>
        </div>
    </div>


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