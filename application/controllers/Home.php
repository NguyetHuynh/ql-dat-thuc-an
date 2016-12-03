<?php
Class Home extends My_Controller
{
    function __construct() {
        parent::__construct();
    }
    /*
     * Unable to access an error message corresponding to your field name
     * danh sai ten ham o callback_check_login --> callback_checkLogin
     */
    
    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post())
        {
            $ID = $this->input->post('ID');
            $this->load->model('nhanvien_model');
            
            //$chucvu = $info['CHUCVUID'];
            $this->form_validation->set_rules('ID', 'Mã nhân viên', 'callback_checkID');
            $this->form_validation->set_rules('login', 'login', 'callback_checkLogin');
            if($this->form_validation->run())
            {
                $info = $this->nhanvien_model->getInfoById($ID);
                $chucvu = $info->CHUCVUID;
                $this->session->set_userdata('login', $ID);
                switch ($chucvu)
                {
                    case 1:
                        redirect('admin/home');
                        break;
                    case 2:
                        redirect('waiter/home');
                        break;
                    case 4:
                        redirect('tieptan/home');
                        break;
                    case 5:
                        redirect('chef/home');
                        break;
                    case 6:
                        redirect('ketoan/home');
                        break;
                    default:
                        redirect('home');
                        break;
                }                
            }            
        }
        
        $data = array();
        $this->load->view('login');
    }
    
    function checkLogin()
    {
        $ID = $this->input->post('ID');
        $password = $this->input->post('password');
        $password = md5($password);
        
        $this->load->model('nhanvien_model');
        $where = array('ID' => $ID, 'password' => $password);
        if($this->nhanvien_model->checkExist($where))
        {
            return TRUE;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Sai mật khẩu hoặc mã nhân viên');
        return false;
    }
//    function test()
//    {
//        session_start();
//    }
    
    function checkID()
    {
        $ID = $this->input->post('ID');
        $this->load->model('nhanvien_model');
        $where = array('ID' => $ID);
        if($this->nhanvien_model->checkExist($where))
        {
            return TRUE;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Mã nhân viên không tồn tại');
        return false;
    }
}
