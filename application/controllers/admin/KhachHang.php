<?php
Class KhachHang extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('khachhang_model');
    }
    
    function index()
    {
        $input = array();
        $list = $this->khachhang_model->getList($input);
        $this->data['list'] = $list;
        
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/KhachHang/index';
        $this->load->view('admin/main', $this->data);
    }
    /*
     * kiem tra da ton tai chua
     */
    function isExist($ten)
    {
        $sodt = $this->input->post('sodt');
        $where = array('sodt' => $sodt);
        if($this->khachhang_model->checkExist($where))
        {
            $this->form_validation->set_message(__FUNCTION__, '{field} đã tồn tại');
            return false;
        }
        return true;
    }
    
         /*
     * them khachhang
     * http://localhost:8012/nguyetnhahang/admin/khachhang/add
     */
    function add()
    {
        //form validation
        $this->load->library('form_validation');
        $this->load->helper('form');        

        //lay DL tu view
        if($this->input->post())
        {
            //dat dk cho input ten
            $this->form_validation->set_rules('ten', 'Tên khách hàng', 'required|callback_isExist');
            if($this->form_validation->run())
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
                if($this->khachhang_model->add($data))
                {
                    $message = $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');                
                }
                else {
                    $this->session->set_flashdata('message', 'Không thể thêm mới');
                } 
                //chuyen ve trang index
                redirect(admin_url('khachhang'));
            }      
        } 

        $this->data['temp'] = 'admin/KhachHang/add';
        $this->load->view('admin/main', $this->data);
    }
    /*
     * chỉnh sửa info khach hang
     */
    function edit()
    {
        //form validation
        $this->load->library('form_validation');
        $this->load->helper('form');   
        
        //lay id cua loai ta, nuoc uong
        $id = $this->uri->rsegment(3);
        $info = $this->khachhang_model->getInfoById($id);
        
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có khachhang này');
            redirect(admin_url('khachhang'));
        }
        
        $this->data['info'] = $info;
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
            if($this->khachhang_model->update($id, $data)){
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
            }else{
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu không thành công');
            }
            //chuyen toi trang index
           redirect(admin_url('khachhang'));    
        }
        $this->data['temp'] = 'admin/KhachHang/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * xoa khach hang
     */
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);//Get the integer value of a variable
        
        $info = $this->khachhang_model->getInfoById($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không khách hàng này');
            redirect(admin_url('khachhang')); 
        }
        $this->khachhang_model->delete($id);
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('khachhang')); 
    }
}

