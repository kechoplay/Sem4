<?php
session_start();
ob_start();
include('../ketnoi.php');

include_once '../quantri/admin_category.php';

include_once '../quantri/admin_product.php';

include_once '../quantri/admin_customer.php';

include_once '../quantri/admin_order.php';

include_once '../quantri/admin_slide.php';

include_once '../quantri/admin_account.php';

include_once '../function.php';

$set_lang=mysql_query("SET NAMES 'utf8'");

if(isset($_SESSION['Name']) && $_SESSION['Pass']){

  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Sơn Tùng</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../js/jquery.min.js" type="text/javascript"></script>

    <script src="../tools/ckeditor/ckeditor.js" type="text/javascript"></script>
  </head>

  <body>

    <div id="wrapper">

      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Admin Area - Sơn Tùng</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
          <!-- /.dropdown -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i><small>Welcome</small> <?php echo $_SESSION['Name'] ?> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="admin_account.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
              </li>
              <li class="divider"></li>
              <li><a href="admin_logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              </li>
            </ul>
            <!-- /.dropdown-user -->
          </li>
          <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

              <li>
                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Thống kê</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="admin_category.php">danh sách danh mục</a>
                  </li>
                  <li>
                    <a href="admin_add_category.php">Thêm danh mục</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
              <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="admin_product.php">Danh sách sản phẩm</a>
                  </li>
                  <li>
                    <a href="admin_add_product.php">Thêm sản phẩm</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
              <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Tài khoản<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                  <a href="admin_account.php">Thông tin cá nhân</a>
                  </li>
                  <li>
                    <a href="admin_customer.php">Danh sách người dùng</a>
                  </li>
                  <li>
                    <a href="admin_user.php">Danh sách nhân viên</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
              <li>
                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Hóa đơn<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="admin_order.php">Danh sách hóa đơn</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
              <li>
                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Slide<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="admin_slide.php">Danh sách slide</a>
                  </li>
                  <li>
                    <a href="admin_add_slide.php">Thêm slide</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
            </ul>
          </div>
          <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
      </nav>
      <?php
    }else{
      header("location:admin_login.php");
    }
    ?>