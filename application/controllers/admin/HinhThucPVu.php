<?php
Class HinhThucPVu extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('HinhThucPVu_model');
    }
    
    //http://localhost:8012/nguyetnhahang/admin/HinhThucPVu
    function index()
    {
        $input = array();
        $list = $this->HinhThucPVu_model->getList($input);
        $this->data['list'] = $list;
        
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/HinhThucPVu/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * kiem tra da ton tai chua
     */
    function isExist($ten)
    {
        $ten = $this->input->post('ten');
        $where = array('ten' => $ten);
        if($this->HinhThucPVu_model->checkExist($where))
        {
            $this->form_validation->set_message(__FUNCTION__, '{field} đã tồn tại');
            return false;
        }
        return true;
    }
    
    /*
     * them loai hình thức phục vụ
     * http://localhost:8012/nguyetnhahang/admin/HinhThucPVu/add
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
            $this->form_validation->set_rules('ten', 'Tên hình thức phục vụ', 'required|callback_isExist');
            if($this->form_validation->run())
            {
                $ten = $this->input->post('ten');
                $phipv = $this->input->post('phipv');
                $data = array(
                    'ten' => $ten,
                    'phipv' => $phipv
                );
                  //insert vao DB
                if($this->HinhThucPVu_model->add($data))
                {
                    $message = $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');                
                }
                else {
                    $this->session->set_flashdata('message', 'Không thể thêm mới');
                } 
                //chuyen ve trang index
                redirect(admin_url('hinhthucpvu'));
            }      
        } 

        $this->data['temp'] = 'admin/HinhThucPVu/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * chỉnh sửa hình thức phục vụ
     * http://localhost:8012/nguyetnhahang/admin/HinhThucPVu/edit/1
     */
    function edit()
    {
        //form validation
        $this->load->library('form_validation');
        $this->load->helper('form');   
        
        //lay id cua loai ta, nuoc uong
        $id = $this->uri->rsegment(3);
        $info = $this->HinhThucPVu_model->getInfoById($id);
        
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có hình thức phục vụ này');
            redirect(admin_url('hinhthucpvu'));
        }
        
        $this->data['info'] = $info;
        if($this->input->post())
        {
            $this->form_validation->set_rules('ten', 'Tên hình thức phục vụ', 'required|callback_isExist');
            if($this->form_validation->run())
            {
                $ten = $this->input->post('ten');
                $phipv = $this->input->post('phipv');
                $data = array(
                    'ten' => $ten,
                    'phipv' => $phipv
                );
                  //insert vao DB
                if($this->HinhThucPVu_model->update($id, $data)){
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu không thành công');
                }
                //chuyen ve trang index
                redirect(admin_url('hinhthucpvu'));
            }      
        }
        $this->data['temp'] = 'admin/hinhthucpvu/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * xoa hình thức phục vụ
     */
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);//Get the integer value of a variable
        
        $info = $this->HinhThucPVu_model->getInfoById($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có hình thức phục vụ này');
            redirect(admin_url('hinhthucpvu'));
        }
        $this->HinhThucPVu_model->delete($id);
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('hinhthucpvu'));
    }
}
