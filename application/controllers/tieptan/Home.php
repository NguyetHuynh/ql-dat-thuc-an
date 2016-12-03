<?php
Class Home extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('khachhang_model');
        $this->load->model('hoadon_model');
    }
    
    function  index()
    {
        $hoadonID = 0;
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //thoa dieu kien dau vao moi insert vao
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_rules('khachhangid', 'Khách Hàng', 'callback_isExist');           
        $khachhangid = $this->input->post('khachhangid');
        if($this->input->post())
        {
            if($khachhangid!=0&&$this->form_validation->run())
            {
                $khachhangid = $this->input->post('khachhangid');
                $khachhang = $this->khachhang_model->getInfoById($khachhangid);
                $this->data['khachhang'] = $khachhang;//in DL khach hang len form lun co duoc ko?                
            }
            else{
                $tenkhachhang = $this->input->post('tenkhachhang');
                $sodt = $this->input->post('sodt');
                $diachi = $this->input->post('diachi');
                
                $where = array('sodt' => $sodt);
                //if chua co info khach hang trong DB thi luu vao
                if(!$this->khachhang_model->checkExist($where))
                {
                    $dataKH = array(
                        'ten'     => $tenkhachhang,
                        'sodt'    => $sodt,
                        'diachi'  => $diachi
                    );
                    $this->khachhang_model->add($dataKH);
                    $khachhangid = $this->db->insert_id();
                }else{
                    $khachhang = $this->khachhang_model->getInfoRule($where);
//                    pre($khachhang);
                    $khachhangid = $khachhang->ID;
                }                       
            }
            //DL insert vao hoa don
            $data = array(
                  'khachhangid' => $khachhangid,
                   'hinhthucid' => 2
            );
//            pre($data);
            if($this->hoadon_model->add($data))
            {
                $hoadonID = $this->db->insert_id();
                $this->data['hoadonID'] = $hoadonID;
                header('Location: '.tieptan_url('order/catfood/'.$hoadonID));
            }
            else{
                $this->session->set_flashdata('message', 'Không thể thêm mới');
                redirect(tieptan_url());
            }
        } 
        $this->data['hoadonID'] = $hoadonID;
        $this->data['temp'] = 'tieptan/home/index';
        $this->load->view('tieptan/main', $this->data);
    }
    
    /*
     * kiem tra userid co ton tai ko
     */
    function isExist($ten)
    {
        $khachhangid = $this->input->post('khachhangid');
        $where = array('id' => $khachhangid);
        if(!$this->khachhang_model->checkExist($where))
        {
            $this->form_validation->set_message(__FUNCTION__, '{field} không tồn tại');
            return false;
        }
        return true;
    }
    
    
    /*
     * them vao hoa don
     */
    function add()
    {
        
//        $this->data['temp'] = 'tieptan/home/index';
//        $this->load->view('tieptan/main', $this->data);
    }
}