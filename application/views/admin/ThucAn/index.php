<?php $this->load->view('admin/thucan/head');?>
<div class="container">
    
    <?php $this->load->view('admin/message', $this->data);?>
    
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <caption>Danh Sách Thức Ăn, Nước Uống</caption>
                <thead>
                    <tr>
<!--                        <th></th>-->
                        <th>Mã số</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Lượt Mua</th>
                        <th>Ngày Tạo</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $row):?>
                    <tr>
<!--                        <td><input type="checkbox" name="id[]" value="<?php //echo $row->ID ?>"></td>-->
                        <td><?php echo $row->ID ?></td>
                        <td><?php echo $row->TEN ?></td>
                        <td>
                            <?php if($row->GIAMGIA > 0): ?>
                                <?php $gia_new = $row->DONGIA*(1-$row->GIAMGIA/100) ?>
                                <b style="color: red"><?php echo number_format($gia_new )?> VND</b>
                                <p style="text-decoration: line-through; font-size: 0.9em"><?php echo number_format($row->DONGIA )?> VND</p>
                            <?php else: ?>
				<b style="color: red"><?php echo number_format($row->DONGIA )?> VND</b>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row->SOLUOTCHON ?></td>
                        <td><?php echo $row->NGAYTAO ?></td>
                        <td class="act-list">
                            <a href="<?php echo admin_url('thucan/detail/'.$row->ID) ?>" data-toggle="tooltip" title="Xem chi tiết"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                            <a href="<?php echo admin_url('thucan/edit/'.$row->ID) ?>" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                            <a href="<?php echo admin_url('thucan/delete/'.$row->ID) ?>" data-toggle="tooltip" title="Xóa">
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
