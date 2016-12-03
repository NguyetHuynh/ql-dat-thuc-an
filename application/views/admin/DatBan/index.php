<?php $this->load->view('admin/datban/head');?>
<div class="container">
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
<!--                <caption>Doanh Thu Theo Ngày</caption>-->
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Khách Hàng</th>
                        <th>Ngày Dùng</th>
                        <th>Số Khách</th>
                        <th>Số Bàn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($phieu as $row):?>
                    <tr>
                        <td><?php echo $row->ID ?></td>
                        <td><?php echo $row->TEN ?></td>
                        <td><?php echo $row->NGAYDUNG .' | ' ; echo $row->GIO; ?></td>
                        <td><?php echo $row->SOTHUCKHACH ?></td>
                        <td><?php foreach ($ban as $val){
                            if($val->DATBANID == $row->ID)
                            {
                                echo $val->BANID .', ';
                            }
                        }
                        ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!--.tb-data-->
    </div>
</div><!--.content-->
