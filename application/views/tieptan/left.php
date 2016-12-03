<div class="profile">
    <p>Xin chào, </p>
    <p><?php echo $user_info->TEN?></p>
</div>
<ul id="primary-menu">
    <li class="menu-item">
        <a href="<?php echo tieptan_url() ?>">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="menu-title">Home</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0)">
            <i class="fa fa-truck" aria-hidden="true"></i>
            <span class="menu-title">Quản Lý Giao Hàng</span>
            <i class="fa fa-chevron-down show-sub" aria-hidden="true"></i>
        </a>
        <ul class="submenu">
            <li class="menu-item">
                <a href="<?php echo tieptan_url() ?>">Thêm Giao Hàng</a>
            </li>
            <li class="menu-item">
                <a href="<?php echo tieptan_url('danhsach/index') ?>">Danh Sách </a>
            </li>    
        </ul>            
    </li>
    <li class="menu-item">
        <a href="javascript:void(0)">
            <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
            <span class="menu-title">Quản Lý Đặt Bàn</span>
            <i class="fa fa-chevron-down show-sub" aria-hidden="true"></i>
        </a>
        <ul class="submenu">
            <li class="menu-item">
                <a href="<?php echo tieptan_url('datban') ?>">Thêm Đặt Bàn</a>
            </li>
            <li class="menu-item">
                <a href="<?php echo tieptan_url('datban/danhsach') ?>">Danh Sách </a>
            </li>    
        </ul>            
    </li>
    <li class="menu-item">
        <a href="<?php echo tieptan_url('khachhang/index') ?>">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="menu-title">Khách Hàng</span>
        </a>
    </li>    
</ul>