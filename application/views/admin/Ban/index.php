<?php $this->load->view('admin/ban/head');?>
<div class="container">
    <?php $this->load->view('admin/message', $this->data);?>
       
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <caption>Danh Sách Bàn</caption>
                <thead>
                    <tr>
                        <th><input type="checkbox" name="id[]" value=""></th>
                        <th>Mã Số</th>
                        <th>Tình Trạng</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $row):?>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="<?php echo $row->ID ?>"></td>
                        <td><?php echo $row->ID ?></td>
                        <td> <?php echo $row->TINHTRANG?> </td>
                        <td class="act-list">
                            <a href="<?php echo admin_url('Ban/edit/'.$row->ID); ?>" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                            <a href="<?php echo admin_url('Ban/delete/'.$row->ID); ?>" data-toggle="tooltip" title="Xóa">
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
