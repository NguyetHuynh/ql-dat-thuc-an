<!doctype html>
<html>
    <head>
        <title>Accounting Dashbroad</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo public_url()?>/style/printpage.css">
    </head>
    <body class="container">
        <div class="panel">
                <button id="btn-print"  class="btn btn-default"><img src="https://maxcdn.icons8.com/office/PNG/40/Printing/print-40.png" title="In Hóa Đơn" width="40">  <span style="font-size: 1.5em">In</span></button>
                <a href="<?php echo base_url('ketoan/home/index'); ?>"><button class="btn btn-primary" id="btn-print-page">Quay Lại</button></a>
            <div class="content">
                <div class="banner">
                    <h2>Nguyệt Huỳnh</h2>
                    <p>20 30/4 - tp.Cần Thơ</p>
                    <p>ĐT: 07103.555666 - 3444777</p>
                </div>
                <div class="info">
                    <h3>PHIẾU GIAO HÀNG</h3>
                    <p><span>Số HD: <?php echo $query[0]->ID ?></span><span style="float: right"> Ngày: <?php echo $query[0]->NGAY ?></span></p>
                    <p><b>Tên Khách Hàng: </b><?php echo $query[0]->ten ?></p>
                    <p><b>Số Điện Thoại: </b><?php echo $query[0]->sodt ?></p>
                    <p><b>Địa chỉ: </b><?php echo $query[0]->diachi ?></p>
                    </div><!--./info-->
                <table class="table">
                    <thead>
                        <tr>
                            <th>TT</th>
                            <th>Tên Món</th>
                            <th>SL</th>
                            <th>Đơn Giá</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($food as $row): ?>
                        <tr>
                            <td><?php echo $i; $i++?></td>
                            <td><?php echo $row->TEN ?></td>
                            <td><?php echo $row->SOLUONG ?></td>
                            <td><?php echo number_format($row->DONGIA) ?></td>
                            <td><?php $total_amount = $row->DONGIA * $row->SOLUONG;
                                        echo number_format($total_amount);
                                ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Phí Vận Chuyển</td>
                            <td colspan="4"><?php echo number_format($query[0]->PHIPV) ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Tổng Số Tiền Thanh Toán</b></td>
                            <td colspan="4"><b><?php $total = $query[0]->thanhtien + $query[0]->PHIPV; echo number_format($total) ?></b></td>                    
                        </tr>
                    </tfoot>
                </table>
                    <div class="sign row">
                        <div class="">
                            <h4>Kế Toán</h4>
                            <p>(Ký và ghi rõ họ tên)</p>
                        </div>
                        <div class="" style="float: right; margin-top: -70px">
                            <h4>Chữ Ký Khách Hàng</h4>
                            <p>(Ký và ghi rõ họ tên)</p>
                        </div>
                    </div>
            </div><!--./content-->
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo public_url()?>/script/jquery.number.min.js"></script>
        <script src="<?php echo public_url()?>/script/main-script.js"></script>
        <script type="text/javascript">
            $('document').ready(function(){
                $('#btn-print').click(function(){
                    printPage();
                });
            });

            function printPage()
            {
                window.print();
            }
            
        </script>
    </body>
</html>
