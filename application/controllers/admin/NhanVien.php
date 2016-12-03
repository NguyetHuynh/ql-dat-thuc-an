<?php
Class NhanVien extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('nhanvien_model');
    }
    
    function index()
    {
        $input = array();
        $list = $this->nhanvien_model->getList($input);
        $this->data['list'] = $list;
        
        //load chuc vu
        $this->load->model('ChucVu_model');
        $input = array();
        $chucvu = $this->ChucVu_model->getList($input);
        $this->data['chucvu'] = $chucvu;
        
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/nhanvien/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * them nhan vien moi
     */
    function add()
    {
        //load chuc vu ra
        $this->load->model('chucvu_model');
        $input = array();
        $chucvu = $this->chucvu_model->getList($input);
        $this->data['chucvu'] = $chucvu;
        
        //thoa dieu kien dau vao moi insert vao
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post())
        {
            $this->form_validation->set_rules('password', 'Mật khẩu', 'min_length[8]');            
            $this->form_validation->set_rules('repassword', 'Nhập lại mật khẩu', 'matches[password]');
            
            if($this->form_validation->run())
            {
                //lay DL tu view
                $ho = $this->input->post('ho');
                $ten = $this->input->post('ten');
                $luong = $this->input->post('luong');
                $chucvu = $this->input->post('chucvuid');
                $password = $this->input->post('password');  
                //do use plugin jQuery number --> chuyen ve dang so moi insert duoc
                $luong = str_replace(',', '', $luong);
                
                $data = array(
                    'ho' => $ho,
                    'ten' => $ten,
                    'chucvuid' => $chucvu,                    
                    'password' => md5($password),
                    'luong' => $luong
                );
                if($this->nhanvien_model->add($data))
                {
                    $message = $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');                
                }
                else {
                    $this->session->set_flashdata('message', 'Không thể thêm mới');
                } 
                //chuyen ve trang index
                redirect(admin_url('nhanvien'));
            }
        }
        
        $this->data['temp'] = 'admin/nhanvien/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * chinh sua
     */
    function edit()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $info = $this->nhanvien_model->getInfoById($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại nhân viên này');
            redirect(admin_url('nhanvien'));
        }
        $this->data['info'] = $info;
        
        //load chuc vu ra
        $this->load->model('chucvu_model');
        $input = array();
        $chucvu = $this->chucvu_model->getList($input);
        $this->data['chucvu'] = $chucvu;        
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        if($this->input->post())
        {        
            $this->form_validation->set_rules('ho', 'Họ', 'required');
            $this->form_validation->set_rules('ten', 'Tên', 'required');
            $this->form_validation->set_rules('chucvuid', 'Chức Vụ', 'required');
            
            $password = $this->input->post('password');
            //nếu có nhập password thì kiểm tra
            if($password)
            {
                $this->form_validation->set_rules('password', 'Mật khẩu', 'min_length[8]');            
                $this->form_validation->set_rules('repassword', 'Nhập lại mật khẩu', 'matches[password]');
            }          
            if($this->form_validation->run())
            {
                //lay DL tu view
                $ho = $this->input->post('ho');
                $ten = $this->input->post('ten');
                $luong = $this->input->post('luong');
                $chucvu = $this->input->post('chucvuid');
                //do use plugin jQuery number --> chuyen ve dang so moi insert duoc
                $luong = str_replace(',', '', $luong);

                $data = array(
                    'ho' => $ho,
                    'ten' => $ten,
                    'chucvuid' => $chucvu,                    
                    'luong' => $luong
                );
                if($password)
                {
                    $data['password'] = md5($password);
                }
                if($this->nhanvien_model->update($id, $data))
                {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');                
                }
                else {
                    $this->session->set_flashdata('message', 'Không thể cập nhật dữ liệu');
                } 
            }
            
            //chuyen ve trang index
            redirect(admin_url('nhanvien'));
        }
        
        $this->data['temp'] = 'admin/nhanvien/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        
        $info = $this->nhanvien_model->getInfoById($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại nhân viên này');
            redirect(admin_url('nhanvien'));
        }
        $this->nhanvien_model->delete($id);
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('nhanvien'));
    }


    /*
     * dang xuat
     */
    function logout()
    {
        if($this->session->userdata('login'))
        {
            $this->session->unset_userdata('login');
            redirect('home');
        }
    }
}
