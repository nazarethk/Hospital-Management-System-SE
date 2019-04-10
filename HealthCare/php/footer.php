    <div class="container footer" style="margin-top:-15px;">
      <hr>
      <footer>
        <h5 align="center">
        <?php
               if(basename($_SERVER['PHP_SELF']) == 'staff.php'||basename($_SERVER['PHP_SELF']) == 'admin_home.php'||basename($_SERVER['PHP_SELF']) == 'register.php'){
               echo '<a class="nav-link" href="index.php">Home</a>
                  </li>';
               }
        ?>
        </h5>
        <h5 align="center" style="font-style: oblique;">
        <?php
        if (!isset($_SESSION['username'])&&basename($_SERVER['PHP_SELF']) == 'staff.php') {
          
                   echo '<p style="font-style: oblique;">For security reasons, in order to gain access to admin panel, <a href="mailto:admin@healthcare.com">contact us!</a></p>';
                    }
                  ?>
        Made and managed by Nazareth Keshishian & Jimmy Khalil - <?php echo date('Y'); ?>
        </h5>
      </footer>
    </div>
  </body>
</html>
