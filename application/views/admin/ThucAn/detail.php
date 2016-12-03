<?php $this->load->view('admin/thucan/head');?>

<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <div class="page-header"><h3 class="text-primary text-center"><?php echo $info->TEN ?></h3></div>
                <div class="container">
                <ul>
                    <li><b>Đơn Giá: </b> <?php echo $info->DONGIA ?> VND</li>
                    <li><b>Giảm Giá: </b><?php echo $info->GIAMGIA ?>%</li>
                    <li><b>Lượt Chọn: </b><?php echo $info->SOLUOTCHON ?></li>
                    <li><b>Loại Thức Ăn: </b><?php echo $loai->TEN ?></li>
                    <li><b>Đơn Vị Tính: </b><?php echo $donvi->TEN ?></li>
                    <li><b>Ngày Tạo: </b><?php echo $info->NGAYTAO ?></li>
                    <li><b>Mô Tả: </b><?php echo $info->MOTA ?></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--.content-->
