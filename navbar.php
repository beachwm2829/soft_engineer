<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">หน้าหลัก</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <?php 
                      echo '<li><a href="information.php">ข้อมูลส่วนตัว</a></li>';
            ?>
          <li>
              <?php 
                  echo '<a href="login.php">Login</a>';
                  ?>
          </li>
        </ul>
        <form class="navbar-form navbar-left" name="qp" action="index.php" method="GET">
        <div class="form-group"> &nbsp; 
        <b>  ค้นหาสินค้า  </b> 
          <input type="text" class="form-control" placeholder="ระบุคำค้น" name="q">
        </div>
        <button type="submit" class="btn btn-info">ค้นหา</button>
      </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
