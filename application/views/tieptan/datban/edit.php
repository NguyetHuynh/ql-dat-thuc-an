<?php $this->load->view('tieptan/datban/head');?>

<div class="content">
    <?php $this->load->view('tieptan/message');?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal panel" method="post" action="">
                <legend>CHI TIẾT PHIẾU ĐẶT HÀNG</legend>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tên: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $phieuinfo[0]->TEN?>" id="ten" name="ten" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sodt">Số Điện Thoại: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" pattern="(\d){9,10}" class="form-control"  value="<?php echo $phieuinfo[0]->SODT?>" id="sodt" name="sodt" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="diachi">Địa Chỉ: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  value="<?php echo $phieuinfo[0]->DIACHI?>" id="diachi" name="diachi" required>
                    </div>
                </div>
                <hr><!--thong tin phieu dat hang-->
                
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="form-group col-sm-7">
                        <label class="control-label col-sm-4" for="ngaydung">Ngày: <span class="required">*</span></label>
                        <div class="col-sm-8">
                            <input style="margin-left: -10px;" type="date" min='<?php echo date("Y-m-d", now('Asia/Ho_Chi_Minh')) ?>'class="form-control" id="ngaydung" name="ngaydung" value="<?php echo $phieuinfo[0]->NGAYDUNG?>" required="required">
                        </div>
                     </div>
                    <div class="form-group col-sm-5">
                        <label for="gio" class="control-label col-sm-4">Giờ: <span class="required">*</span></label>
                        <div class=" col-sm-8">
                            <input class="form-control"  type="time" style="width: 100%"  id="gio" name="gio" value="<?php echo $phieuinfo[0]->GIO?>" required="required">
                        </div>
                    </div> 
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sothuckhach">Số Khách: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control" id="sothuckhach" name="sothuckhach" required="required">
                            <option value="">số khách</option>
                            <?php for($i=1; $i<=10; $i++):?>
                                <option value="<?php echo $i?>" <?php if($i == $phieuinfo[0]->SOTHUCKHACH) echo 'selected'?>><?php echo $i?></option>
                            <?php endfor; ?>                        
                        </select>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sothuckhach">Bàn Số: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <!--muon sua so ban quay lai trang chosetable-->
                         <?php foreach ($phieuinfo as $row => $value): ?>
                        <a href="<?php echo tieptan_url('datban/deletetable/'.$phieuID.'/'.$phieuinfo[0]->BANID) ?>"
                           class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="click để xóa bàn">
                                Table <?php echo $value->BANID ?> <i class="fa fa-times" aria-hidden="true"></i>
                        </a>   
                        <?php endforeach; ?>
                    </div>
                </div>  
                <div class="form-group btn-form"> 
                    <div class="pull-right">
                        <a href="<?php echo tieptan_url('datban') ?>" class="btn btn-info">Về Trang Chủ</a>
                        <a href="<?php echo tieptan_url('datban/chosetable/'.$phieuID) ?>" class="btn btn-success">Thêm Bàn</a>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </div>
                </div>
                <p class="note">Chú Thích: <span class="required">*</span> Không được bỏ trống</p>
            </form>
        </div>
    </div>
</div><!--.content-->
