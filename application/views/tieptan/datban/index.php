<!--catfood-->
<?php $this->load->view('tieptan/datban/head') ?>
<div class="row">
    <?php $this->load->view('tieptan/message', $this->data);?>
    <div class="panel" style="">
        <h3>Ngày Giờ Sử Dụng</h3>
        <form class="form-horizontal" action="<?php echo tieptan_url('datban') ?>" method="post">
            <div class="form-group">
                <label class="control-label col-sm-4" for="ngaydung">Ngày: </label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="ngaydung" name="ngaydung" required="required">
                </div>
            </div>   
            <div class="form-group">
                <label class="control-label col-sm-4" for="gio">Giờ: </label>
                <div class="col-sm-8">
<!--                    <input type="time" class="form-control" id="gio" name="gio"  required="required">-->
                    <select class="form-control" id="gio" name="gio" required="required">
                        <option value="">hh-mm</option>
<!--                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>-->
                        <?php for($i=8; $i<20; $i++):
                            if($i<10):?> 
                                <option value="<?php echo '0'.$i.':00'?>"><?php echo '0'.$i.":00"?></option>
                            <?php else: ?>
                                <option value="<?php echo $i.':00'?>"><?php echo $i.":00"?></option>
                        <?php endif; endfor; ?>                   
                    </select>
                </div>
            </div> 
            <div class="form-group">
                <label class="control-label col-sm-4" for="sothuckhach">Số Khách: </label>
                <div class="col-sm-8">
                    <select class="form-control" id="sothuckhach" name="sothuckhach" required="required">
                        <option value="">số khách</option>
                        <?php for($i=1; $i<=10; $i++):?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php endfor; ?>                   
                    </select>
                </div>
            </div>  
            <div class="form-group btn-form"> 
                <div class="pull-right">                  
                  <button type="submit" class="btn btn-primary">Xem Danh Sách Bàn</button>
                  <button type="reset" class="btn btn-default">Nhập Lại</button> 
            </div>
        </form>
    </div> <!--col-sm-3 panel-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo public_url() ?>/script/bootstrap-number-input.js"></script>