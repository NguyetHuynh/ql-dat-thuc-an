<?php $this->load->view('tieptan/home/head') ?>

<?php $this->load->view('tieptan/message', $this->data);?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal panel" action="" method="post">
            <legend>Thêm mới phiếu giao hàng</legend>            
            <div class="form-group opt1">
                <label class="control-label col-sm-3" for="ten">Mã Khách Hàng <span class="required"> * </span></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="1" id="khachhangid" name="khachhangid">
                  <div class="form-error"></div>
                </div>
            </div>
            <div class="opt2">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tên Khách Hàng: <span class="required"> * </span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  placeholder="Nguyễn Văn A" id="ten" name="tenkhachhang">
                      <div class="form-error"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sodt">Số Điện Thoại: <span class="required"> * </span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="0939123456" pattern="(\d){10,11}" id="sodt" name="sodt">
                      <div class="form-error"></div>
                    </div>
                </div>
                <div class="form-group">
                    <!-- API key 1:  AIzaSyCjN_TKQltcKgN3EOgRVJfLPUCMZJeuLSs-->
                    <!---lam autocomplete address voi google--->
                    <label class="control-label col-sm-3" for="ten">Địa Chỉ: <span class="required"> * </span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  placeholder="địa chỉ khách hàng" id="diachi" name="diachi">
                      <div class="form-error"></div>
                    </div>
                </div>
            </div>
            
            <div class="form-group btn-form"> 
                <div class="pull-right">                  
                  <button type="submit" class="btn btn-primary">Nhập Món Ăn</button>
                  <button type="reset" class="btn btn-default">Nhập Lại</button> 
            </div>
            <p class="note">Chú Thích: <span class="required">*</span> Không được bỏ trống</p>
          </div>
        </form>
    </div>
</div>