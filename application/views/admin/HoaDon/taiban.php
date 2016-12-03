<div class="title">
    <div class="container">
        <div class="">
            <h2>Quản Lý Hóa Đơn</h2>
            <p>Danh Sách Hóa Đơn Tại Nhà Hàng</p>
        </div>
    </div>    
    <div class="line"></div>                
</div><!--title-->

<div class="row">
    <div class="col-md-12 tb-data panel">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <caption>Danh Sách Hóa Đơn</caption>
            <thead>
                <tr>
                    <th>Số HD</th>
<!--                    <th>Tên Khách Hàng</th>-->
                    <th>Bàn Số</th>
                    <th>Tổng Tiền</th>                    
                    <th>Tình trạng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $row): ?>  
                <tr>
                    <td><?php echo $row->ID ?></td>
<!--                    <td><?php
//                        $khachhang = $this->khachhang_model->getInfoById($row->KHACHHANGID);
//                        if (empty($khachhang->TEN)) {
//                            echo '';
//                        } else {
//                            echo $khachhang->TEN;                        
//                        }
                    ?></td>-->
                    <td><?php echo $row->BANID ?></td>
                    <td><?php echo number_format($row->PHIPV + $row->thanhtien) ?></td>
                    <td>
                         <?php
                            switch ($row->TINHTRANG):
                                case 0:?>
                            <span style="color:#000">Đang Chuẩn Bị</span>
                            <?php break; case 2:?>
                            <span style="color:#d9534f"><b>Đã Giao</b></span>
                            <?php break; case 1:?>
                            <span style="color:#337ab7">Nấu xong</span>
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