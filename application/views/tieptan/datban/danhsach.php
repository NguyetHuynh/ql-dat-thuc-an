<?php $this->load->view('tieptan/datban/head');?>
<div class="container">
    <?php $this->load->view('tieptan/message', $this->data);?>
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <caption>Danh Sách Phiếu Đặt Bàn</caption>
                <thead>
                    <tr>
                        <th>Mã Số</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Ngày Giờ Dùng</th>
                        <th>Số Khách</th>
                        <th>Bàn Số</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($phieu as $row):?>
                    <tr>
                        <td><?php echo $row->ID ?></td>
                        <td><?php echo $row->TEN ?></td>
                        <td><?php echo $row->SODT ?></td>
                        <td><?php echo $row->NGAYDUNG .' | ' ; echo $row->GIO; ?></td>
                        <td><?php echo $row->SOTHUCKHACH ?></td>
                        <td><?php foreach ($ban as $val){
                            if($val->DATBANID == $row->ID)
                            {
                                echo $val->BANID .', ';
                            }
                        }
                        ?></td>
                        <td class="act-list" >
                            <a style="margin: 0px; padding: 0px;" href="<?php echo tieptan_url('datban/edit/'.$row->ID); ?>" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                            <a style="margin: 0px; padding: 0px;" href="<?php echo tieptan_url('datban/delete/'.$row->ID); ?>" data-toggle="tooltip" title="Xóa">
                                <i class="fa fa-trash" aria-hidden="true" onclick="return deleteConfirm()"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!--.tb-data-->
    </div>
</div><!--.content-->
