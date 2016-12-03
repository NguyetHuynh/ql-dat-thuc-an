<!--catfood-->
<?php $this->load->view('tieptan/food/head') ?>
<div class="row">
    <div class="col-sm-3 panel" style="">
        <h2>Số Hóa Đơn: <?php echo $hoadonID ?></h2>
        <div class="btn-group btn-group-vertical btn-lg btn-block">
            <?php foreach($loai as $row): ?>
            <a href="<?php echo tieptan_url('order/catfood/'.$hoadonID.'/'.$row->ID) ?>" class="btn btn-primary"  role="button">
                <span><?php echo $row->TEN ?></span>
                <span class="fa fa-chevron-right fa-right fa-right"></span>  
            </a>               
            <?php endforeach; ?>           
        </div>
    </div>
    <div class="col-sm-9 panel">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <caption>Danh Sách Món Ăn</caption>
            <thead>
                <tr>
                    <th class="col-md-1">Số HD</th>
                    <th>Tên Món</th>
                    <th>Đơn Giá</th>     
                    <th>Thêm</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $row): ?>
                <tr>
                        <td><?php echo $row->ID ?></td>
                        <td><?php echo $row->TEN ?></td>
                        <td><?php echo number_format($row->DONGIA)?> VND</td>
                        <td><a href="<?php echo tieptan_url('order/add/'.$hoadonID.'/'.$row->ID) ?>" class="btn btn-success" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm</a></td>
            <!--<?php // echo tieptan_url('order/add/'.$hoadonID.'/'.$row->ID)?>-->
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo public_url() ?>/script/bootstrap-number-input.js"></script>
<script>
    $('.qty').bootstrapNumber({
        upClass: 'success',
        downClass: 'warning',
        center: true
    });
</script>