<?php $this->load->view('tieptan/food/head') ?>
<div class="row">
    <div class="col-sm-8 col-md-offset-2">
        <div class="panel">
            
            <form class="form-horizontal " action="<?php echo tieptan_url('order/update/'.$hoadonID) ?>" method="post"> 
                <legend>Thông Tin Đặt Hàng</legend>
                
                    <?php $this->load->view('tieptan/message', $this->data);?>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="hoadonID">Số Hóa Đơn: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  disabled="disabled"  value="<?php echo $hoadonID ?>" required>
                        <input type="hidden" name="hoadonID" value="<?php echo $hoadonID ?>"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="ten">Tên: <span class="required">*</span></label>
                    <div class="col-sm-9">
                      <input type="hidden" name="khachhangID" value="<?php echo $khachhang->ID ?>"> 
                      <input type="text" class="form-control"  id="ten" name="ten" value="<?php echo $khachhang->TEN ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="price">Số Điện Thoại: <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="sodt" name="sodt" value="<?php echo $khachhang->SODT ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="dc">Địa Chỉ: <span class="required">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="dc" name="diachi" value="<?php echo $khachhang->DIACHI ?>" required>
                    </div>
                </div>
                                         
                <table class="table billTable">
                    <thead>
                        <tr>
                            <th>Tên Món</th>
                            <th>Số Lượng</th>
                            <th >Đơn Giá</th>                            
                            <th class="col-price">Số Tiền</th>
                            <th>Tình trạng</th>
                            <th></th>
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
                                <input type="hidden" name="ta_id[]" value="<?php echo $row->TA_ID; ?>">
                            </td>
                            
                            <td><input id="soluong" type="number"  name="soluong[]" min="1" value="<?php echo $row->SOLUONG ?>" size="5" required="required"></td>
                            <td class="col-price"><?php echo number_format($row->DONGIA) ?></td>
                            <td class="col-price">
                                <?php 
                                    $sotien = $row->DONGIA* $row->SOLUONG;
                                    echo number_format($sotien) ;
                                ?>
                            </td>
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
<!--                                <a href="<?php //echo tieptan_url('giaohang/edit/'.$row->HOADONID.'/'.$row->TA_ID) ?>" data-toggle="tooltip" title="Chỉnh sửa"><i class="fa fa-wrench" aria-hidden="true"></i></a>-->
                                <a href="<?php echo tieptan_url('order/delete/'.$row->HOADONID.'/'.$row->TA_ID) ?>" data-toggle="tooltip" title="Xóa">
                                    <i class="fa fa-trash" aria-hidden="true" onclick="return deleteConfirm()"></i>
                                </a>
                            </td>
                        </tr>            
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Phí Giao Hàng:</td>
                            <td colspan="2" class="col-price"><?php echo number_format($phipv->PHIPV) ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span>Thành Tiền:</span></b></td>
                            <td colspan="2" class="col-price col-total">
                                <?php 
                                    $thanhtien = $total + $phipv->PHIPV;
                                    echo number_format($thanhtien) ;
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="pull-right ">
                    <button class="btn btn-primary" type="submit">Gửi Nhà Bếp</button>
                    <a href="<?php echo tieptan_url('order/catfood/'.$hoadonID) ?>" class="btn btn-success" role="button">Thêm Món</a>
                </div>
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
