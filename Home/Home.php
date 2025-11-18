<?php 
  session_start();
  error_reporting(0);
  if(!isset($_SESSION['name'])){
    header('location: ../LoginSignup\login-user.php');
  }
  if (isset($_SESSION['loginsuccess'])) {
    echo "<script>var message = 'Login successful!';</script>";
    unset($_SESSION['loginsuccess']);
   }

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
    <link rel="shortcut icon" href="/images/Farming_logo-bg-t (1).png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="../../Styles/navbar.css">
    <link rel="stylesheet" href="../../Styles/footer.css">

    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <style>
   #toaster {
      position: fixed;
      top: 3%;
      left: 35%;
      padding: 10px;
      background-color: ;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0px 0px 5px #ccc;
      display: none;
      color: #57a639;
      font-size: 18px;
      font-weight: bold;
      margin: 0;
   }
   
</style>
    <title>Knowing About Farming</title>
  </head>
  <body>
    <?php include_once '../navbar.php'; ?>
    

   
          <!-- Bottom Arrow -->
            <div class="wrapper">
              <a href="#explore"> 
                <div class="arrow">
                  <ul>
                    <li></li>
                    <li></li>
                  </ul>
                </div>
              </a>
            </div>
          </div>
      </div>
    </div>

    
    
    </div>
    <div class="container home-main">
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <?php
          if (isset($_SESSION['type']) && $_SESSION['type'] == 'farmer') {
            echo '<a href="../Farmer\'s-Market\product-list-farmer.php">';
          }
          else{
            echo '<a href="../Farmer\'s-Market\product-list.php">';
          }
          ?>
            <div class="card h-100 bg-dark text-white ">
              <img src="https://img.freepik.com/photos-gratuite/agriculteur-secouant-main-ses-clients_13339-142788.jpg?size=626&ext=jpg" class="card-img img-fluid" alt="...">
              <div class="card-img-overlay">
                <h3 class="card-title">FARMER'S MARKET</h3>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="../Subsidy/subsidy.php">
            <div class="card  h-100 bg-dark text-white">
              <img src="https://assets.thehansindia.com/h-upload/2021/02/07/1029549-budget.webp" class="card-img img-fluid" alt="...">
              <div class="card-img-overlay text-center">
                <h3 class="card-title">SUBSIDY</h3>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="../Search/soil.php">
            <div class="card h-100 bg-dark text-white">
              <img src="https://www.fundacionmapfre.org/media/premios-ayudas/premios/premios-fundacion-mapfre-innovacion-social/tendencias/agua-tierra-768x520-1.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h3 class="card-title">SOIL</h3>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="../NewTechnique/new.php">
            <div class="card h-100 bg-dark text-white">
              <img src="https://img.freepik.com/premium-photo/green-enargy_866495-1.jpg?w=360" class="card-img" alt="...">
            
              <div class="card-img-overlay">
                <h3 class="card-title">NEW TECHNIQUE</h3>
              </div>
            </div>
          </a>       
        </div>
      </div>
    </div>


    <!-- Quote -->
    <section class="py-5">
    <div class="container-fluid quote">
        <div class="row">
            <div class="col-lg-10 mx-auto">

                <!-- CUSTOM BLOCKQUOTE -->
                <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                    <div class="blockquote-custom-icon  shadow"><i class="fa fa-quote-left "></i></div>
                    <p class="mb-0 mt-2 font-italic">“The soil is the great connector of lives, the source and destination of all. It is the healer and restorer and resurrector, by which disease passes into health, age into youth, death into life. Without proper care for it we can have no community, because without proper care for it we can have no life.” </p>
                    <footer class="blockquote-footer pt-4 mt-4 "> Wendell Berry
                    </footer>
                </blockquote><!-- END -->

            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <?php include_once "../footer.html" ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script>
    if (message) {
      $('#toaster').text(message);
      $('#toaster').fadeIn().delay(3000).fadeOut();
    }
    </script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>