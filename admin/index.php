<?php

include("admin_header.php");

$objproduct=new Product();
$objord=new Orders();
$objcus=new Customer();

$where=" where ord_status=0";
$countord=$objord->listOrder($where);
$countpro=$objproduct->listProduct();
$countcus=$objcus->getListCustomer();
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Bảng điều khiển <small>Thống kê</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Bảng điều khiển
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-product-hunt fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=count($countpro)?></div>
                                <div>Sản phẩm</div>
                            </div>
                        </div>
                    </div>
                    <a href="admin_product.php">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=count($countord) ?></div>
                                <div>Hóa đơn</div>
                            </div>
                        </div>
                    </div>
                    <a href="admin_order.php">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=count($countcus) ?></div>
                                <div>Khách hàng</div>
                            </div>
                        </div>
                    </div>
                    <a href="admin_customer.php">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>Support Tickets!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
        <!-- /.row -->

        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                    </div>
                    <div class="panel-body">
                        <div id="morris-area-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    --><!-- /.row -->

    <div class="row">

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Giao dịch</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ngày</th>
                                    <th>Giờ</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($countord as $key => $value) {
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $date=date_create($value['ord_date']);
                                    $hour=date_create($value['ord_date'])
                                    ?>
                                    <tr>
                                        <td><?=$value['ord_id'] ?></td>
                                        <td><?=date_format($date,'d-m-Y') ?></td>
                                        <td><?=date_format($date,'H:i:s') ?></td>
                                        <td><?=number_format($value['total']) ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<?php

include("admin_footer.php");

?>
