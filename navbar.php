<?php     error_reporting(0); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
  <!-- Container wrapper -->
  <div class="container-fluid align-item-center">


    <a class="navbar-brand ms-3" id="big" href="#">
      <img src="/KnowingAboutFarming/images/Farming-logo.png" 
            alt="Knowing About Farming Logo" 
            loading="lazy"  
      />
    </a>
    <!-- <a class="navbar-brand" id="small"  href="">
      <img src="/KnowingAboutFarming/images/Farming_logo-bg-t (1).png"
            alt="Knowing About Farming Logo" 
            loading="lazy" 
      />
    </a> -->
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div id="toaster"></div>

    <div class="collapse navbar-collapse justify-content-end m-3" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/KnowingAboutfarming/Pages/Home/Home.php">Home</a>
        </li>
        <li class="nav-item">
          <?php
          if(isset($_SESSION['type']) && $_SESSION['type'] == 'farmer'){
            echo '<a class="nav-link" href="/KnowingAboutfarming/Pages/Farmer\'s-Market/product-list-farmer.php">Farmer\'s Market</a>';
          }else{
            echo '<a class="nav-link" href="/KnowingAboutfarming/Pages/Farmer\'s-Market/product-list.php">Farmer\'s Market</a>'; 
          }
          ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/KnowingAboutfarming/Pages/Search/soil.php" >Soil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/KnowingAboutfarming/Pages/Subsidy/subsidy.php">Subsidy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/KnowingAboutfarming/Pages/NewTechnique/new.php">New-Technique</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Language
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">English</a></li>
            <li><a class="dropdown-item" href="#">Gujarati</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item last" href="#">Default</a></li>
          </ul>
        </li> -->
        <li class="nav-item">
        <?php
            if(isset($_SESSION['name']))          
            {
              echo '<a href="#" class="nav-link"><i class="fa fa-user-circle me-2"></i><b>'.$_SESSION['name']. '</b></a> ';
            }
          ?>
        </li>

        <li class="nav-item">
          <?php
            if(isset($_SESSION['name']))
            {
              echo '<a href="/KnowingAboutfarming/Pages/LoginSignup/logout-user.php" class="nav-link p-0"><button class="btn btn-outline-success"
              type="submit">Logout</button></a>';
            }
            else{
              echo '<a href="/KnowingAboutfarming/Pages/LoginSignup/login-user.php" class="nav-link p-0"><button class="btn btn-outline-success"
              type="submit">Login</button></a>';
            }
          ?>
          <!-- <a href="/KnowingAboutfarming/Pages/LoginSignup/signup-user.php" class="nav-link p-0"><button class="btn btn-outline-success"
              type="submit">Login/SignUp</button></a> -->
        </li>
      </ul>
    </div>

  </div>
  
  <!-- Container wrapper -->
</nav>