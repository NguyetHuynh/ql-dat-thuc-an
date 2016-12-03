<div class="profile">
    <p>Xin chào, admin</p>
</div>
<ul id="primary-menu">
    <li class="menu-item">
        <a href="<?php echo admin_url() ?>">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="menu-title">Home</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0)">
            <i class="fa fa-cutlery" aria-hidden="true"></i>
            <span class="menu-title">Quản Lý Thực Đơn</span>
            <i class="fa fa-chevron-down show-sub" aria-hidden="true"></i>
        </a>
        <ul class="submenu">
            <li><a href="<?php echo admin_url('thucan') ?>">Xem Danh Sách Món</a></li>
            <li><a href="<?php echo admin_url('loaithucan') ?>">Loại Thức Ăn</a></li>
            <li><a href="<?php echo admin_url('hinhthucpvu') ?>">Hình Thức Phục Vụ</a></li>
            <li><a href="<?php echo admin_url('donvitinh') ?>">Đơn Vị Tính</a></li>
        </ul>            
    </li>
    <li class="menu-item">
        <a href="javascript:void(0)">
            <i class="fa fa-money" aria-hidden="true"></i>
             Quản Lý Hóa Đơn
            <i class="fa fa-chevron-down show-sub" aria-hidden="true"></i>
        </a>
        <ul class="submenu">
            <li><a href="<?php echo admin_url('hoadon') ?>">Phiếu Giao Hàng</a></li>
            <li><a href="<?php echo admin_url('hoadon/taiban') ?>">Hóa Đơn Tại Bàn</a></li>
        </ul>   
    </li>
    <li class="menu-item">
        <a href="javascript:void(0)">
            <i class="fa fa-bar-chart"> </i>
            <span>Xem Thống Kê</span>
            <i class="fa fa-chevron-down show-sub" aria-hidden="true"></i>
        </a>
        <ul class="submenu">
            <li><a href="<?php echo admin_url('doanhthu') ?>">Doanh Thu Ngày</a></li>
            <li><a href="<?php echo admin_url('doanhthu/thang') ?>">Doanh Thu Tháng</a></li>
            <li><a href="<?php echo admin_url('datban') ?>">Đặt Bàn</a></li>
        </ul>  
    </li>
    <li class="menu-item">
        <a href="<?php echo admin_url('ban') ?>">
            <i class="fa fa-list" aria-hidden="true"></i>            
             Quản Lý Bàn
        </a>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0)">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="menu-title">Nhân Viên</span>
            <i class="fa fa-chevron-down show-sub" aria-hidden="true"></i>
        </a>
        <ul class="submenu">
            <li><a href="<?php echo admin_url('nhanvien') ?>">Danh Sách Nhân Viên</a></li>
            <li><a href="<?php echo admin_url('chucvu') ?>">Danh Sách Chức Vụ</a></li>
        </ul>   
    </li>
    <li class="menu-item">
        <a href="<?php echo admin_url('khachhang') ?>">
            <i class="fa fa-address-book-o" aria-hidden="true"></i> Khách Hàng
        </a>
    </li>
</ul>