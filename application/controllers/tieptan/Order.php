<?php
Class Order extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('thucan_model');
        $this->load->model('chitiethoadon_model');
        $this->load->model('hoadon_model');
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
    }
    
    /*
     * lay loai thuc an + hien thi ds thuc an theo loai
     */
    function  catfood()
    {
        $hoadonID = $this->uri->rsegment('3');
        $this->data['hoadonID'] = $hoadonID;
        
        //lay danh sach loai thuc an
        $this->load->model('LoaiThucAn_model');
        $input = array();
        $input['where'] = array('parent_id >' => 0);
        $loai = $this->LoaiThucAn_model->getList($input);
        $this->data['loai'] = $loai;
        
        //lay id loai thuc an   
        $id = $this->uri->rsegment('4');
        //ko co loaitaid or trang dau tien
        if($id<=0)
        {
            $id = 3;
        }       
        
        //lay tdanh sach thuc an theo loai thuc an
        $input = array();
        $input['where'] = array('loaitaid' => $id);
        $list = $this->thucan_model->getList($input);
        $this->data['list'] = $list;
//        pre($list);
        
        $this->data['temp'] = 'tieptan/food/catalog';
        $this->load->view('tieptan/main', $this->data);
    }
    
    /*
     * them vao chi tiet hoa don
     */
    function add()
    {
        $hoadonID = $this->uri->rsegment('3');
        $TA_ID = $this->uri->rsegment('4');
        
        //kiem tra thuc an co ton tai ko
        $food = $this->thucan_model->getInfoById($TA_ID);
        if(!$food)
        {
            redirect('tieptan/order/catfood/');
        }
        
        $soluong = 1;
        //kiem tra neu hoadonID va TA_ID da ton tai va duoc chon lan >=2 thi tang so luong len 1
//        $exist = array(
//            'hoadonID' => $hoadonID,
//            'ta_id' => $TA_ID
//        );
//        if($this->chitiethoadon_model->checkExist($exist))
//        {
//            $info = $this->chitiethoadon_model->getInfoRule($exist);
//            $soluong = $info->SOLUONG + 1;
//            $data = array('soluong' => $soluong);
//            $this->chitiethoadon_model->update_rule($exist, $data);
//        } 
//        else{           
            $dongia = $food->DONGIA;
            //if co giam gia thi tru phan tien duoc giam gia lun
            if($food->GIAMGIA > 0)
            {
                $food->DONGIA*(1-$food->GIAMGIA/100);
            }

            $data = array(
                'TA_ID' => $TA_ID,
                'hoadonid' => $hoadonID,
                'soluong' => $soluong,
                'dongia' => $dongia,
                'tinhtrang' => 0 // 0 - dang chuan bi mon an, 1 - prepared, 2 - severed
            );
            //insert vao DB
            $this->chitiethoadon_model->add($data);             
        //}//else exist       
        
        //cap nhat luot mua thuc an
        $luotmua = $food->SOLUOTCHON+1;
        $foodData = array('soluotchon' => $luotmua);
        $this->thucan_model->update($TA_ID, $foodData);  
        
        ////chuyen sang trang xem chi tiet order
        header('Location: '.tieptan_url('order/detail/'.$hoadonID));
    }
    
    /*
     * hien thi chi tiet hoa don va edit
     */
    function detail()
    {
        $hoadonID = $this->uri->rsegment('3');
        $this->data['hoadonID'] = $hoadonID;
        
        //lay info khach hang
        $hoadon = $this->hoadon_model->getInfoById($hoadonID);
        $khachhangID = $hoadon->KHACHHANGID;
        $this->load->model('khachhang_model');
        $where = array('id' => $khachhangID);
        $khachhang = $this->khachhang_model->getInfoRule($where);
//        $khachhang = $this->khachhang_model->getInfoById($khachhangID);
        $this->data['khachhang'] = $khachhang;
        
        //lay thuc an trong chi tiet hoa don
        $input = array();
        $input['where'] = array('hoadonid' => $hoadonID);
        $chitiet = $this->chitiethoadon_model->getList($input);
        $this->data['chitiet'] = $chitiet;
        
        //lay phi phuc vu
        $hinhthucID = $hoadon->HINHTHUCID;
        $this->load->model('hinhthucpvu_model');
        $phipv = $this->hinhthucpvu_model->getInfoById($hinhthucID);
        $this->data['phipv'] = $phipv;
        
        $this->data['temp'] = 'tieptan/food/detail';
        $this->load->view('tieptan/main', $this->data);
    }
    
    /*
     * readonly chi tiet hoa don 
     */
    function content()
    {
        $hoadonID = $this->uri->rsegment('3');
        $this->data['hoadonID'] = $hoadonID;
        
        //lay info khach hang
        $hoadon = $this->hoadon_model->getInfoById($hoadonID);
        $khachhangID = $hoadon->KHACHHANGID;
        $this->load->model('khachhang_model');
        $where = array('id' => $khachhangID);
        $khachhang = $this->khachhang_model->getInfoRule($where);
        $this->data['khachhang'] = $khachhang;
        
        //lay thuc an trong chi tiet hoa don
        $input = array();
        $input['where'] = array('hoadonid' => $hoadonID);
        $chitiet = $this->chitiethoadon_model->getList($input);
        $this->data['chitiet'] = $chitiet;
        
        //lay phi phuc vu
        $hinhthucID = $hoadon->HINHTHUCID;
        $this->load->model('hinhthucpvu_model');
        $phipv = $this->hinhthucpvu_model->getInfoById($hinhthucID);
        $this->data['phipv'] = $phipv;
        
        $this->data['temp'] = 'tieptan/food/content';
        $this->load->view('tieptan/main', $this->data);
    }
    
    /*
     * update order
     */
    function update()
    {
        $this->load->model('khachhang_model');
        
        $hoadonID = $this->input->post('hoadonID');    
        $this->data['hoadonID'] = $hoadonID;
        $TA_ID = $this->input->post('ta_id');        
        $soluong = $this->input->post('soluong');

        //update khachhang
        $khachhangID = $this->input->post('khachhangID');
        $khachhang = $this->khachhang_model->getInfoById($khachhangID);
        
        if(!$khachhang)
        {
            $this->session->set_flashdata('message', 'Không có khách hàng này');
            header('Location: '.tieptan_url('order/detail/'.$hoadonID));
        }        
        
        $this->data['khachhang'] = $khachhang;
        if($this->input->post())
        {
            $ten = $this->input->post('ten');
            $sodt = $this->input->post('sodt');
            $diachi = $this->input->post('diachi');
            $data = array(
                'ten' => $ten,
                'sodt' => $sodt,
                'diachi' => $diachi
            );
              //insert vao DB
            if($this->khachhang_model->update($khachhangID, $data)){
                $this->session->set_flashdata('message', 'Cập nhật thông tin khách thành công');
            }else{
                $this->session->set_flashdata('message', 'Cập nhật thông tin khách không thành công');
            }
        }
        
        //update order
        $updateArray = array();
        for($x = 0; $x < sizeof($TA_ID); $x++){
            
            $where = array(
                'hoadonID' => $hoadonID,
                'ta_id'   => $TA_ID[$x]
            );
            $updateArray = array(
                'soluong' => $soluong[$x]
            );
            $this->chitiethoadon_model->update_rule($where, $updateArray);
        }
        header('Location: '.tieptan_url('order/detail/'.$hoadonID));
    }
    
    /*
     * delete thuc an trong hoa don
     */
    function delete()
    {
        $hoadonID = $this->uri->rsegment('3');
        $TA_ID = $this->uri->rsegment('4');
        
        $where = array(
            'ta_id'    => $TA_ID,
            'hoadonId' => $hoadonID
        );
        $chitiet = $this->chitiethoadon_model->getInfoRule($where);
        if($chitiet->TINHTRANG ==0)
        {
            $this->chitiethoadon_model->deleteWhere($where);
            //lay noi dung thong bao
            $message = $this->session->set_flashdata('message', 'Xóa thành công');      
        }
        else{
            $message = $this->session->set_flashdata('message', 'Đã nấu, không thể xóa');     
        }
        $this->data['message'] = $message;
        header('Location: '.tieptan_url('order/detail/'.$hoadonID));
    }
    
    /*
     * tiep tan chon giao hang cap nhat trang thai --> 2 - giao hang
     */
    function giaohang()
    {
        $hoadonID = $this->uri->rsegment('3');
        
        //update hoa don
        $data = array('tinhtrang' => 2);
        $this->hoadon_model->update($hoadonID, $data);
        
        //update chitiet
        $where = array('hoadonid' => $hoadonID);
        $data = array('tinhtrang' => 3);
        $this->chitiethoadon_model->update_rule($where, $data);
        
        redirect(tieptan_url('danhsach'));
    }
}
