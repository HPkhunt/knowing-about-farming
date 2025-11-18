<?php 
  session_start();
  if(!isset($_SESSION['name'])){
    header('location: ../LoginSignup\login-user.php');
  }

  error_reporting(0);

//   include "search-logic.php";
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
    <link rel="stylesheet" href="../Subsidy/subsidy.css">


    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Knowing About Farming</title>
</head>

<body>
    <?php include_once '../navbar.php'; ?>

    <div class="container mt-4" style="min-height: 100vh;">
        <div class="search">
            <input type="text" autofocus id="searchInput" name="search" placeholder="Enter here">
            <span><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
        <div class="searchview" id="search_data">

            <div class="customrow d-flex justify-content-center">
                <h4 class='text-muted' style='text-align: center;'>No data Found</h4>

            </div>
        </div>
    </div>


    <script type="text/javascript">
    var searchInput = document.getElementById("searchInput");
    var search_data = document.getElementById("search_data");

    searchInput.onkeyup = () => {
        let searchTerm = searchInput.value;
        if (searchTerm != "") {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./soil-logic.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        search_data.innerHTML = data;
                    }
                }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("searchTerm=" + searchTerm);
        } 
        else{
            nosearchvalue();
        }
    }
    window.onload = nosearchvalue();


    function nosearchvalue() {
        let searchTerm = searchInput.value;
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./soil-logic.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    search_data.innerHTML = data;
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
    }
    </script>



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