<?php
Class DatBan extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('ban_model');
        $this->load->model('phieudatban_model');
        $this->load->model('chitietdatban_model');
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
    }
    
    function index()
    {
        $phieuID = 0;
        $list = $this->ban_model->getList();
        $this->data['list'] = $list;
        
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
 
       if($this->input->post())
       {
           //lay thong tin tu form
            $ngaydung = $this->input->post('ngaydung');
            if($ngaydung < date('Y-m-d',now('Asia/Ho_Chi_Minh')))
            {
                $this->session->set_flashdata('message', 'Không thể chọn ngày nhỏ hơn ngày hiện tại');
                redirect(tieptan_url('datban'));
            }
            $gio = $this->input->post('gio');
            $sothuckhach = $this->input->post('sothuckhach');
            
           $data = array(
               'khachhangid' => 0,
               'ngaydung' => $ngaydung,
               'gio' => $gio,
               'sothuckhach' => $sothuckhach
           );
           if($this->phieudatban_model->add($data))
           {
               $phieuID = $this->db->insert_id();//lay id cua hoa don vua insert
                header('Location: '. tieptan_url('datban/chosetable/'.$phieuID));
           }else{
               $this->session->set_flashdata('message', 'Không thể thêm mới');
               redirect(tieptan_url('datban'));
           }
       }
        $this->data['phieuID'] = $phieuID;
        $this->data['temp'] = 'tieptan/datban/index';
        $this->load->view('tieptan/main', $this->data);
       
    }
    
    function chosetable()
    {
        //lay info trong phieu dat ban
        $phieuID = $this->uri->rsegment('3');   
        $this->data['phieuID'] = $phieuID;
        $phieuinfo = $this->phieudatban_model->getInfoById($phieuID);
        $this->data['phieuinfo'] = $phieuinfo;
        
        //lay nhung ban co ngay giong
        $ngaydung = $phieuinfo->NGAYDUNG;
        $gio = $phieuinfo->GIO;
        $giomin = $gio - 2;
        $giomax = $gio + 2;
        $sql = 'SELECT ID FROM ban '
                . 'WHERE id NOT IN( '
                . 'SELECT c.BANID FROM phieudatban AS p '
                . 'JOIN chitietdatban AS c '
                . 'ON p.ID = c.DATBANID'
                . ' AND p.NGAYDUNG = "'.$ngaydung.'" '
                . 'AND p.GIO '
                . 'BETWEEN "'.$giomin.':00"  AND "'. $giomax.':00") AND ban.STATUS=0';
        $ban = $this->phieudatban_model->query($sql);
//        pre($ban);
        $this->data['ban'] = $ban;
        
        $this->data['temp'] = 'tieptan/datban/chosetable';
        $this->load->view('tieptan/main', $this->data);
    }
    
    function update()
    {
        $phieuID = $this->uri->rsegment('3');  
        $info = $this->phieudatban_model->getInfoById($phieuID);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có phiếu đặt hàng này');
            redirect(tieptan_url('datban'));
        }
        
        if($this->input->post())
       {
           //lay thong tin tu form
            $ngaydung = $this->input->post('ngaydung');
            $gio = $this->input->post('gio');
            $sothuckhach = $this->input->post('sothuckhach');
            
            $data = array(
                'khachhangid' => 0,
                'ngaydung' => $ngaydung,
                'gio' => $gio,
                'sothuckhach' => $sothuckhach
            );          
            if($this->phieudatban_model->update($phieuID, $data)){
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
            }else{
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu không thành công');
            }
       }
       header('Location: '. tieptan_url('datban/chosetable/'.$phieuID));
    }
    
    function chose()
    {
        $phieuID = $this->uri->rsegment('3');  
        $tableID = $this->uri->rsegment('4');
        $data = array(
          'banid' => $tableID,
           'datbanid' => $phieuID
        );
        if($this->chitietdatban_model->add($data)){
            $this->session->set_flashdata('message', 'Chọn bàn thành công');
        }else{
            $this->session->set_flashdata('message', 'Không thể chọn bàn này. Vui lòng chọn lại');
        }
        header('Location: '. tieptan_url('datban/chosetable/'.$phieuID));
    }
    
    /*
     * nhap thong tin khach hang
     */
    function customer()
    {
        $this->load->model('khachhang_model');
        $phieuID = $this->uri->rsegment('3'); 
        $this->data['phieuID'] = $phieuID;
        $phieuinfo = $this->phieudatban_model->getInfoByID($phieuID);
        if($phieuinfo->KHACHHANGID != 0)
        {
            $khachhang = $this->khachhang_model->getInfoByID($phieuinfo->KHACHHANGID);
            $this->data['khachhang'] = $khachhang;
        }
        if($this->input->post())
        {            
            $ten = $this->input->post('ten');
            $sodt = $this->input->post('sodt');
            $diachi = $this->input->post('diachi');

            $where = array('sodt' => $sodt);
            //if chua co info khach hang trong DB thi luu vao
            if(!$this->khachhang_model->checkExist($where))
            {
                $dataKH = array( 'ten'=> $ten,'sodt'=> $sodt, 'diachi'  => $diachi);
                if($this->khachhang_model->add($dataKH))
                {
                    $khachhangid = $this->db->insert_id();                     
                }
            }else{
                $khachhang = $this->khachhang_model->getInfoRule($where);
//                    pre($khachhang);
                $khachhangid = $khachhang->ID;
            } 
            //update khachhang trong phieudatban
            $data = array('khachhangid' => $khachhangid);
            $this->phieudatban_model->update($phieuID, $data);
            header('Location: '. tieptan_url('datban/edit/'.$phieuID));
        }
        
        $this->data['temp'] = 'tieptan/datban/customer';
        $this->load->view('tieptan/main', $this->data);
    }
    
    /*
     * sua thong tin phieu dat ban
     */
    function edit()
    {
        $phieuID = $this->uri->rsegment('3'); 
        $this->data['phieuID'] = $phieuID;
        //lay thong tin ra
        $sql = 'SELECT p.*, c.BANID, c.DATBANID, k.TEN, k.DIACHI, k.SODT FROM phieudatban AS p
                JOIN chitietdatban AS c ON p.ID = c.DATBANID
                JOIN khachhang AS k ON p.KHACHHANGID = k.ID AND p.ID = '.$phieuID;
        $phieuinfo = $this->phieudatban_model->query($sql);
//        pre($phieuinfo);
        $this->data['phieuinfo'] = $phieuinfo;      
//        //update khachhang
        $this->load->model('khachhang_model');
        $khachhangID = $phieuinfo[0]->KHACHHANGID;

        if($this->input->post())
        {
            $ten = $this->input->post('ten');
            $sodt = $this->input->post('sodt');
            $diachi = $this->input->post('diachi');
            $ngaydung = $this->input->post('ngaydung');
            $gio = $this->input->post('gio');
            $sothuckhach = $this->input->post('sothuckhach');
            $data = array(
               'khachhangid' => $khachhangID,
               'ngaydung' => $ngaydung,
               'gio' => $gio,
               'sothuckhach' => $sothuckhach
           );
//          //update vao DB
            if($this->khachhang_model->updateKH($khachhangID, $ten, $sodt, $diachi) &&
                $this->phieudatban_model->update($phieuID, $data)){
                $this->session->set_flashdata('message', 'Cập nhật thông tin thành công');  
            }else{
                $this->session->set_flashdata('message', 'Cập nhật thông tin không thành công');
            }
            header('Location: '. tieptan_url('datban/edit/'.$phieuID));
        }
        $this->data['temp'] = 'tieptan/datban/edit';
        $this->load->view('tieptan/main', $this->data);
    }
    /*
     * xoa ban da dat
     */
    function deletetable()
    {
        $phieuID = $this->uri->rsegment('3'); 
        $banID = $this->uri->rsegment('4');
        $sql = 'SELECT * FROM chitietdatban WHERE datbanid = '.$phieuID;
        $count = $this->chitietdatban_model->getQuanty($sql);
        
        //neu > 1 ban moi cho xoa
        if($count>1)
        {
            $where = array('banid' => $banID, 'datbanid' => $phieuID);
            if($this->chitietdatban_model->deleteWhere($where))
            {
                $this->session->set_flashdata('message', 'Đã xóa bàn');  
            }
            else{
                $this->session->set_flashdata('message', 'Không thể xóa');  
            }
        }    else{
            $this->session->set_flashdata('message', 'Chỉ còn 1 bàn không thể xóa');  
        }
        header('Location: '. tieptan_url('datban/edit/'.$phieuID));
    }
    
    function danhsach()
    {
        $sql = 'SELECT p.*, k.TEN, k.SODT
                FROM phieudatban AS p
                JOIN khachhang AS k
                ON p.KHACHHANGID = k.ID';
        $phieu = $this->phieudatban_model->query($sql);
        
        $ban = $this->chitietdatban_model->getList();
        $this->data['phieu'] = $phieu;
        $this->data['ban'] = $ban;
        $this->data['temp'] = 'tieptan/datban/danhsach';
        $this->load->view('tieptan/main', $this->data);
    }
    
    /*
     * xoa phieu dat ban
     */
    function delete()
    {
        $phieuID = $this->uri->rsegment('3'); 
        $phieu = $this->phieudatban_model->getInfoById($phieuID);
        $time = $phieu->NGAYDUNG . ' ' . $phieu->GIO;
        $now = now('Asia/Ho_Chi_Minh');
        //if thoi gian dung >= thoi gian hien tai -> ko cho xoa
        if($now >= $time)
        {
            $this->session->set_flashdata('message', 'Đã quá thời hạn, không thể xóa');  
        }
        else{
            $where = array('datbanid' => $phieuID);
            if($this->phieudatban_model->delete($phieuID) &&
                    $this->chitietdatban_model->deleteWhere($where))
            {
                $this->session->set_flashdata('message', 'Xóa thành công');  
            } 
        }
        redirect(tieptan_url('datban/danhsach'));
    }
    
    function demo()
    {
        $phieu = $this->phieudatban_model->getInfoById(2);
        $time = $phieu->NGAYDUNG . ' ' . $phieu->GIO;
//        $this->load->helper('date');
        
        $aa = now('Asia/Ho_Chi_Minh');
        echo date("Y-m-d  H:i:s", $aa);
        if($aa >= $time)
        {
            echo "\ntrue";
        }
        else{
            echo "0";
        }
    }
}

