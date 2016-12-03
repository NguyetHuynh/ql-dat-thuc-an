<?php
Class KhachHang_Model extends MY_Model
{
    var $table = 'khachhang';
    
/*
 * cap nhat thong tin khach hang
 */
    function updateKH($id, $ten, $sodt, $diachi)
    {
        $where = array('id' => $id);
        if(MY_Model::checkExist($where))
        {
            $data = array(
                'ten' =>  $ten,                
                'diachi' => $diachi,
                'sodt' => $sodt
            );
            MY_Model::update($id, $data);;
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
