<?php $this->load->view('admin/chucvu/head');?>
<div class="container">
    <?php $this->load->view('admin/message', $this->data);?>
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <caption>Danh Sách Chức Vụ</caption>
                <thead>
                    <tr>
                        <th>Mã Số</th>
                        <th>Tên Chức Vụ</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $row):?>
                    <tr>
                        <td><?php echo $row->ID ?></td>
                        <td><?php echo $row->TEN ?></td>
                        <td class="act-list">
                            <?php if($row->ID <7): ?>
                            <a><i style="cursor:not-allowed" class="fa fa-wrench" aria-hidden="true" data-toggle="tooltip" title="Chỉnh sửa"></i></a>                        
                            <a><i style="cursor:not-allowed" class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Xóa"></i></a>                       
                            <?php else:?>
                                <a href="<?php echo admin_url('ChucVu/edit/'.$row->ID); ?>" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                                <a href="<?php echo admin_url('ChucVu/delete/'.$row->ID); ?>" data-toggle="tooltip" title="Xóa">
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
