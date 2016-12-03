<div class="row">
    <div class="col-md-12 tb-data panel">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <caption>Danh Sách Món Ăn</caption>
            <thead>
                <tr>
                    <th>Số HD</th>
                    <th>Tên Món</th>
                    <th>Số Lượng</th>
                    <th>Bàn Số</th>
                    <th>Cập Nhật</th>
                    <th>Tình trạng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $row): ?>  
                <?php if($row->TINHTRANG < 3): //if tinh trang la thanh toan thi ko hien len?>
                <tr>                    
                    <td><?php echo $row->HOADONID ?></td>
                    <td><?php echo $row->TEN ?></td>
                    <td><?php echo $row->SOLUONG ?></td>
                    <td>
                        <?php echo (empty($row->BANID))? 'Giao hàng' : $row->BANID ?>
                    </td>
                    <td><!--dang nau - 2, nau xong - 1-->
                        <?php if($row->TINHTRANG == 1): //if trang thai la nau xong thi ko cho click vao chuan bi?>
                            <button class="btn btn-primary" disabled>Đang Nấu</button>
                        <?php else: ?>
<!--                            <a href="<?php //echo base_url('chef/home/update/'.$row->HOADONID.'/'.$row->TA_ID.'/'.'2') ?>">-->
                            <a href="<?php echo base_url('chef/home/update/'.$row->HOADONID.'/'.$row->ID.'/'.'2') ?>">
                               <button class="btn btn-primary">Đang Nấu</button>
                            </a>                        
                        <?php endif; ?>
                        <a href="<?php echo base_url('chef/home/update/'.$row->HOADONID.'/'.$row->ID.'/'.'1'); //echo base_url('chef/home/update/'.$row->HOADONID.'/'.$row->TA_ID.'/'.'1') ?>" role="button" class="btn btn-success">Nấu Xong</a>                        
                    </td>
                    <td>
                        <?php
                            switch ($row->TINHTRANG):
                                case 0:?>
                            <span style="color:#c9302c">Chuẩn bị</span>
                            <?php break; case 2:?>
                            <span style="color:#337ab7">Đang nấu</span>
                            <?php break; case 1:?>
                            <span style="color:#00a144">Nấu xong</span>
                            <?php break; default:?>
                            <span style="color:#c9302c">Chuẩn bị</span>
                        <?php endswitch;?>
                    </td>                    
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!--.tb-data-->
</div>