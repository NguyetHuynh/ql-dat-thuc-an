<?php $this->load->view('admin/nhanvien/head');?>

<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal panel" method="post" action="">
                <legend>Chỉnh sửa thông tin nhân viên</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ho">Họ: <span class="required">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  placeholder="Nhập họ nhân viên" 
                             id="ho" name="ho" value="<?php echo $info->HO ?>"  required>
                      <div class="form-error"><?php echo form_error('ho')?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tên: <span class="required">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  placeholder="Nhập tên nhân vien" 
                             id="ten" name="ten" value="<?php echo $info->TEN ?>" required>
                      <div class="form-error"><?php echo form_error('ten')?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="chucvu">Chức Vụ: <span class="required">*</span></label>
                    <div class="col-sm-9"> 
                        <select class="form-control" name="chucvuid" id="chucvu" required>
                            <option value="">Chọn chức vụ</option>
                            <?php foreach ($chucvu as $row): ?>                                
                            <option value="<?php echo $row->ID ?>" <?php if($row->ID == $info->CHUCVUID) echo 'selected'?> ><?php echo $row->TEN ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="price">Lương: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Nhập lương" 
                               id="price" name="luong" value="<?php echo $info->LUONG ?>" required>
                        <div class="form-error"><?php echo form_error('luong')?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control"  placeholder="Nhập mật khẩu" 
                                id="giamgia" name="password">
                        <div class="form-error"><?php echo form_error('password')?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="repassword">Nhập Lại Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control"  placeholder="Nhập mật khẩu" 
                                id="repassword" name="repassword">
                        <div class="form-error"><?php echo form_error('repassword')?></div>
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
