<?php
Class LoaiThucAn extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('LoaiThucAn_model');
    }
    
    function index()
    {
        $input = array();
        $list = $this->LoaiThucAn_model->getList($input);
        $this->data['list'] = $list;
        
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/LoaiThucAn/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * kiem tra loai thuc an da ton tai chua
     */
    function isExist($ten)
    {
        $ten = $this->input->post('ten');
        $where = array('ten' => $ten);
        if($this->LoaiThucAn_model->checkExist($where))
        {
            $this->form_validation->set_message(__FUNCTION__, '{field} đã tồn tại');
            return false;
        }
        return true;
    }
       
    /*
     * them loai thuc an
     * http://localhost:8012/nguyetnhahang/admin/LoaiThucAn/add
     */
    function add()
    {
        //form validation
        $this->load->library('form_validation');
        $this->load->helper('form');        
        
        //load danh muc cha ra view
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->LoaiThucAn_model->getList($input);
        $this->data['list'] = $list;
        
        //lay DL tu view
        if($this->input->post())
        {
            //dat dk cho input ten
            $this->form_validation->set_rules('ten', 'Tên loại thức ăn', 'required|callback_isExist');
            if($this->form_validation->run())
            {
                $ten = $this->input->post('ten');
                $parent_id = $this->input->post('parent_id');
                $data = array(
                    'ten' => $ten,
                    'parent_id' => $parent_id
                );
                  //insert vao DB
                if($this->LoaiThucAn_model->add($data))
                {
                    $message = $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');                
                }
                else {
                    $this->session->set_flashdata('message', 'Không thể thêm mới');
                } 
                //chuyen ve trang index
                redirect(admin_url('loaithucan'));
            }      
        } 

        $this->data['temp'] = 'admin/LoaiThucAn/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * edit loai thuc an
     * http://localhost:8012/nguyetnhahang/admin/loaithucan/edit/11 11 là ID của sp
     */
    function edit()
    {
        //form validation
        $this->load->library('form_validation');
        $this->load->helper('form');   
        
        //load danh muc cha ra view
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->LoaiThucAn_model->getList($input);
        $this->data['list'] = $list;

        //lay id cua loai ta, nuoc uong
        $id = $this->uri->rsegment(3);
        $info = $this->LoaiThucAn_model->getInfoById($id);
        
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có loại thức ăn này');
            redirect(admin_url('loaithucan'));
        }
        
        $this->data['info'] = $info;
        if($this->input->post())
        {
//            $this->form_validation->set_rules('ten', 'Tên loại thức ăn', 'required|callback_isExist');
//            if($this->form_validation->run())
            {
                $ten = $this->input->post('ten');
                $parent_id = $this->input->post('parent_id');
                $data = array(
                    'ten' => $ten,
                    'parent_id' => $parent_id
                );
                  //insert vao DB
                if($this->LoaiThucAn_model->update($id, $data)){
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu không thành công');
                }
                //chuyen ve trang index
                redirect(admin_url('loaithucan'));
            }      
        }
        $this->data['temp'] = 'admin/LoaiThucAn/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * xoa loai thuc an
     */
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);//Get the integer value of a variable
        
        $info = $this->LoaiThucAn_model->getInfoById($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có loại thức ăn này');
            redirect(admin_url('loaithucan'));
        }
        $this->LoaiThucAn_model->delete($id);
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('loaithucan'));
    }
}

    
