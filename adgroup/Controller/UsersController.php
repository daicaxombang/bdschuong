<?php


/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class UsersController extends AppController {

    public $name = 'Users';
    public $uses = array('User');
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }

    public function index() {
        $this->paginate = array(
            'conditions' => array(
                //'User.type' => 'vip'
            ),
            'order' => array('User.id' => 'DESC'),
            'limit' => '20'
        );
        
        $this->set('view', $this->paginate('User',array()));	
    }
    public function close($id = null) {
        $this->User->id = $id;
        $this->User->saveField('vip', 'no');
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null) {
        $this->User->id = $id;
        $this->User->saveField('vip', 'yes');
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }
}
