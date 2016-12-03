
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
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">    
            <thead>
                <th>Mã Số</th>
                <th>Tên Món</th>
            </thead>
            <tbody>
        <?php foreach ($list as $row): ?>
                <tr>
                    <td><?php echo $row->ID ?></td>
                    <td><a href="<?php echo waiter_url('order/add/'.$table.'/'.$hoadonID.'/'.$row->ID) ?>" class="btn btn-primary btn-lg btn-block"  role="button">
                            <?php echo $row->TEN ?>
                        </a> 
                    </td>    
                </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div><!--panel-->
<!--$hoadonID.'/'-->
</div>