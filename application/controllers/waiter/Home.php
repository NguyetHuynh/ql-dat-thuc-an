<?php
/*
 * waiter home
 */
Class Home extends My_Controller
{
    function __construct() {
        parent::__construct();
//        $this->load->model('thucan_model');
        $this->load->model('ban_model');
    }
    
    function index()
    {
        $this->load->model('phieudatban_model');
        $this->load->model('chitietdatban_model');
        
        $now = now('Asia/Ho_Chi_Minh');
        $day =  date("Y-m-d", $now);
        $hour = date('H:m:i', $now);
        $after = $hour + 2;
        
        //lay nhung ban co ngay dat = ngay hien tai, gio hien tai + 2 = gio su dung
        $input= array('ngaydung' => $day, 'gio '=> $after.':00:00');
        $datban = $this->phieudatban_model->getMultiRow($input);
//        pre($datban);
        //lay banid cua cac phieu dat ban do -> cap nhat trang thai 2-datban  
        if($datban != null)
        {
            foreach ($datban as $value)
            {
                $id = $value->ID;
                $where = array('datbanid' => $id);
                $chitiet = $this->chitietdatban_model->getMultiRow($where, 'datbanid, banid');
                foreach ($chitiet as $key => $val) {
                    $where = array('id' => $val->banid, 'status' => 0);
                    $data = array('status' => 2);
                    $this->ban_model->update_rule($where, $data);
                    $phieuid = $val->datbanid;
                    $this->data['phieuid'] = $phieuid;
                }
            }       
        }  
        //neu thoi gian dat ban + 2 = thoigian hien tai va tinh trang ban van la dat ban
        // == khach dat ban ko den -> cap nhat status = 0 -> ko co khach
        $after = $hour - 4;
        $sql = 'SELECT banid, ban.status '
                . 'FROM phieudatban AS p JOIN chitietdatban AS c ON p.id = c.datbanid'
                . ' AND p.gio = "'.$after.':00:00" AND p.ngaydung = "'.$day.'"'
                . 'JOIN ban ON ban.id = c.banid';
        $ban = $this->phieudatban_model->query($sql);
//        pre($ban);
        foreach ($ban as $row)
        {
            if($row->status == 2)
            {
                $data = array('status' => 0);
                $this->ban_model->update($row->banid, $data);
            }
        }
        $list = $this->ban_model->getList();
        $this->data['list'] = $list;        
        $this->data['temp'] = 'waiter/home/index';
        $this->load->view('waiter/main', $this->data);
    }
    
    /*
     * lay order cua khach
     */
    function addbill()
    {
        $table = $this->uri->rsegment('3');
        $table_info = $this->ban_model->getInfoById($table);
        $this->data['table'] = $table;
        $this->load->model('hoadon_model');   
        
        if($table_info->STATUS == 0)       
        {
            //insert hoadon
            $data = array(
                'banid' => $table,
                'hinhthucid' => 1, //tai ban
                'tinhtrang' => 0//chua nau
            );            
            if($this->hoadon_model->add($data))
            {
                $hoadonID = $this->db->insert_id();//lay id cua hoa don vua insert
                //cap nhat status cho ban la 1 - co khach
                $dataTable = array('status' => 1);
                $this->ban_model->update($table, $dataTable);
            }           
            $this->data['hoadonID'] = $hoadonID;
            header('Location: '.waiter_url('food/catfood/'.$table.'/'.$hoadonID));
        } else if($table_info->STATUS == 1){
            //lay ra hoadon co ngaygio tao lon nhat voi banid = $table
            $sql = 'SELECT * FROM `hoadon` WHERE banid = '.$table.' AND
                    NGAY = (SELECT MAX(NGAY) FROM hoadon WHERE BANID = '.$table.')';
            $hoadon = $this->hoadon_model->query($sql);
//            pre($hoadon);
            $hoadonID = $hoadon[0]->ID;
            $this->data['hoadonID'] = $hoadonID;
            header('Location: '.  waiter_url('order/index/'.$table.'/'.$hoadonID));
        }   
        else{
            $phieuid = $this->uri->rsegment('4');
            $this->addbilldatban($table, $phieuid);
        }     
    }
    /*
     * xet tinh trang dat ban
     */
    function datban()
    {
        $banid = $this->uri->rsegment('3');
        $this->data['banid'] = $banid;
        $phieuid = $this->uri->rsegment('4');
        $this->data['phieuid'] = $phieuid;
        $this->load->model('phieudatban_model');
        
        //lay thong tin phieu dat ban
        $phieu = $this->phieudatban_model->getInfoById($phieuid);
        $this->data['phieu'] = $phieu;
        $khachhangid = $phieu->KHACHHANGID;
        $this->load->model('khachhang_model');
        $khachhang = $this->khachhang_model->getInfoById($khachhangid);
        $this->data['khachhang'] = $khachhang;
        
        $this->data['temp'] = 'waiter/datban/index';
        $this->load->view('waiter/main', $this->data);
    }
    
    /*
     * them hoa don d/v khach da dat ban
     * them nhung thong tin banid, datbanid, tinhtrang hoadon = 0, status ban = 1, hinhthucid = 1
     * load sang trang chon mon
     */
    function addbilldatban($table, $phieuid)
    {
        $data = array(
            'banid' => $table,
            'datbanid' => $phieuid,
            'hinhthucid' => 1,//tai ban
            'tinhtrang' => 0//chua nau
        );
        if($this->hoadon_model->add($data))
            {
                $hoadonID = $this->db->insert_id();//lay id cua hoa don vua insert
                //cap nhat status cho ban la 1 - co khach 
            }   
            $dataTable = array('status' => 1);
            $this->ban_model->update($table, $dataTable);
            $this->data['hoadonID'] = $hoadonID;
            header('Location: '.waiter_url('food/catfood/'.$table.'/'.$hoadonID));
    }
    
//    function takeorder()
//    {
//        //lay id cua ban
//        $table = $this->uri->rsegment('3');
//        $this->data['table'] = $table;
//        
//        $key = $this->input->get('term');
//        $this->data['key'] = trim($key);
//        
//        $input = array();
//        $input['like'] = array('ten', $key);
//        $list = $this->thucan_model->getList($input);
//        $this->data['list'] = $list;
//        
//        $result = array();
//        foreach ($list as $row)
//        {
//            $item = array();
//            $item['id'] = $row->id;
//            $item['label'] = $row->name;
//            $item['value'] = $row->name;
//            $result[] = $item;
//        }
//        die(json_encode($result));
//        
//        $this->data['temp'] = 'waiter/order/index';
//        $this->load->view('waiter/main', $this->data);
//    }
    

    
    function demo()
    {
        $this->load->model('phieudatban_model');
        $this->load->model('chitietdatban_model');
        $phieu = $this->phieudatban_model->getInfoById(5);
        $ngay = $phieu->NGAYDUNG;
        $gio = $phieu->GIO;
        $aa = now('Asia/Ho_Chi_Minh');
        $day =  date("Y-m-d", $aa);
        $hour = date('H:m:i', $aa);
        echo $day;
        $hour = $hour - 2;
        echo 'gio '.$hour;
        if($hour == $gio)
        {
            echo '  bang';
        }
        else if($hour < $gio){
            echo '  nho';
        }
        else {echo ' lon';}
        
    }
}
