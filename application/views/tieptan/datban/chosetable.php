<!--catfood-->
<?php $this->load->view('tieptan/datban/head') ?>
<div class="row">
    <?php $this->load->view('admin/message', $this->data);?>
    <div class="col-sm-5 panel" style="">        
        <h3>Ngày Giờ Sử Dụng</h3>
        <form class="form-horizontal" action="<?php echo tieptan_url('datban/update/'.$phieuID) ?>" method="post">
            <div class="form-group">
                <label class="control-label col-sm-4" for="maphieu">Mã Phiếu: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="maphieu" name="maphieu" value="<?php echo $phieuID ?>" readonly="readonly">
                </div>
            </div>   
            <div class="form-group">
                <label class="control-label col-sm-4" for="ngaydung">Ngày:  <span class="required">*</span></label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="ngaydung" name="ngaydung" value="<?php echo $phieuinfo->NGAYDUNG ?>" required="required">
                    
                </div>
            </div>   
            <div class="form-group">
                <label class="control-label col-sm-4" for="gio">Giờ: <span class="required">*</span></label>
                <div class="col-sm-8">
                    <input type="time" class="form-control" id="gio" name="gio" value="<?php echo $phieuinfo->GIO ?>" required="required">
                    
                </div>
            </div> 
            <div class="form-group">
                <label class="control-label col-sm-4" for="sothuckhach">Số Khách: <span class="required">*</span></label>
                <div class="col-sm-8">
                    <select class="form-control" id="sothuckhach" name="sothuckhach" required="required">
                        <option value="">số khách</option>
                        <?php for($i=1; $i<=10; $i++):?>
                            <option value="<?php echo $i?>" <?php if($i == $phieuinfo->SOTHUCKHACH) echo 'selected'?>><?php echo $i?></option>
                        <?php endfor; ?>                        
                    </select>
                     
                </div>
            </div>  
            <div class="form-group"> 
              <div class="pull-right">
                <button type="submit" class="btn btn-primary" id="update">Cập Nhật</button>
                <a href="<?php echo tieptan_url('datban/customer/'.$phieuID) ?>" class="btn btn-warning">Nhập Thông Tin Khách Hàng</a>
              </div>
            </div>
        </form>
    </div> <!--col-sm-3 panel-->
    
    <div class="col-sm-7 panel">
        <h3>Danh Sách Bàn</h3>
        <div class="table tablesorted">
            <?php foreach ($ban as $row => $value) :?>
                <a href="<?php echo tieptan_url('datban/chose/'.$phieuID.'/'.$value->ID)?>" 
                   class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="bottom" title="click để chọn bàn">
                   Table <?php echo $value->ID?>
                </a>
            <?php endforeach;?>
        </div><!--table-->
    </div>
</div>

