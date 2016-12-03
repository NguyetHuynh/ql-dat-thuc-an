<?php $this->load->view('admin/chucvu/head');?>

<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal panel" method="post" action="">
                <legend>Chỉnh sửa chức vụ</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tên chức vụ: <span class="required">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  placeholder="Nhập tên đơn vị tính" 
                             id="ten" name="ten" value="<?php echo $info->TEN ?>" required>
                      <div class="form-error"><?php echo form_error('ten'); ?> </div>
                    </div>
                </div>
                <div class="form-group btn-form"> 
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Chỉnh Sửa</button>
                        <button type="reset" class="btn btn-default">Nhập Lại</button>
                    </div>
              </div>
                <p class="note">Chú Thích: <span class="required">*</span> Không được bỏ trống</p>
            </form>
        </div>
    </div>
</div><!--.content-->
