<?php
require("../includes/db_info.php");
$stmt=$mysqli->prepare('SELECT id ,fullname , position, office, age , date, salary FROM employees');
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$name,$position,$office,$age,$date,$salary);



?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HR Admin</title>

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

        <a class="navbar-brand mr-1" href="" >Admin HR System</a>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <form method="POST" action="../employee/logout.php">
             
              <input type="submit" style="background-color:#343a40;color: white;border:0px;"  value="Logout"/><i class="fas fa-user-circle fa-fw"></i>
              
            </form>
          
          </a>
        </li>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown"> 
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
      </ul>

    </nav>

    


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              <tbody>
              Employees</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>


                    <?php while($stmt->fetch()){

                    ?>
                    <tr>
                      <td><a href="../employee/employee.php?id=<?=$id?>"><?=$name?> </a></td>
                      <td><?=$position?></td>
                      <td><?=$office?></td>
                      <td><?=$age?></td>
                      <td><?=$date?></td>
                      <td>$<?=$salary?></td>
                      
                    </tr>
                    <?php }?>
                    
                  </tbody>
                </table>
              </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        <h4>Add Employee</h4>
        <div class="row">
        <div class="col-sm-3">
          <form method="POST" action="register.php" >
            <div class="form-group">
              <div class="icon"><span class="ion-ios-calendar"></span></div>
              <input type="text" name="email" class="form-control appointment_date" placeholder="Email"required>
            </div>    
          </div>
          <div class="col-sm-2">
              <div class="form-group">
                <div class="icon"><span class="ion-ios-calendar"></span></div>
                <input type="password" name="password" class="form-control appointment_date" placeholder="********"required>
              </div>    
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                  <div class="icon"><span class="ion-ios-calendar"></span></div>
                  <input type="text" name="speciality" class="form-control appointment_date" placeholder="Enter Speciality"required>
                </div>    
              </div>
              <div class="col-sm-2">
                  <div class="form-group">
                    <div class="icon"><span class="ion-ios-calendar"></span></div>
                    <input type="text" name="phonenumber" class="form-control appointment_date" placeholder="phone number" required>
                  </div>    
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <div class="icon"><span class="ion-ios-clock"></span></div>
                    <input type="text" name="bloodtype" class="form-control appointment_time" placeholder="bloodtype, ex: A+" required>
                  </div>
                </div>
        </div>
        <div class="row">
          <div class="col-sm-2">
          <form method="POST" action="register.php" >
            <div class="form-group">
              <div class="icon"><span class="ion-ios-calendar"></span></div>
              <input type="text" name="name" class="form-control appointment_date" placeholder="Full Name"required>
            </div>    
          </div>
          <div class="col-sm-2">
              <div class="form-group">
                <div class="icon"><span class="ion-ios-calendar"></span></div>
                <input type="text" name="position" class="form-control appointment_date" placeholder="Position"required>
              </div>    
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                  <div class="icon"><span class="ion-ios-calendar"></span></div>
                  <input type="text" name="office" class="form-control appointment_date" placeholder="Office"required>
                </div>    
              </div>
              <div class="col-sm-2">
                  <div class="form-group">
                    <div class="icon"><span class="ion-ios-calendar"></span></div>
                    <input type="number" name="age" class="form-control appointment_date" placeholder="Age" required>
                  </div>    
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <div class="icon"><span class="ion-ios-clock"></span></div>
                    <input type="date" name="date" class="form-control appointment_time" placeholder="Start date" required>
                  </div>
                </div>
          <div class="col-sm-2">
            <div class="form-group">
              <div class="icon"><span class="ion-ios-calendar"></span></div>
              <input type="number" name="salary" class="form-control appointment_date" placeholder="Salary" required>
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
