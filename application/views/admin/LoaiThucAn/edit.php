<?php $this->load->view('admin/loaithucan/head');?>

<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal panel" method="post" action="">
                <legend>Chỉnh sửa loại thức ăn, nước uống</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tên: <span class="required">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  placeholder="Nhập tên loại thức ăn, nước uống" id="ten" 
                             name="ten" value="<?php echo $info->TEN ?>" required>
                      <div class="form-error"><?php echo form_error('ten'); ?> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="loai">Danh Mục Cha:</label>
                    <div class="col-sm-9"> 
                        <select class="form-control" name="parent_id" id="loai">
                            <option value="0">Chọn danh mục cha</option>
                            <?php foreach ($list as $row): ?>
                                <option value="<?php echo $row->ID ?>" <?php echo ($row->ID == $info->PARENT_ID)? 'selected': '' ?>>
                                    <?php echo $row->TEN ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>               
                <div class="form-group btn-form"> 
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        <button type="reset" class="btn btn-default">Nhập Lại</button>
                    </div>
              </div>
                <p class="note">Chú Thích: <span class="required">*</span> Không được bỏ trống</p>
            </form>
        </div>
    </div>
</div><!--.content-->
