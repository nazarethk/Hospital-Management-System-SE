<?php
require("../includes/db_info.php");

  if(isset($_GET['id']))
  {
    $ids=$_GET['id'];
    $stmt=$mysqli->prepare('SELECT id ,fullname , position, office, age , date, salary FROM employees where id=?');
    $stmt->bind_param("i",$ids);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id,$name,$position,$office,$age,$date,$salary);
    $stmt->fetch();




    $stmt1=$mysqli->prepare('SELECT date ,start_time , end_time FROM employee_attend where employee_id=?');
    $stmt1->bind_param("i",$ids);
    $stmt1->execute();
    $stmt1->store_result();
    $stmt1->bind_result($date1,$arr,$leave);
    
  }
  else
  {
    header("Location: ../main/home.php");
  }





?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employee</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="../main/home.php" >Admin HR System</a>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <h6>Name: <?=$name?> </h6>
              <h6>Age: <?=$age?> </h6>
              <h6>Office: <?=$office?> </h6>
              <h6>Position: <?=$position?> </h6>
              <h6>Salary: <?=$salary?>$ </h6> 
              <a href="../main/home.php"><?=$id?> </a>
              <form method="POST" action="delete_employee.php">
              <input style="display:none;" type="text" name="DeleteEmp" value="<?=$id?>">
              <input type="submit" style="color:red;" class="btn btn-light right"  value="Delete Employee"/>
              
            </form>
              
          
          
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>                      
                      <th>Date</th>
                      <th>Start time</th>
                      <th>End time</th>
                    </tr>
                  </thead>
                    <tbody>
                  <?php while($stmt1->fetch()) { ?>
                    <tr>
                      <td><?=$date1?></td>
                      <td><?=$arr?></td>
                      <td><?=$leave?></td>
                    </tr>
                    
                  <?php } ?>
                  </tbody>
                </table>
              </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        <form method="POST" action="register.php?id=<?=$ids?>">
        <h3>Add Time</h3>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <div class="icon"><span class="ion-ios-calendar"></span></div>
                <h4>Date</h4><input type="date" name="date" class="form-control appointment_date" placeholder="Date"required>
              </div>    
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <div class="icon"><span class="ion-ios-calendar"></span></div>
                <h4>Start Time</h4><input type="time" name="arrival" class="form-control appointment_date" placeholder="Arrival Time"required>
              </div>    
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <div class="icon"><span class="ion-ios-clock"></span></div>
               <h4>End Time</h4> <input type="time" name="leave" class="form-control appointment_time" placeholder="Leave Time" required>
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-light right" value="Submit"/>
        </div>
      </form>
        <!-- Sticky Footer -->
        </footer>


      

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
