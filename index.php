<?php include('h.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        input[type=number]{
          width:40px;
          text-align:center;
          color:red;
          font-weight:600;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <?php include('navbar.php');?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php include('banner.php');?>
        </div>
      </div>
    </div>
    <!--start show  product-->
    <div class="container">
      <div class="row">
        <!-- categories-->
        <div class="col-md-2">
          <?php include('category.php');/*หมวดสินค้า*/?> 
        </div>
        <!-- product-->
        <div class="col-md-10">
          <div class="panel panel-info">
            <div class="panel-heading"> รายการสินค้า
              <a href="index.php" class="btn btn-info btn-xs"> ทั้งหมด </a>  </div>
            </div>
           <?php
                      $t_id='';
                      $t_id = $_REQUEST['tid'];
                      $q = $_GET['q'];
                      $n = explode(" ", $q);
                      if($t_id !=''){
                      include('listprd_by_type.php');
                      }else if($n!=''){
                            include('listprd_by_q.php');
                      }
           ?> 
          </div>
        </div>
      </div>
      <!--end show  product-->
    </body>
  </html>
  <?php  include('f.php');?>