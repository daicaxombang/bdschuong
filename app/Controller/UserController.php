<?php

App::uses('CakeEmail', 'Network/Email');

/**

 * Description of NewsController

 * @author : Yeu tinh

 * @since Oct 19, 2012

 */

class UserController extends AppController {

    public $name = 'User';
    public $uses = array('User', 'Setting');
    public $components = array('Email');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'extent';
    }

    public function register(){
        if(!empty($this->request->data)){
            if(!empty($this->request->data['username']) && !empty($this->request->data['password']) && !empty($this->request->data['repassword']) && !empty($this->request->data['email']) && !empty($this->request->data['captcha'])){
                if($this->request->data['captcha'] != $_SESSION['captcha']){
                    $this->Session->setFlash('Captcha không đúng !', 'default', array('class' => 'alert alert-error'));
                    $this->redirect($this->referer()); exit;    
                }
                $user = $this->User->findByUsername($this->request->data['username']);
                if(empty($user)){
                    if($this->request->data['password'] == $this->request->data['repassword']){
                        $this->request->data['password'] = md5($this->request->data['password']);
                        if($this->User->save($this->request->data)){
                            $this->Session->setFlash('Thêm thành công, mời bạn đăng nhập !', 'default', array('class' => 'alert alert-success'));
                        }else{
                            $this->Session->setFlash('Fail !', 'default', array('class' => 'alert alert-error'));
                        }
                    }else{
                        $this->Session->setFlash('Mật khẩu không khớp !', 'default', array('class' => 'alert alert-error'));
                    }
                }else{
                    $this->Session->setFlash('Tài khoản bạn thêm đã tồn tại !', 'default', array('class' => 'alert alert-error'));
                }
            }else{
                $this->Session->setFlash('Mời bạn kiểm tra lại thông tin đăng ký !', 'default', array('class' => 'alert alert-error'));
            }
        }
        
        $this->set('title_for_layout', 'Đăng ký');
    }
    
    public function doipas($id = null){
        if($id == $this->Session->read('id_app')){
            if(!empty($this->request->data)){
                if(!empty($this->request->data['username']) && !empty($this->request->data['old-password']) && !empty($this->request->data['password']) && !empty($this->request->data['re-password'])){
                    $user = $this->User->findByUsername($this->request->data['username']);
                    if(!empty($user)){
                        if($user['User']['password'] == md5($this->request->data['old-password'])){
                            if($this->request->data['password'] == $this->request->data['re-password']){
                                $this->request->data['password'] = md5($this->request->data['password']);
                                $this->User->id = $id;
                                $this->User->saveField('password', $this->request->data['password']);
                                $this->Session->setFlash('Sửa mật khẩu thành công !', 'default', array('class' => 'alert alert-success'));
                            }else{
                                $this->Session->setFlash('Mật khẩu mới không khớp !', 'default', array('class' => 'alert alert-error'));
                            }
                        }else{
                            $this->Session->setFlash('Mật khẩu cũ không khớp !', 'default', array('class' => 'alert alert-error'));
                        }
                    }else{
                        $this->Session->setFlash('Tài khoản không đúng !', 'default', array('class' => 'alert alert-error'));
                    }
                }else{
                    $this->Session->setFlash('Mời bạn kiểm tra lại thông tin !', 'default', array('class' => 'alert alert-error'));
                }
            }
        }else{
            $this->Session->setFlash('Bạn không được thay đổi tài khoản của người khác !', 'default', array('class' => 'alert alert-error'));
        }
        $this->set('title_for_layout', 'Đổi mật khẩu');
    }
    
    public function login(){
        if(!empty($this->request->data)){
            if(!empty($this->request->data['username']) && !empty($this->request->data['password'])){
                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.status' => 1,
                        'User.username' => $this->request->data['username'],
                        'User.password' => md5($this->request->data['password']),
                    )
                ));
                $user_block = $this->User->find('first', array(
                    'conditions' => array(
                        'User.status' => 0,
                        'User.username' => $this->request->data['username'],
                        'User.password' => md5($this->request->data['password']),
                    )
                ));
                if(!empty($user_block)){
                    $this->Session->setFlash('Tài khoản của đang bị khóa !', 'default', array('class' => 'alert alert-error'));
                }else{
                    if(!empty($user)){
                        $this->autoLayout = false;
                        $this->autoRender = false;
                        $this->Session->write('user_app', $user['User']['username']);
                        $this->Session->write('id_app', $user['User']['id']);
                        echo '<script language="javascript"> location.href="'.DOMAIN.'";</script>';
                    }else{
                        $this->Session->setFlash('Tài khoản không tồn tại !', 'default', array('class' => 'alert alert-error'));
                    }
                }
            }else{
                $this->Session->setFlash('Mời bạn kiểm tra lại thông tin !', 'default', array('class' => 'alert alert-error'));
            }
        }
        
        $this->set('title_for_layout', 'Đăng nhập');
    }  
    
    public function quenmatkhau(){
        if(!empty($this->request->data)){
            if(!empty($this->request->data['username'])){
                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.status' => 1,
                        'User.username' => $this->request->data['username'],
                    )
                ));
                if(!empty($user)){ 
                
                    $this->Email->to = $user['User']['email'];
                    $this->Email->subject = 'Thông tin đổi mật khẩu';
                    //$this->Email->FromName = 'Quên mật khẩu - naptien';
                    $this->Email->from = 'minisostore@gmail.com';
                    //$this->Email->AddAddress = 'Quên mật khẩu - naptien';
                    $this->Email->template = 'default'; // in /views/elements/email/text/mytemplate.ctp should be there
                    $this->Email->smtpOptions = array(
                        'port'=>'465',
                        'timeout'=>'30',
                        'host' => 'ssl://smtp.gmail.com',
                        'username'=>'mailgiohang@gmail.com',
                        'password'=>'a123#$A#&',
                    );
                    $time = $user['User']['username'].'-'.date('hisY', time());
                    $code = md5(md5($time));
                    $this->User->id = $user['User']['id'];
                    $this->User->saveField('active_key', $code);
                    $content = "";
                    $content .= "Bạn hãy copy đường link này vào trình duyệt để thực hiện đổi mật khẩu:\r\n";
                    $content .= DOMAIN.'doi-mat-khau-email/'.$code;
                    
                    $this->Email->delivery = 'smtp';
                    if ($this->Email->send($content)) {
                        $this->Session->setFlash('Thông tin đã được gửi về email của bạn !', 'default', array('class' => 'alert alert-error')); 
                    }else{
                        echo $this->Email->smtpError;
                    }
                }else{
                    $this->Session->setFlash('Tài khoản không tồn tại !', 'default', array('class' => 'alert alert-error'));
                }
            }else{
                $this->Session->setFlash('Mời bạn kiểm tra lại thông tin !', 'default', array('class' => 'alert alert-error'));
            }
        }
        $this->set('title_for_layout', 'Quên mật khẩu');
    }
    
    public function info(){
        if(!empty($this->request->data)){
            if(!empty($this->request->data['fullname']) && !empty($this->request->data['email']) && !empty($this->request->data['address']) && !empty($this->request->data['phone']) && !empty($this->request->data['telephone']) && !empty($this->request->data['captcha'])){
                if(isset($this->request->data['username']) && isset($this->request->data['password'])){
                    $this->Session->setFlash('Bạn đang hack !', 'default', array('class' => 'alert alert-error'));
                    $this->redirect($this->referer()); exit;    
                }
                if($this->request->data['captcha'] != $_SESSION['captcha']){
                    $this->Session->setFlash('Captcha không đúng !', 'default', array('class' => 'alert alert-error'));
                    $this->redirect($this->referer()); exit;    
                }
                $this->request->data['User'] = $this->request->data;
                $this->request->data['User']['id'] = $this->Session->read('id_app');
                if($this->User->save($this->request->data)){
                    $this->Session->setFlash('Đổi thành công !', 'default', array('class' => 'alert alert-success'));
                }else{
                    $this->Session->setFlash('Fail !', 'default', array('class' => 'alert alert-error'));
                }
            }else{
                $this->Session->setFlash('Mời bạn kiểm tra lại thông tin đăng ký !', 'default', array('class' => 'alert alert-error'));
            }
        }
        $this->request->data = $this->User->findById($this->Session->read('id_app'));
        $this->set('title_for_layout', 'Thông tin - '.$this->Session->read('user_app'));
    }
    
    public function doimatkhauemail($id = null){
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.status' => 1,
                'User.active_key' => $id,
            )
        ));
        if(empty($user)){ 
            $this->Session->setFlash('Đường link không tồn tại !', 'default', array('class' => 'alert alert-error'));
            $this->redirect(DOMAIN.'quen-mat-khau');
        }else{
            if(!empty($this->request->data)){
                if(!empty($this->request->data['password']) && !empty($this->request->data['re-password'])){
                    if($this->request->data['password'] == $this->request->data['re-password']){
                        $this->request->data['password'] = md5($this->request->data['password']);
                        $this->User->id = $user['User']['id'];
                        $this->User->saveField('password', $this->request->data['password']);
                        $time = $user['User']['username'].'-'.date('hisY', time());
                        $code = md5(md5($time));
                        $this->User->saveField('active_key', $code);
                        $this->Session->setFlash('Mật khẩu mới được cập nhật thành công !', 'default', array('class' => 'alert alert-success'));
                    }else{
                        $this->Session->setFlash('Mật khẩu không khớp !', 'default', array('class' => 'alert alert-error'));
                    }
                }else{
                    $this->Session->setFlash('Mời bạn kiểm tra lại thông tin !', 'default', array('class' => 'alert alert-error'));
                }
            }
        }
        
        $this->set('title_for_layout', 'Đổi mật khẩu');
    }
    
    public function logout(){
        $this->autoLayout = false;
        $this->autoRender = false;
        if($this->Session->check('user_app')){
            $this->Session->delete('user_app');
            $this->Session->delete('id_app');
            echo '<script language="javascript"> alert("Đã thoát !"); location.href="'.DOMAIN.'";</script>';
        }
    }  

    public function huongdan(){
        $this->set('title_for_layout', 'Hướng dẫn sử dụng');
    }

}