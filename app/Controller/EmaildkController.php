<?php
/**
 * Description of NewsController
 * @author : Yeu tinh
 * @since Oct 19, 2012
 */
class EmaildkController extends AppController {
    
    public $name = 'Emaildk';
    public $uses = array('Emaildk');
    
    
    public function beforeFilter() {

    }
    
    public function dk(){
        if(!isset($_POST['email'])){
            echo '<script language="javascript"> alert("Bạn phải nhập email !"); location.href="'.DOMAIN.'";</script>';
        }
        if(preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST['email'])){
            if($this->Emaildk->findByEmail($_POST['email'])){
                echo '<script language="javascript"> alert("Email đăng ký đã tồn tại !"); location.href="'.DOMAIN.'";</script>';
                exit;
            }else{
                $this->Emaildk->save($this->request->data);
                echo '<script language="javascript"> alert("ĐK email thành công !"); location.href="'.DOMAIN.'";</script>';
                exit;
            }
        }else{
            echo '<script language="javascript"> alert("Định dạng email không hợp lệ !"); location.href="'.DOMAIN.'";</script>';
            exit;
        }
        
    }
    
}