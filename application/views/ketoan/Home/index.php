<header>
    <div class="navbar">
        <div class="container">
<!--            <div class="nav navbar-nav nav-brand">
                <h3>Nguyệt Huỳnh</h3>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a href="<?php //echo admin_url('nhanvien/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng Xuất</a>
            </div>-->
            
            <nav class="navbar navbar-inverse myNav">
                <div class="container-fluid">
                    
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url('ketoan/home') ?>">Nguyệt Huỳnh</a>
                    </div>

                        
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url('ketoan/home') ?>">Giao Hàng<span class="sr-only">(current)</span></a></li>
                        <li><a href="<?php echo base_url('ketoan/home/taiban') ?>">Tại Bàn</a></li>

                      </ul>

                      <ul class="nav navbar-nav navbar-right">
                          <li><a href="<?php echo admin_url('nhanvien/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng Xuất</a></li>

                      </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

    </div>
</header>

<div class="row">
    <div class="col-md-12 tb-data panel">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <caption>Danh Sách Hóa Đơn</caption>
            <thead>
                <tr>
                    <th>Số HD</th>
                    <th>Tên Khách Hàng</th>
                    <th>Tổng Tiền</th>                      
                    <th>Thanh Toán</th>
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
                    <td><?php echo number_format($row->PHIPV + $row->thanhtien) ?></td>
                    <td>
                        <?php if($row->TINHTRANG == 2):   //da giao hang or da phuc vu moi cho phep thanh toan?>
                        <a href="<?php echo base_url('ketoan/home/bill/'.$row->ID) ?>" class="btn btn-danger" role="button">Thanh Toán</a>
                        <?php elseif($row->TINHTRANG == 3)://da thanh toan ?>
                        <a href="<?php echo base_url('ketoan/home/bill/'.$row->ID) ?>" class="btn btn-success" role="button">In Lại Hóa Đơn</a>
                        <?php else: ?>
                        <button style="cursor: not-allowed" class="btn btn-default">Thanh Toán</button>
                        <?php endif; ?>
                    </td>
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