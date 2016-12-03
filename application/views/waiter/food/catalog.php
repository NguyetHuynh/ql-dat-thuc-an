<!--catfood-->
<div class="container-fluid content">
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header col-sm-6">
                <a class="navbar-brand" href="#">Nguyệt Huỳnh</a>
            </div>
            <div class="nav navbar-nav navbar-right logout">
                <a href="<?php echo waiter_url('food/catfood/'.$table.'/'.$hoadonID) ?>"><i class="fa fa-arrow-left" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"title="Quay Lại"></i></a>
                <a href="<?php echo waiter_url() ?>"><i class="fa fa-home" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"title="Trang Chủ"></i></a>
                <a href="<?php echo admin_url('nhanvien/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Đăng Xuất"></i></a>
            </div>
        </div>
    </nav>
</header>

<div class="col-sm-6 col-sm-offset-3 panel">
    <h2>Bàn Số <?php echo $table?></h2>
    <div class="btn-group btn-group-vertical btn-lg btn-block">
        <?php foreach($loai as $row): ?>
        <a href="<?php echo waiter_url('food/food/'.$table.'/'.$hoadonID.'/'.$row->ID) ?>" class="btn btn-primary"  role="button">
            <span><?php echo $row->TEN ?></span>
            <span class="fa fa-chevron-right fa-right fa-right"></span>  
        </a>               
        <?php endforeach; ?>           
    </div>
</div>
</div>