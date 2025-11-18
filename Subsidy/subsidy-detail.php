<?php 
  session_start();
  if(!isset($_SESSION['name'])){
    header('location: ../LoginSignup\login-user.php');
  }
  error_reporting(0);

  include 'subsidy-detail-logic.php';
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
    <link rel="shortcut icon" href="/bullets/Farming_logo-bg-t (1).png" type="bullet/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="../../Styles/navbar.css">
    <link rel="stylesheet" href="../../Styles/footer.css">
    <!-- <link rel="stylesheet" href="../NewTechnique/new.css"> -->
    <link rel="stylesheet" href="../Subsidy/subsidy-detail.css">



    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Knowing About Farming</title>
</head>

<body>
    <?php include_once '../navbar.php'; ?>

    <div class="container main mt-4">
        <?php echo $output; ?>
        <!-- <div class="techheading">
            <h2>Multilayer data</h2>
        </div>
        <hr>
        <div class="info">
            <div class="infobody ">
                <h4 class="infoheading">Red Soil</h4>
                <hr>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore, eveniet error fugiat ullam,
                    ex molestias, amet neque at reiciendis alias nisi nemo pariatur quod eius itaque in. Modi, delectus.
                </p>
            </div>
            <div class="sourcelink">
                <h5 class="linkheading">For more detailed check out below link</h5>
                <hr>
                <h6 class="linkurl">
                    <a href="https://krishijagran.com/agriculture-world/earn-10-lakhs-in-a-year-with-only-1-acre-of-farming-land/"
                        target="_blank">https://krishijagran.com/agriculture-world/earn-10-lakhs-in-a-year-with-only-1-acre-of-farming-land/</a>
                </h6>
            </div>
        </div> -->
    </div>

    <!-- Footer -->
    <?php include_once "../footer.html" ?>


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