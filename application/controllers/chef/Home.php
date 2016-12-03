<?php
Class Home extends My_Controller
{
    function __construct() {        
        parent::__construct();
        $this->load->model('hoadon_model');
        $this->load->model('chitiethoadon_model');
    }
    
    function index()
    {
        $chitiet = $this->chitiethoadon_model->getList();
        $this->load->model('thucan_model');
        $this->data['chitiet'] = $chitiet;
        
//        $this->db->select('chitiethoadon.*, thucan.ten');
//        $this->db->from('chitiethoadon');
//        $this->db->join('thucan', 'chitiethoadon.ta_id = thucan.id');
//        $sql = 'SELECT a.HOADONID, b.TEN, a.SOLUONG, a.TINHTRANG
//                    FROM chitiethoadon AS a
//                    JOIN thucan AS b
//                    ON a.TA_ID = b.ID';
//        $query = $this->db->query($sql);
        $sql = 'SELECT a.ID, a.HOADONID, a.TA_ID, b.TEN, a.SOLUONG, c.BANID, c.HINHTHUCID, a.TINHTRANG '
                . 'FROM chitiethoadon AS a '
                . 'JOIN thucan AS b ON a.TA_ID = b.ID '
                . 'JOIN hoadon AS c ON a.HOADONID = c.ID';
        
        $query = $this->chitiethoadon_model->query($sql);
        $this->data['query'] = $query;
//        pre($query);
        
        $this->data['temp'] = 'chef/home/index';
        $this->load->view('chef/main', $this->data);
    }
    
    function update()
    {
        $hoadonID = $this->uri->rsegment('3');
        $id = $this->uri->rsegment('4');
//        $id = $this->uri->rsegment('3');
        $status = $this->uri->rsegment('5');
        //update tinh trang tung thuc an trong chi tiet hoa don
//        $where = array(
//            'hoadonid' => $hoadonID,
//            'ta_id'    => $taID
//        );
        
        $data = array('tinhtrang' => $status);
//        $this->chitiethoadon_model->update_rule($where, $data);
        $this->chitiethoadon_model->update($id, $data);
        
        //if tat ca tinhtrang trong chi tiet cua hoadon deu = 1
        //-> cập nhật tình trạng bên hoadon la 1 - nau xong
        $where1 = array('hoadonid' => $hoadonID);
        $chitiet = $this->chitiethoadon_model->getMultiRow($where1, 'tinhtrang, id');
//        pre($chitiet);
        $num_result =  sizeof($chitiet);//so kq trong $chitiet
        $count = 0;
        foreach ($chitiet as $row)
        {
            if($row->tinhtrang == 1)
            {
                $count++;
            }
        }
        if($count == $num_result)
        {
            $data = array('tinhtrang' => 1);
            $this->hoadon_model->update($hoadonID, $data);
        }
        //chuyen ve trang chu chef
        redirect(base_url('chef'));
    }
}

