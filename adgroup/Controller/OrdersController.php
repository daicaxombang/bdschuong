<?php


/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class OrdersController extends AppController {

    public $name = 'Orders';
    public $uses = array('Order', 'Infocustomer');
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }

    public function index() {
        $this->paginate = array(
            'conditions' => array(
                //'Infocustomer.type' => 'vip'
            ),
            'order' => array('Infocustomer.id' => 'DESC'),
            'limit' => '20'
        );
        
        $this->set('view', $this->paginate('Infocustomer',array()));    
    }

    public function xuatfile(){
        $this->autoLayout = false;
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        
        $cnn = array(); $ngay = ''; $toingay = '';
        
        if(isset($_POST['tungay'])){
            $tungay = $_POST['tungay'];
        }
        
        if(isset($_POST['toingay'])){
            $toingay = $_POST['toingay'];
        }
        $title = "Thống kê";
        $date = 'Vào lúc '.date('m-d-Y h:i:s', time());
        if(!empty($tungay) && !empty($toingay)){
            $tungay_fomat = date('Y-m-d', strtotime($tungay)).' 00:00:00';
            $toingay_fomat = date('Y-m-d', strtotime($toingay)).' 00:00:00';
            
            $cnn['Infocustomer.created >='] = $tungay_fomat;
            $cnn['Infocustomer.created <='] = $toingay_fomat;
            
            $title = 'Thống kê từ '.$tungay.' Tới '.$toingay.' ('.$date.')';
        }else{
            if($tungay){
                $tungay_fomat = date('Y-m-d', strtotime($tungay)).' 00:00:00';
                $cnn['Infocustomer.created >='] = $tungay_fomat;
                
                $title = 'Thống kê từ '.$tungay.' ('.$date.')';
            }
            if($toingay){
                $toingay_fomat = date('Y-m-d', strtotime($toingay)).' 00:00:00';
                $cnn['Infocustomer.created <='] = $toingay_fomat;
                $title = 'Thống kê tới '.$toingay.' ('.$date.')';
            }
        }
        
        $list = $this->Infocustomer->find('all', array(
            'conditions' => $cnn,
            'order' => 'Infocustomer.id DESC',
        ));
        $this->set('list', $list);
        $this->set('title_file', $title);
        
        $this->set('title_for_layout', 'Xuất data');
    }
    
    public function delete($id = null) {
        $delete = $this->Infocustomer->findById($id);
        if (!$delete) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Infocustomer->delete($id);
            $this->loadModel('Order');
            $this->Order->deleteAll(array('Order.info_id' => $id), true);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }
    
    public function close($id = null) {
        $this->Infocustomer->id = $id;
        $this->Infocustomer->saveField('status', '0');
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null) {
        $this->Infocustomer->id = $id;
        $this->Infocustomer->saveField('status', '1');
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }
}
