<?php
Class Ban extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('ban_model');
    }
    
    /*
     *http://localhost:8012/nguyetnhahang/admin/ban
     */
    function index()
    {
        $input = array();
        $list = $this->ban_model->getList($input);
        $this->data['list'] = $list;
        
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/Ban/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * them ban moi
     */
      function add()
    {
        //lay DL tu view
        if($this->input->post())
        {
            //dat dk cho input ten    
            $tinhtrang = $this->input->post('tinhtrang');
            $data = array(
                'tinhtrang' => $tinhtrang
            );
              //insert vao DB
            if($this->ban_model->add($data))
            {
                $message = $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');                
            }
            else {
                $this->session->set_flashdata('message', 'Không thể thêm mới');
            } 
            //chuyen ve trang index
            redirect(admin_url('ban'));    
        } 

        $this->data['temp'] = 'admin/ban/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * 
     */
    function edit()
    {
        //lay id cua loai ta, nuoc uong
        $id = $this->uri->rsegment(3);
        $info = $this->ban_model->getInfoById($id);
        
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có bàn này');
            redirect(admin_url('Ban'));
        }
        
        $this->data['info'] = $info;
        if($this->input->post())
        {
            
            $tinhtrang = $this->input->post('tinhtrang');
            $data = array(
                'tinhtrang' => $tinhtrang
            );
              //insert vao DB
            if($this->ban_model->update($id, $data)){
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
            }else{
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu không thành công');
            }
            //chuyen toi trang index
            redirect(admin_url('ban'));      
        }
        $this->data['temp'] = 'admin/ban/edit';
        $this->load->view('admin/main', $this->data);
    }
}

