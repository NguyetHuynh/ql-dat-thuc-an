<?php
Class Food extends My_Controller
{
    var $spec = array();
    function __construct() {
        parent::__construct();
        $this->load->model('thucan_model');   
        $this->load->model('hoadon_model');
//        $this->load->library('Udp_cart');
    }
    
    /*
     * lay loai thuc an
     */
    function  catfood()
    {
        //lay id cua ban
        $table = $this->uri->rsegment('3');
        $this->load->model('ban_model');
        $table_info = $this->ban_model->getInfoById($table);
        $this->data['table'] = $table;
        
        //lay danh sach loai thuc an
        $this->load->model('LoaiThucAn_model');
        $input = array();
        $input['where'] = array('parent_id >' => 0);
        $loai = $this->LoaiThucAn_model->getList($input);
        $this->data['loai'] = $loai;
        
        $hoadonID = $this->uri->rsegment('4');
        $this->data['hoadonID'] = $hoadonID;
        //them or update vao ban hoadon
        //if ban chua co khach
//        if($table_info->STATUS == 0)
//        {
//            //cap nhat status cho ban la 1 - co khach
//            $dataTable = array('status' => 1);
//            $this->ban_model->update($table, $dataTable);
//            
//            //insert hoadon
//            $data = array(
//                'banid' => $table,
//                'hinhthucid' => 1, //tai ban
//                'tinhtrang' => 0//chua nau
//            );
//
//            $this->hoadon_model->add($data);
//            $hoadonID = $this->db->insert_id();//lay id cua hoa don vua insert
//        } else{
//            //lay ra hoadon co ngaygio tao lon nhat voi banid = $table
//            $sql = 'SELECT * FROM `hoadon` 
//                    WHERE banid = '.$table.' AND
//                    NGAY = (SELECT MAX(NGAY) 
//                            FROM hoadon
//                            WHERE BANID = '.$table.')';
//            $hoadon = $this->hoadon_model->query($sql);
////            pre($hoadon);
//            $hoadonID = $hoadon[0]->ID;
//        }
//        $this->data['hoadonID'] = $hoadonID;
//        if(!isset(${"hoadon".$table}))
//        {
//            $this->{"hoadon".$table} = new Udp_cart("hoadon".$table);
//            echo 'chua';
//        }
//        else{
//            echo 'roi';
//        }

        
        $this->data['temp'] = 'waiter/food/catalog';
        $this->load->view('waiter/main', $this->data);
    }
    
    /*
     * lay danh sach thuc an theo loai
     */
    function food()
    {
        //lay id cua ban
        $table = $this->uri->rsegment('3');
        $this->data['table'] = $table; 
        
        $hoadonID = $this->uri->rsegment('4');
        $this->data['hoadonID'] = $hoadonID;
        
        $loaitaid = $this->uri->rsegment('5');
        //lay tdanh sach thuc an theo loai thuc an
        $input = array();
        $input['where'] = array('loaitaid' => $loaitaid);
        $list = $this->thucan_model->getList($input);
        $this->data['list'] = $list;
        
        //insert vao bang hoadon
        $data = array(
            'banid' => $table,
            'hinhthucid' => 1,//phuc vu tai ban
            'tinhtrang' => 0 //chua phuc vu mon
        );
//        $this->load->model('hoadon_model');
//        $this->hoadon_model->add($data);
//        $hoadonID = $this->db->insert_id();//lay id cua hoa don vua insert
//        $this->data['hoadonID'] = $hoadonID;


//        $this->chitiethoadon_model->add();
        
        $this->data['temp'] = 'waiter/food/food';
        $this->load->view('waiter/main', $this->data);
    }
    
    
}

