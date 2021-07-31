<?php
/**
 * Description of NewsController
 * @author : Yeu tinh
 * @since Oct 19, 2012
 */
class OrderController extends AppController {
    
    public $name = 'Order';
    public $uses = array('Order', 'Setting');
    
    
    public function beforeFilter() {
        $setting = $this->Setting->find('first');
        if($setting != null){
            $this->set('title_for_layout', $setting['Setting']['title']);
            $this->set('keywords_for_layout', $setting['Setting']['meta_key']);
            $this->set('description_for_layout', $setting['Setting']['meta_des']);
        }
    }

    public function dathang(){
        if(!isset($_POST['hoten'])){
            echo '<script language="javascript">alert("Bạn phải nhập đầy đủ thông tin !"); location.href="'.DOMAIN.'";</script>';
        }
        $sanpham = $_POST['sanpham']; 
        if(isset($_POST['sale_vip'])){
            $sale_vip = $_POST['sale_vip']; 
            $vip_abc = $_POST['vip_abc'];
        }
        $hoten = $_POST['hoten']; 
        $phone = $_POST['phone']; 
        $diachi = $_POST['diachi']; 
        $ngaynhan = $_POST['ngaynhan']; 
        $ghichu = $_POST['ghichu']; 
        
        $data['Order']['name_product'] = $sanpham;
        if(isset($_POST['sale_vip'])){
            $data['Order']['Sale_vip'] = $sale_vip;
            $data['Order']['type'] = $vip_abc;
        }
        $data['Order']['name_cus'] = $hoten;
        $data['Order']['address_cus'] = $diachi;
        $data['Order']['phone_cus'] = $phone;
        $data['Order']['date_cus'] = $ngaynhan;
        $data['Order']['content_cus'] = $ghichu;
        $this->Order->save($data['Order']);
        echo '<script language="javascript"> alert("Đặt hàng thành công !"); location.href="'.DOMAIN.'";</script>';
      }	
}