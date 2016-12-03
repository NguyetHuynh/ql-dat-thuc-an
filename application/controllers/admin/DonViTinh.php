<?php
Class DonViTinh extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('DonViTinh_model');
    }
    
    function index()
    {
        $input = array();
        $list = $this->DonViTinh_model->getList($input);
        $this->data['list'] = $list;
        
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/DonViTinh/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * kiem tra da ton tai chua
     */
    function isExist($ten)
    {
        $ten = $this->input->post('ten');
        $where = array('ten' => $ten);
        if($this->DonViTinh_model->checkExist($where))
        {
            $this->form_validation->set_message(__FUNCTION__, '{field} đã tồn tại');
            return false;
        }
        return true;
    }
    
     /*
     * them đơn vị tính
     * http://localhost:8012/nguyetnhahang/admin/DonViTinh/add
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
            $this->form_validation->set_rules('ten', 'Tên đơn vị tính', 'required|callback_isExist');
            if($this->form_validation->run())
            {
                $ten = $this->input->post('ten');
                $data = array(
                    'ten' => $ten
                );
                  //insert vao DB
                if($this->DonViTinh_model->add($data))
                {
                    $message = $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');                
                }
                else {
                    $this->session->set_flashdata('message', 'Không thể thêm mới');
                } 
                //chuyen ve trang index
                redirect(admin_url('donvitinh'));
            }      
        } 

        $this->data['temp'] = 'admin/DonViTinh/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * chỉnh sửa đơn vị tính
     * http://localhost:8012/nguyetnhahang/admin/HinhThucPVu/edit/1
     */
    function edit()
    {
        //form validation
        $this->load->library('form_validation');
        $this->load->helper('form');   
        
        //lay id cua loai ta, nuoc uong
        $id = $this->uri->rsegment(3);
        $info = $this->DonViTinh_model->getInfoById($id);
        
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có hình thức phục vụ này');
            redirect(admin_url('DonViTinh'));
        }
        
        $this->data['info'] = $info;
        if($this->input->post())
        {
            $this->form_validation->set_rules('ten', 'Tên đơn vị tính', 'required|callback_isExist');
            if($this->form_validation->run())
            {
                $ten = $this->input->post('ten');
                $data = array(
                    'ten' => $ten
                );
                  //insert vao DB
                if($this->DonViTinh_model->update($id, $data)){
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu không thành công');
                }
                //chuyen toi trang index
                redirect(admin_url('donvitinh'));
            }      
        }
        $this->data['temp'] = 'admin/DonViTinh/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * xoa đơn vị tính
     */
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);//Get the integer value of a variable
        
        $info = $this->DonViTinh_model->getInfoById($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có đơn vị này');
            redirect(admin_url('donvitinh'));
        }
        $this->DonViTinh_model->delete($id);
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('donvitinh'));
    }
}

