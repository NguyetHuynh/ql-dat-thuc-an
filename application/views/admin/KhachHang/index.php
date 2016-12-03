<?php $this->load->view('admin/khachhang/head');?>
<div class="container">
    <?php $this->load->view('admin/message', $this->data);?>
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <caption>Danh Sách Khách Hàng</caption>
                <thead>
                    <tr>
                        <th>Mã Số</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điên Thoại</th>
                        <th>Địa Chỉ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $row): if($row->ID != 0):?>
                    <tr>
                        <td><?php echo $row->ID ?></td>
                        <td><?php echo $row->TEN ?></td>
                        <td><?php echo $row->SODT ?></td>
                        <td><?php echo $row->DIACHI ?></td>
                        <td class="act-list">
                            <a href="<?php echo admin_url('khachhang/edit/'.$row->ID); ?>" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>
<!--                            <a href="<?php echo admin_url('khachhang/delete/'.$row->ID); ?>" data-toggle="tooltip" title="Xóa">
                                <i class="fa fa-trash" aria-hidden="true" onclick="return deleteConfirm()"></i>
                            </a>-->
                        </td>
                    </tr>
                    <?php endif; endforeach; ?>
                </tbody>
            </table>
        </div><!--.tb-data-->
    </div>
</div><!--.content-->
