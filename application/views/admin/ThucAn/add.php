<?php $this->load->view('admin/thucan/head');?>

<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal panel" method="post" action="">
                <legend>Thêm mới thức ăn, nước uống</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tên: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Nhập tên thức ăn, nước uống" id="ten" name="ten" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="loai">Loại: <span class="required">*</span></label>
                    <div class="col-sm-9"> 
                        <select class="form-control" name="loaitaid" id="loai" required>
                            <option value="">Chọn loại thức ăn, nước uống</option>
                            <?php foreach ($loai as $row): ?>
                                <?php if(count($row->sub) > 1): ?>
                                    <optgroup label="<?php echo $row->TEN ?>">
                                        <?php foreach ($row->sub as $sub): ?>
                                        <option value="<?php echo $sub->ID ?>" <?php echo $this->input->get('loaitaid') == $sub->ID?'selected':''?>>
                                            <?php echo $sub->TEN ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php else: ?>
                                    <option value="<?php echo $row->ID ?>" <?php echo $this->input->get('loaitaid') == $row->ID?'selected':''?>>
                                        <?php echo $row->TEN ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="price">Đơn Giá: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Nhập đơn giá thức ăn, nước uống" 
                               id="price" name="dongia" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="giamgia">Giảm Giá (%):</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Nhập phần trăm giảm giá" 
                               id="giamgia" name="giamgia">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="madv">Đơn Vị Tính: <span class="required">*</span></label>
                    <div class="col-sm-9"> 
                        <select class="form-control" name="madv" id="madv" required>
                            <option value="">Chọn đơn vị tính</option>
                            <?php foreach ($donvi as $row): ?>
                                <option value="<?php echo $row->ID ?>">
                                    <?php echo $row->TEN ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="mota">Mô Tả: </label>
                    <div class="col-sm-9">
                        <textarea name="mota" id="mota" class="form-control" rows="6"></textarea>
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
