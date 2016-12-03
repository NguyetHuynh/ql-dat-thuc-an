<?php
Class ChucVu extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('ChucVu_model');
    }
    
    function index()
    {
        $input = array();
        $list = $this->ChucVu_model->getList($input);
        $this->data['list'] = $list;
        
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/ChucVu/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * kiem tra da ton tai chua
     */
    function isExist($ten)
    {
        $ten = $this->input->post('ten');
        $where = array('ten' => $ten);
        if($this->ChucVu_model->checkExist($where))
        {
            $this->form_validation->set_message(__FUNCTION__, '{field} đã tồn tại');
            return false;
        }
        return true;
    }
    
    /*
     * them chuc vu
     * http://localhost:8012/nguyetnhahang/admin/chucvu/add
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
            $this->form_validation->set_rules('ten', 'Tên chức vụ', 'required|callback_isExist');
            if($this->form_validation->run())
            {
                $ten = $this->input->post('ten');
                $data = array(
                    'ten' => $ten
                );
                  //insert vao DB
                if($this->ChucVu_model->add($data))
                {
                    $message = $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');                
                }
                else {
                    $this->session->set_flashdata('message', 'Không thể thêm mới');
                } 
                //chuyen ve trang index
                redirect(admin_url('chucvu'));
            }      
        } 

        $this->data['temp'] = 'admin/chucvu/add';
        $this->load->view('admin/main', $this->data);
    }
    
     /*
     * chỉnh sửa đơn vị tính
     * http://localhost:8012/nguyetnhahang/admin/chucvu/edit/1
     */
    function edit()
    {
        //form validation
        $this->load->library('form_validation');
        $this->load->helper('form');   
        
        //lay id cua loai ta, nuoc uong
        $id = $this->uri->rsegment(3);
        $info = $this->ChucVu_model->getInfoById($id);
        
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có chức vụ này');
            redirect(admin_url('ChucVu'));
        }
        
        $this->data['info'] = $info;
        if($this->input->post())
        {
//            $this->form_validation->set_rules('ten', 'Tên chức vụ', 'required|callback_isExist');
//            if($this->form_validation->run())
            {
                $ten = $this->input->post('ten');
                $data = array(
                    'ten' => $ten
                );
                  //insert vao DB
                if($this->ChucVu_model->update($id, $data)){
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu không thành công');
                }
                //chuyen toi trang index
                redirect(admin_url('ChucVu'));
            }      
        }
        $this->data['temp'] = 'admin/ChucVu/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * xoa chức vụ
     */
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);//Get the integer value of a variable
        
        $info = $this->ChucVu_model->getInfoById($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có chức vụ này');
            redirect(admin_url('chucvu'));
        }
        $this->ChucVu_model->delete($id);
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('chucvu'));
    }
}

