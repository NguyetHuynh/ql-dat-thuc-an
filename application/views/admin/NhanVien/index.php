<?php $this->load->view('admin/nhanvien/head');?>
<div class="container">
    
    <?php $this->load->view('admin/message', $this->data);?>
    
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <caption>Danh Sách Nhân Sự</caption>
                <thead>
                    <tr>
                        <th></th>
                        <th>Mã số</th>
                        <th>Họ</th>
                        <th>Tên</th>
                        <th>Chức Vụ</th>
                        <th>Lương</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $row):?>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="<?php echo $row->ID ?>"></td>
                        <td><?php echo $row->ID ?></td>
                        <td><?php echo $row->HO ?></td>
                        <td><?php echo $row->TEN ?></td>
                        <td><?php 
                            $this->load->model('ChucVu_model');
                            $where = array('ID'=> $row->CHUCVUID);
                            $chucvu = $this->ChucVu_model->getInfoRule($where, 'TEN');
                            echo $chucvu->TEN;
                        ?></td>
                        <td><?php echo number_format($row->LUONG) ?>VND</td>
                        <td class="act-list">
                            <a href="<?php echo admin_url('nhanvien/edit/'.$row->ID) ?>" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                            <a href="<?php echo admin_url('nhanvien/delete/'.$row->ID) ?>" data-toggle="tooltip" title="Xóa">
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
