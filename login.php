<?php include('h.php');?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    <body>
            <div class="container">
      <div class="row">
        <?php include('banner.php');?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php include('navbar.php');?>
        </div>
      </div>
    </div>
           <?php
            require_once './ConnectDB.php';
            error_reporting(E_ALL ^ E_NOTICE);
            $text = $_REQUEST['text'];
            echo "<CENTER>".$text."</CENTER>";
            ?>
            <?php
            require_once './ConnectDB.php';
            error_reporting(E_ALL ^ E_NOTICE);
            $text = $_REQUEST['text'];
            session_start();
            session_destroy( );
            ?>
            <div class="row" style="padding-top:100px">
        <div class="col-md-4"></div>
    	<div class="col-md-4" style="background-color:#f4f4f4">
                  <h3 align="center">Login</h3>
                  <form ACTION="Check.php"  name="formlogin" method="POST" id="login"  class="form-horizontal">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input  name="user" type="text" required class="form-control" id="admin_user" maxlength="10" placeholder="เบอร์โทร" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input name="pass" type="password" required class="form-control" id="admin_pass" maxlength="20" placeholder="password" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                          <button type="submit" class="btn btn-primary" id="btn" onclick="">Login</button>
                        <p class="message">Not registered? <a href=FormRegister.php?s=2>Create an account</a></p>
                      </div>
                    </div>
                  </form>
    </body>
</html>
