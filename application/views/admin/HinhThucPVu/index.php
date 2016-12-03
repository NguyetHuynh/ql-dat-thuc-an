<?php $this->load->view('admin/hinhthucpvu/head');?>
<div class="container">
    <?php $this->load->view('admin/message', $this->data);?>
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <caption>Danh Sách Hình Thức Phục Vụ</caption>
                <thead>
                    <tr>
                        <th><input type="checkbox" name="id[]" value=""></th>
                        <th>Mã Số</th>
                        <th>Tên Hình Thức Phục Vụ</th>
                        <th>Phí Phục Vụ</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $row):?>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="<?php echo $row->ID ?>"></td>
                        <td><?php echo $row->ID ?></td>
                        <td><?php echo $row->TEN ?></td>
                        <td><?php echo number_format($row->PHIPV) ?></td>
                        <td class="act-list">
                            <!--hinh thuc phuc vu tai ban va giao hang moi cho phep sua phi phuc vu,nhung ko duoc xoa-->
                                <a href="<?php echo admin_url('HinhThucPVu/edit/'.$row->ID); ?>" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                            <?php if($row->ID <= 2) :?>
                                <a style="cursor: not-allowed" data-toggle="tooltip" title="Xóa">
                                    <i class="fa fa-trash" aria-hidden="true" style=" color: #d9534f;"></i>
                                </a>                           
                            <?php else: ?>   
                                <a href="<?php echo admin_url('HinhThucPVu/delete/'.$row->ID); ?>" data-toggle="tooltip" title="Xóa">
                                    <i class="fa fa-trash" aria-hidden="true" onclick="return deleteConfirm()"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!--.tb-data-->
    </div>
</div><!--.content-->
