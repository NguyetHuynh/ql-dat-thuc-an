    
<header>
     <nav class="navbar navbar-default">
         <div class="container-fluid">
             <div class="navbar-header col-sm-6">
                 <a class="navbar-brand" href="#">Nguyệt Huỳnh</a>
             </div>
             <div class="nav navbar-nav navbar-right logout">
                 <a href=""><i class="fa fa-arrow-left" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"title="Quay Lại"></i></a>
                 <a href="<?php echo waiter_url() ?>"><i class="fa fa-home" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"title="Trang Chủ"></i></a>
                 <a href="<?php echo admin_url('nhanvien/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Đăng Xuất"></i></a>
             </div>
         </div>
     </nav>
 </header>
       
        
        
<div class="table">
    <?php foreach ($list as $row): ?>
    <?php if($row->STATUS == 0): //ko co khach?>
        <a href="<?php echo waiter_url('home/addbill/'.$row->ID)?>">
            <button class="btn btn-success"  value="<?php echo $row->ID ?>">Table <?php echo $row->ID ?></button>
        </a>
    <?php elseif($row->STATUS == 1): ?>
        <a href="<?php echo waiter_url('home/addbill/'.$row->ID)?>">
            <button class="btn btn-danger"  value="<?php echo $row->ID ?>">Table <?php echo $row->ID ?></button>
        </a>
    <?php else:?>
        <a href="<?php echo waiter_url('home/datban/'.$row->ID.'/'.$phieuid)?>">
            <button class="btn btn-warning"  value="<?php echo $row->ID ?>">Table <?php echo $row->ID ?></button>
        </a>
    <?php endif; ?>
    <?php endforeach; ?>
</div><!--table-->
<!--<div class="help">
    <button class="btn btn-info"><i class="fa fa-question" aria-hidden="true"></i></button>
    <div class="help-content">
        <p>Click vào bàn tương ứng để thao tác</p>
        <hr>
        <h5>Chú thích:</h5>
        <ul>
            <li><button class="btn btn-success">Chưa có khách</button></li>
            <li><button class="btn btn-warning">Chờ món</button></li>
            <li><button class="btn btn-danger">Đã phục vụ</button></li>
        </ul>
    </div>
</div>help-->

