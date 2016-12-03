<div class="title">
    <div class="container">
        <h2>Bảng Điều Khiển</h2>
        <p>Trang Quản Lý Hệ Thống</p>
    </div>
    <div class="line"></div>                
</div>
<div class="row tb-thongke">
    <div class="col-md-6 panel">
        <table class="table table-striped table-bordered" cellspacing="0" width="">
            <caption>Thống Kê Doanh Số</caption>
            <tr>
                <th>Doanh số hôm nay: </th>
                <td><?php  echo number_format($theongay[0]->total); ?></td>
            </tr>
            <tr>
                <th>Doanh số theo tháng:</th>
                <td><?php  echo number_format($theothang[0]->total); ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6 panel">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <caption>Thống Kê Đơn Hàng</caption>
            <tr>
                <th>Tổng số đơn hàng: </th>
                <td><?php echo $qty_bill ?></td>
            </tr>
            <tr>
                <th>Tổng số đơn hàng chưa giao:</th>
                <td><?php echo $qty_chua ?></td>
            </tr>
            <tr>
                <th>Tổng số đơn hàng đang giao:</th>
                <td><?php echo $qty_dang ?></td>
            </tr>
        </table>
    </div>
</div><!--.tb-thongke-->
<div class="row">
    <div class="col-md-12 tb-data panel">
        <!--khong hien thi nhung hoa don da thanh toan-->
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <caption>Danh Sách Hóa Đơn</caption>
            <thead>
                <tr>
                    <th>Số HD</th>
                    <th>Tên Khách Hàng</th>
                    <th>Bàn Số</th>
                    <th>Tổng Tiền</th>  
                    <th>Giờ Tạo</th>
                    <th>Tình trạng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $row): ?>  
                <tr>
                    <td><?php echo $row->ID ?></td>
                    <td><?php
                        $khachhang = $this->khachhang_model->getInfoById($row->KHACHHANGID);
                        if (empty($khachhang->TEN)) {
                            echo '';
                        } else {
                            echo $khachhang->TEN;                        
                        }
                    ?></td>
                    <td>
                        <?php if($row->PhucVuID ==2 )
                        {
                            echo 'Giao Hàng'  ;
                        }
                        else {
                            echo $row->BANID;                        
                        }
                        ?>                        
                    </td>
                    <td><?php echo number_format($row->PHIPV + $row->thanhtien) ?></td>
                    <td><?php echo $row->NGAY ?></td>
                    <td>
                         <?php
                            switch ($row->TINHTRANG):
                                case 0:?>
                            <span style="color:#ff0505">Đang Chuẩn Bị</span>
                            <?php break; case 2:?>
                            <span style="color:#000">Đã Giao</span>
                            <?php break; case 1:?>
                            <span style="color:#0571ff">Nấu xong</span>
                            <?php break; default:?>
                            <span style="color:#5cb85c">Đã Thanh Toán</span>
                        <?php endswitch;?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!--.tb-data-->
</div>