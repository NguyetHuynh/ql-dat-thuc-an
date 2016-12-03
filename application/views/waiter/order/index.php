<div class="container-fluid content">
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header col-sm-6">
                    <a class="navbar-brand" href="<?php echo waiter_url() ?>">Nguyệt Huỳnh</a>
                </div>
                <div class="nav navbar-nav navbar-right logout">
                    <a href="<?php echo waiter_url('food/catfood/'.$tableID.'/'.$hoadonID) ?>"><i class="fa fa-arrow-left" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"title="Quay Lại"></i></a>
                    <a href="<?php echo waiter_url() ?>"><i class="fa fa-home" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"title="Trang Chủ"></i></a>
                    <a href="<?php echo admin_url('nhanvien/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Đăng Xuất"></i></a>
                </div>
            </div>
        </nav>
    </header>  

<div class="col-sm-6 col-sm-offset-3 panel">
     <form class="form-horizontal " action="<?php echo waiter_url('order/update/'.$tableID.'/'.$hoadonID) ?>" method="post"> 
    <div class="row">
        <h2 class="col-sm-4">Bàn Số <?php echo $tableID ?></h2>
        <input type="hidden" name="tableID" value="<?php echo $tableID ?>"> 
        <div class="col-sm-5"></div>
        <div id="addMon">
            <a href="<?php echo waiter_url('food/catfood/'.$tableID.'/'.$hoadonID) ?>"class="col-sm-3 btn btn-primary" style="margin-top: 20px">Thêm Món</a>
        </div>
    </div>
        <p>Số HD: <?php echo $hoadonID ?></p>
        <input type="hidden" name="hoadonID" value="<?php echo $hoadonID ?>"> 
        <table class="table billTable">
            <thead>
                <tr>
                    <th>Tên Món</th>
                    <th>Số Lượng</th>
                    <th>Tình Trạng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chitiet as $row): ?>
                <tr>
                    <td>
                        <?php echo $row->TEN ?>
                        <input type="hidden" name="ta_id[]" value="<?php echo $row->ID; ?>">
                    </td>
                    <td><input id="soluong" type="number" name="soluong[]" min="1" value="<?php echo $row->SOLUONG ?>"required="required"></td>
                    <td>
                        <?php
                            switch ($row->TINHTRANG):
                                case 0:?>
                            <span style="color:#8C4018">Chuẩn bị</span>
                            <?php break; case 2:?>
                            <span style="color:#337ab7">Đang nấu</span>
                            <?php break; case 1:?>
                            <span style="color:#00a144">Nấu xong</span>
                                <?php break; case 3:?>
                            <span style="color:#c9302c">Đã phục vụ</span>
                        <?php endswitch;?>
                    </td>
                    <td>
                        <button class="btn btn-primary">Thêm</button>
                        <?php if($row->TINHTRANG == 1): ?>
                            <a href="<?php echo waiter_url('order/service/'.$tableID.'/'.$row->HOADONID.'/'.$row->ID.'/'.'1') ?>"class="btn btn-danger">Phục Vụ</a>
                        <?php else: ?>
                            <a class="btn btn-default" style="cursor: not-allowed">Phục Vụ</a>
                        <?php endif; ?>
                        <?php if($row->TINHTRANG  == 0 ): //neu tinh trang != 0 chua nau thi cho sua ?>
                        <a href="<?php  echo waiter_url('order/delete/'.$tableID.'/'.$row->HOADONID.'/'.$row->TA_ID) ?>" data-toggle="tooltip" title="Xóa">
                                <i style="margin-right: -20px" class="fa fa-trash" aria-hidden="true" onclick="return deleteConfirm()"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>                   
       </table>
    </form>  
</div><!--panel-->
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