<?php $this->load->view('admin/ban/head');?>

    <div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal panel" method="post" action="">
                <legend>Thêm mới bàn</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tình Trạng Bàn: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select name="tinhtrang">
                            <option value="">Chọn tình trạng bàn</option>
                            <option value="Tốt">Tốt</option>
                            <option value="Đang sửa">Đang sửa</option>
                        </select>
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