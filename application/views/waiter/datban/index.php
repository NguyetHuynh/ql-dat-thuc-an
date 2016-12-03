<div class="container-fluid content">
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header col-sm-6">
                    <a class="navbar-brand" href="#">Nguyệt Huỳnh</a>
                </div>
                <div class="nav navbar-nav navbar-right logout">
                    <a href="<?php //echo waiter_url('food/catfood/'.$tableID.'/'.$hoadonID) ?>"><i class="fa fa-arrow-left" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"title="Quay Lại"></i></a>
                    <a href="<?php echo waiter_url() ?>"><i class="fa fa-home" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"title="Trang Chủ"></i></a>
                    <a href="<?php echo admin_url('nhanvien/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Đăng Xuất"></i></a>
                </div>
            </div>
        </nav>
    </header>  

<div class="col-sm-6 col-sm-offset-3 panel">
    <div class="row">
        <h3 class="col-sm-8">Thông Tin Đặt Bàn</h3>
        <p class="col-sm-4" style="margin-top:23px;">Mã Phiếu Đăt Bàn: <?php echo $phieuid ?></p>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-7">
            <p><i class="fa fa-user" aria-hidden="true"></i> <b>Tên:</b> <?php echo $khachhang->TEN ?></p>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <b>Giờ Đến:</b> <?php echo $phieu->GIO ?></p>
        </div>
        <div class="col-sm-5">
            <p><i class="fa fa-phone" aria-hidden="true"></i> <b>Điên Thoại:</b> <?php echo $khachhang->SODT ?></p>
            <p><i class="fa fa-users" aria-hidden="true"></i> <b>Số Khách:</b> <?php echo $phieu->SOTHUCKHACH ?></p>
        </div>
    </div>
    <div class="row pull-right"> 
        <a href="<?php echo waiter_url() ?>" class="btn btn-info">Quay Lại</a>
        <a href="<?php echo waiter_url('home/addbill/'.$banid.'/'.$phieuid) ?>" class="btn btn-primary">Khách Đến</a>
    </div>
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