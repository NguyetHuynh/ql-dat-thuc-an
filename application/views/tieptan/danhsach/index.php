<?php $this->load->view('tieptan/danhsach/head');?>

<?php 
    $this->load->model('khachhang_model');
?>
<div class="container">
    
    <?php $this->load->view('tieptan/message', $this->data);?>
    
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <p><b>Chú Thích: </b>
                <i class="fa fa-truck" aria-hidden="true" style="color:#F79508"></i><span> Nấu Xong - click để báo giao hàng | </span>
                <i class="fa fa-truck" aria-hidden="true" style="color:#5cb85c"></i><span> Đã Giao Hàng</span>
            </p>
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <caption>Danh Sách Phiếu Giao Hàng</caption>
                <thead>
                    <tr>
                        <th>Số HD</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Tổng Tiền</th>                        
                        <th>Tình Trạng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hoadon as $row):?>
                    <?php if($row->HINHTHUCID == 2)://neu la giao hang thi moi hien thi ?>
                    <tr>
                        <td><?php echo $row->ID ?></td>
                        <td><?php
                            $khID = $row->KHACHHANGID;
                            $khachhang = $this->khachhang_model->getInfoById($khID);                            
                                echo $khachhang->TEN;                        

                        ?></td>
                        <td><?php echo $khachhang->SODT?></td>
                        <td><?php
                            //tong tien
                            $this->load->model('chitiethoadon_model');
                            $this->load->model('thucan_model');
                            $input = array();
                            $input['where'] = array('hoadonid' => $row->ID);
                            $chitiet = $this->chitiethoadon_model->getList($input);
                            $total = 0;
                            foreach ($chitiet as $ct){
                                $total = $total + $ct->SOLUONG * $ct->DONGIA;
                            }
                            echo number_format($total);
                        ?></td>
<!--                        <td><?php echo $row->NGAY ?></td>-->
                        <td><?php
                            switch($row->TINHTRANG)
                            {
                                case 0: 
                                    echo 'Chưa Giao'; break;
                                case 1:
                                    echo 'Nấu Xong'; break;
                                case 2: 
                                    echo 'Đã Giao'; break;
                                case 3: 
                                    echo 'Thanh Toán'; break;
                            }
                        ?></td>
                        <td class="act-list">                            
                            <a class="ship" style="<?php 
                                if($row->TINHTRANG ==1){//if tinh trang trong hoadon la nau xong
                                    echo 'color:#F79508';//-> cho click vao nut giao hang
                                }
                                elseif ($row->TINHTRANG ==0) {
                                     echo 'pointer-events: none; color:#FAD99A';
                                }
                                else{//if tinh trang la da giao hang or da thanh toan thi chuyen sang xanh la
                                    echo 'pointer-events: none; color:#5cb85c';// va ko duoc click
                                }
                            ?>"  role="button" href="<?php echo tieptan_url('order/giaohang/'.$row->ID) ?>" data-toggle="tooltip" title="Giao Hàng"><i class="fa fa-truck" aria-hidden="true"></i></a>
                            <a href="<?php echo tieptan_url('order/content/'.$row->ID) ?>" data-toggle="tooltip" title="Xem chi tiết"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                            <?php if($row->TINHTRANG  == 0 ): //neu tinh trang != 0 chua nau thi cho sua ?>
                                <a href="<?php echo tieptan_url('order/detail/'.$row->ID) ?>" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                                <a href="<?php // echo tieptan_url('danhsach/delete/'.$row->ID) ?>" data-toggle="tooltip" title="Xóa">
                                    <i class="fa fa-trash" aria-hidden="true" onclick="return deleteConfirm()"></i>
                                </a>
                            <?php else: ?>
                                <a class="not-allow" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                                <a class="not-allow" data-toggle="tooltip" title="Xóa">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!--.tb-data-->
    </div>
</div><!--.content-->
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
