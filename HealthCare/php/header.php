<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title> HealthCare Medical Center
    </title>
    <link rel="shortcut icon" type="image/png" href="../images/Caduceus-256.png"/>
     <link href="../bootstrap.min.css" rel="stylesheet">
    
  </head>
  <body style="background-image: linear-gradient(to bottom right,#ffffff 0%, #2cbcbc 100%);">
      <div class="container" style="padding-top: 10px;">
        <nav class="navbar navbar-static-top" style="display: flex; justify-content: center;display: flex;">
          	
          <ul class="nav nav-pills">
          <a class="navbar-brand" style="margin-top:-12px;margin-bottom:10px;padding: 11px 13px;" href="../index.html">Health<span>Care</span></a>
          
              <li class="nav-item">
                <a class="" href="https://goo.gl/GrHFNw" target="_blank"> <img src="../images/loc.png" style="max-width:5%;padding-right: 5px;"alt=""> HealthCare Medical Center, Beirut Lebanon</a>
              </li>
              <li class="nav-item">
                <a class="" href="tel:+96171531019"><i class="fa fa-ambulance" style="padding-right: 5px;" aria-hidden="true"></i>Ambulance Number: +961 71531019</a>
              </li>
              <?php
                if (isset($_SESSION['username'])) {
                    echo '<a class="" href="logout.php" style="align-items: right;"> <button class="btn btn-danger" style="margin-top: -6px;margin-left: 21px;" >Logout
                  </button></a>';
                }
              ?>
            </ul>
        </nav>
        </div>
  </body>
  </html>