<?php $this->load->view('tieptan/khachhang/head');?>

<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal panel" method="post" action="">
                <legend>Thêm mới khách hàng</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tên: <span class="required">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  placeholder="Nguyễn Văn A" id="ten" name="ten" required>
                      <div class="form-error"><?php echo form_error('ten'); ?> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sodt">Số Điện Thoại: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" pattern="(\d){9,10}" class="form-control"  placeholder="0939122444" id="sodt" name="sodt" required>
                      <div class="form-error"><?php echo form_error('sodt'); ?> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="diachi">Địa Chỉ: <span class="required">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  placeholder="Địa chỉ" id="diachi" name="diachi" required>
                      <div class="form-error"><?php echo form_error('diachi'); ?> </div>
                    </div>
                </div>
                <div class="form-group btn-form"> 
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="reset" class="btn btn-default">Nhập Lại</button>
                    </div>
              </div>
                <p class="note">Chú Thích: <span class="required">*</span> Không được bỏ trống</p>
            </form>
        </div>
    </div>
</div><!--.content-->
