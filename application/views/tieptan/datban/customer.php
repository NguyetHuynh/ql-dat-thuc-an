<?php $this->load->view('tieptan/datban/head');?>

<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal panel" method="post" action="">
                <legend>Nhập Thông Tin Khách Hàng</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tên: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo isset($khachhang->TEN)? $khachhang->TEN : '' ?>"  placeholder="Nguyễn Văn A" id="ten" name="ten" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sodt">Số Điện Thoại: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" pattern="(\d){9,10}" class="form-control" value="<?php echo isset($khachhang->SODT) ? $khachhang->SODT :'' ?>" placeholder="0939122444" id="sodt" name="sodt" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="diachi">Địa Chỉ: <span class="required">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  placeholder="Địa chỉ" value="<?php echo isset($khachhang->DIACHI) ? $khachhang->DIACHI : '' ?>" id="diachi" name="diachi" required>
                    </div>
                </div>
                <div class="form-group btn-form"> 
                    <div class="pull-right">
                        <a href="<?php echo tieptan_url('datban/chosetable/'.$phieuID) ?>" class="btn btn-info">Quay Lại</a>
                        <button type="submit" class="btn btn-primary">Tiếp Tục</button>
                        <button type="reset" class="btn btn-default">Nhập Lại</button>
                    </div>
              </div>
                <p class="note">Chú Thích: <span class="required">*</span> Không được bỏ trống</p>
            </form>
        </div>
    </div>
</div><!--.content-->
