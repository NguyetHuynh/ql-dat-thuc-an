<div class="title">
    <div class="container">
        <div class="">
            <h2>Thông Tin Giao Hàng</h2>
        </div>
        <div class="act-control">
            <a>
                <button type="button" class="btn btn-primary">Xem Phiếu Giao Hàng</button>
            </a>  
            <a href="<?php echo tieptan_url('danhsach/index') ?>">
                <button type="button" class="btn btn-primary">Xem Danh Sách</button>
            </a>      
        </div>
    </div>    
    <div class="line"></div>                
</div>
<div class="row">
    <div class="col-sm-8 col-md-offset-2">
        <div class="panel">
            <form class="form-horizontal " action="<?php echo tieptan_url('order/update/'.$hoadonID) ?>" method="post"> 
                <legend>Thông Tin Đặt Hàng</legend>
                <div class=" row">
                    <div class="col-md-4"><b>Số Hóa Đơn:</b></div>
                    <div class="col-md-8"> <?php echo $hoadonID ?></div>
                </div>
                <div class=" row">
                    <div class="col-md-4"><b>Tên Khách Hàng:</b></div>
                    <div class="col-md-8"> <?php echo $khachhang->TEN ?></div>
                </div>
                <div class=" row">
                    <div class="col-md-4"><b>Số Điện Thoại:</b></div>
                    <div class="col-md-8"> <?php echo $khachhang->SODT ?></div>
                </div>
                <div class=" row">
                    <div class="col-md-4"><b>Địa Chỉ:</b></div>
                    <div class="col-md-8"> <?php echo $khachhang->DIACHI ?></div>
                </div>
                                         
                <table class="table billTable">
                    <thead>
                        <tr>
                            <th>Tên Món</th>
                            <th>Số Lượng</th>
                            <th class="slg">Đơn Giá</th>
                            <th class="slg">Số Tiền</th>
                            <th>Tình Trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($chitiet as $row): ?>
                        <tr>
                            <?php 
                                $total = $total+$row->DONGIA*$row->SOLUONG;
                                $id = $row->TA_ID;
                                $this->load->model('thucan_model');
                                $food = $this->thucan_model->getInfoById($id);
                            ?>
                            <td>
                                <?php echo $food->TEN ?>
                            </td>
                            <td><?php echo $row->SOLUONG ?></td>
                            <td class="slg"><?php echo number_format($row->DONGIA) ?></td>
                            <td class="slg">
                                <?php 
                                    $sotien = $row->DONGIA* $row->SOLUONG;
                                    echo number_format($sotien) ;
                                ?>
                            </td>
                            <td>
                                <?php
                                switch($row->TINHTRANG)
                                {
                                    case 0: 
                                        echo 'Chưa Giao'; break;
                                    case 1:
                                        echo 'Nấu Xong'; break;
                                    case 2: 
                                        echo 'Đang Nấu'; break;
                                    case 3: 
                                        echo 'Đã Giao'; break;
                                }?>
                            </td>
                        </tr>            
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Phí Giao Hàng:</td>
                            <td colspan="2" class="slg"><?php echo number_format($phipv->PHIPV) ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span>Thành Tiền:</span></b></td>
                            <td colspan="2" class="slg">
                                <?php 
                                    $thanhtien = $total + $phipv->PHIPV;
                                    echo number_format($thanhtien) ;
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div><!--panel-->
    </div>
</div><!--row-->
<script>
    function deleteConfirm()
    {
        job=confirm('Bạn có chắc là muốn xóa?');
        if(job!=true)
        {
            return false;
        }
    }

</script>
