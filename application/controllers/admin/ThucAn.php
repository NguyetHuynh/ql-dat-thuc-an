<?php
Class ThucAn extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('thucan_model');
    }
    
    //http://localhost:8012/nguyetnhahang/admin/thucan
    function index()
    {
        $input = array();
        $list = $this->thucan_model->getList($input);
        $this->data['list'] = $list;
        
        //lay noi dung thong bao
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/thucan/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * kiem tra da ton tai chua
     */
    function isExist($ten)
    {
        $ten = $this->input->post('ten');
        $where = array('ten' => $ten);
        if($this->thucan_model->checkExist($where))
        {
            $this->form_validation->set_message(__FUNCTION__, '{field} đã tồn tại');
            return false;
        }
        return true;
    }
    
    /*
     * them moi thuc an
     * http://localhost:8012/nguyetnhahang/admin/ThucAn/add
     */
    function add()
    {
        //load loai thuc an
        $this->load->model('LoaiThucAn_model');
        $input = array();
        $input['where'] = array('parent_id'=> 0);
        $loai = $this->LoaiThucAn_model->getList($input);
        foreach ($loai as $row)
        {
            $input['where'] = array('parent_id' => $row->ID);
            $sub = $this->LoaiThucAn_model->getList($input);
            $row->sub = $sub;
        }
        $this->data['loai'] = $loai;

        //load don vi tinh
        $this->load->model('DonViTinh_model');
        $input2 = array();
        $donvi = $this->DonViTinh_model->getList($input2);
        $this->data['donvi'] = $donvi;
        
        //form validation
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post())
        {
            $this->form_validation->set_rules('ten', 'Tên thức ăn', 'required|callback_isExist');            
            if($this->form_validation->run())
            {
                //lay DL tu view
                $ten = $this->input->post('ten');
                $loai = $this->input->post('loaitaid');
                $dongia = $this->input->post('dongia');
                $giamgia = $this->input->post('giamgia');
                $madv = $this->input->post('madv');
                $mota = $this->input->post('mota');   
                //do use plugin jQuery number --> chuyen ve dang so moi insert duoc
                $dongia = str_replace(',', '', $dongia);
                
                $data = array(
                    'ten' => $ten,
                    'loaitaid' => $loai,
                    'dongia' => $dongia,
                    'giamgia' => $giamgia,
                    'madv' => $madv,
                    'mota' => $mota
                );
                if($this->thucan_model->add($data))
                {
                    $message = $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');                
                }
                else {
                    $this->session->set_flashdata('message', 'Không thể thêm mới');
                } 
                //chuyen ve trang index
                redirect(admin_url('thucan'));
            }
        }
 
        $this->data['temp'] = 'admin/thucan/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * chỉnh sửa thức ăn
     */
    function edit()
    {
        $id = $this->uri->rsegment(3);
        $info = $this->thucan_model->getInfoById($id);
        
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có thức ăn này');
            redirect(admin_url('thucan'));
        }
        $this->data['info'] = $info;

        //load loai thuc an
        $this->load->model('LoaiThucAn_model');
        $input = array();
        $input['where'] = array('parent_id'=> 0);
        $loai = $this->LoaiThucAn_model->getList($input);
        foreach ($loai as $row)
        {
            $input['where'] = array('parent_id' => $row->ID);
            $sub = $this->LoaiThucAn_model->getList($input);
            $row->sub = $sub;
        }
        $this->data['loai'] = $loai;

        //load don vi tinh
        $this->load->model('DonViTinh_model');
        $input2 = array();
        $donvi = $this->DonViTinh_model->getList($input2);
        $this->data['donvi'] = $donvi;
        
        if($this->input->post())
        {
            //lay DL tu view
            $ten = $this->input->post('ten');
            $loai = $this->input->post('loaitaid');
            $dongia = $this->input->post('dongia');
            $giamgia = $this->input->post('giamgia');
            $madv = $this->input->post('madv');
            $mota = $this->input->post('mota');   
            //do use plugin jQuery number --> chuyen ve dang so moi insert duoc
            $dongia = str_replace(',', '', $dongia);

            $data = array(
                'ten' => $ten,
                'loaitaid' => $loai,
                'dongia' => $dongia,
                'giamgia' => $giamgia,
                'madv' => $madv,
                'mota' => $mota
            );
            if($this->thucan_model->update($id, $data))
            {
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');                
            }
            else {
                $this->session->set_flashdata('message', 'Không thể cập nhật');
            } 
            //chuyen ve trang index
            redirect(admin_url('thucan'));
        }
 
        $this->data['temp'] = 'admin/thucan/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * xóa thức ăn
     */
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);//Get the integer value of a variable
        
        $info = $this->thucan_model->getInfoById($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có đơn vị này');
            redirect(admin_url('thucan'));
        }
        $this->thucan_model->delete($id);
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('thucan'));
    }
    /*
     * xem chi tiết thức ăn
     */
    function detail()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);//Get the integer value of a variable
        
        $info = $this->thucan_model->getInfoById($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không có đơn vị này');
            redirect(admin_url('thucan'));
        }
        $this->data['info'] = $info;
        
        //load loai thuc an
        $this->load->model('LoaiThucAn_model');
        $where = array('ID'=> $info->LOAITAID);
        $loai = $this->LoaiThucAn_model->getInfoRule($where, 'TEN');
        $this->data['loai'] = $loai;

        //load don vi tinh
        $this->load->model('DonViTinh_model');
        $where= array('ID'=> $info->MADV);
        $donvi = $this->DonViTinh_model->getInfoRule($where, 'TEN');
        $this->data['donvi'] = $donvi;
        
        $this->data['temp'] = 'admin/thucan/detail';
        $this->load->view('admin/main', $this->data);
    }
}

