<?php
Class Order extends My_Controller
{
//    protected static $tableID = 0;
    function __construct() {
        parent::__construct();
        $this->load->model('ThucAn_model');
        $this->load->model('chitiethoadon_model');
//        $this->load->library('cart');
//        $this->load->library('Udp_cart');
//        ${"hoadon".$tableID} = new Udp_cart("hoadon".$tableID);
    }
    
    /*
     * them vao order
     */
    function add()
    {
        //lay so ban
        $tableID = $this->uri->rsegment('3');
        $hoadonID = $this->uri->rsegment('4');
        
        //lay info thuc an
        $TA_ID = $this->uri->rsegment('5');//id cua thuc an
        $food = $this->ThucAn_model->getInfoById($TA_ID);
        //if ko co thuc an do thi tro ve trang 
        if(!$food)
        {
            redirect('waiter/food/catfood/'.$table.'/'.$hoadonID);
        }
        
//        $qty = 1;//so luong sp
//        $dongia = $food->DONGIA;
//        if($food->GIAMGIA > 0)
//        {
//            $food->DONGIA*(1-$food->GIAMGIA/100);
//        }
//  
        $soluong = 1;
        //kiem tra neu hoadonID va TA_ID da ton tai va duoc chon lan >=2 thi tang so luong len 1
//        $exist = array(
//            'hoadonID' => $hoadonID,
//            'ta_id' => $TA_ID
//        );
//        if($this->chitiethoadon_model->checkExist($exist))
//        {
//            $info = $this->chitiethoadon_model->getInfoRule($exist);
//            $soluong = $info->SOLUONG + 1;
//            $data = array('soluong' => $soluong);
//            $this->chitiethoadon_model->update_rule($exist, $data);
//        } 
//        else{           
            $dongia = $food->DONGIA;
            //if co giam gia thi tru phan tien duoc giam gia lun
            if($food->GIAMGIA > 0)
            {
                $food->DONGIA*(1-$food->GIAMGIA/100);
            }

            $data = array(
                'TA_ID' => $TA_ID,
                'hoadonid' => $hoadonID,
                'soluong' => $soluong,
                'dongia' => $dongia,
                'tinhtrang' => 0 // 0 - dang chuan bi mon an, 1 - prepared, 2 - severed
            );
            //insert vao DB
            $this->chitiethoadon_model->add($data);    
//            $idct = $this->db->insert_id();
//            $this->data['idct'] = $idct;
            
        //}//else exist       
        header('Location: '.  waiter_url('order/index/'.$tableID.'/'.$hoadonID));
//        redirect(base_url('waiter/order'));               
    }
    
    
    function index()
    {
//        $cart = $this->cart->contents();
//        $total_items = $this->cart->total_items();
        
//        $cart = $this->{"hoadon".$tableID}->get_content();
        
//        $this->data['carts'] = $cart;
//        $this->data['total_items'] = $total_items;
//        pre($cart);
        
        $tableID = $this->uri->rsegment('3');
        $this->data['temp'] = 'waiter/order/index';
        $this->data['tableID'] = $tableID;
        
        $hoadonID = $this->uri->rsegment('4');
        $this->data['hoadonID'] = $hoadonID;
//        pre($hoadonID);
        //lay thuc an trong chi tiet hoa don
//        $input = array();
//        $input['where'] = array(
//            'hoadonid' => $hoadonID
//        );
//        $chitiet = $this->chitiethoadon_model->getList($input);        
        
        $sql = 'SELECT ct.*, thucan.TEN
                FROM chitiethoadon AS ct
                JOIN thucan
                ON ct.TA_ID = thucan.ID
                        AND ct.HOADONID = '.$hoadonID.'';
        
        $chitiet = $this->chitiethoadon_model->query($sql);
//        pre($chitiet);
        
        $this->data['chitiet'] = $chitiet;
        $this->load->view('waiter/main', $this->data);
    }
    
    /*
     * update
     */
    function update()
    {
        $hoadonID = $this->input->post('hoadonID');   
        $tableID = $this->input->post('tableID');
//        echo $hoadonID;
        $this->data['hoadonID'] = $hoadonID;
        $TA_ID = $this->input->post('ta_id');        
        $soluong = $this->input->post('soluong');
//        $idct = this->input->post('')
//        $dem = count($soluong);
        
        $updateArray = array();

        for($x = 0; $x < sizeof($TA_ID); $x++){
            
            $where = array(
//                'hoadonID' => $hoadonID,
                'id'   => $TA_ID[$x]
            );
            $updateArray = array(
                'soluong' => $soluong[$x]
            );
//            $this->chitiethoadon_model->update_rule($where, $updateArray);
            $this->chitiethoadon_model->update_rule($where, $updateArray);
        }
        header('Location: '.waiter_url('order/index/'.$tableID.'/'.$hoadonID)); 
    }
    
    /*
     * delete
     */
    function delete()
    {
        $tableID = $this->uri->rsegment('3');
        $hoadonID = $this->uri->rsegment('4');
        
        //lay info thuc an
        $TA_ID = $this->uri->rsegment('5');//id cua thuc an
        
        $where = array(
            'ta_id'    => $TA_ID,
            'hoadonid' => $hoadonID
        );
        $this->chitiethoadon_model->deleteWhere($where);
        header('Location: '.waiter_url('order/index/'.$tableID.'/'.$hoadonID)); 
    }
    /*
     * click vao phuc vu cap nhat trang thai 3 - da phuc vu
     */
    function service()
    {
        $tableID = $this->uri->rsegment('3');
        $hoadonID = $this->uri->rsegment('4');
//        $taID = $this->uri->rsegment('5');
        $idct = $this->uri->rsegment('5');
        
//        $where = array(
//            'hoadonid' => $hoadonID,
//            'ta_id'    => $taID
//            
//        );
        $data = array('tinhtrang' => 3);
        $this->chitiethoadon_model->update($idct, $data);
        
        //if tat ca tinhtrang trong chi tiet cua hoadon deu = 1
        //-> cập nhật tình trạng bên hoadon la 1 - nau xong
        $where1 = array('hoadonid' => $hoadonID);
        $chitiet = $this->chitiethoadon_model->getMultiRow($where1, 'tinhtrang, id');
//        pre($chitiet);
        $num_result =  sizeof($chitiet);//so kq trong $chitiet
        $count = 0;
        foreach ($chitiet as $row)
        {
            if($row->tinhtrang == 3)
            {
                $count++;
            }
        }
        if($count == $num_result)
        {
            $data = array('tinhtrang' => 2);
            $this->load->model('hoadon_model');
            $this->hoadon_model->update($hoadonID, $data);
        }
        header('Location: '.waiter_url('order/index/'.$tableID.'/'.$hoadonID)); 
    }
}

