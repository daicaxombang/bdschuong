<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class TinhthanhsController extends AppController {

    public $name = 'Tinhthanhs';
    public $uses = array('Tinhthanh');
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }
 
    public function index() {
        $this->paginate = array(
            'limit' => '35'
        );
        
        $this->set('view', $this->paginate('Tinhthanh'));
    }
    
    public function add(){
        if (!empty($this->request->data)) {
            $this->Tinhthanh->set($this->request->data);
            if ($this->Tinhthanh->validates()) {
                $this->Tinhthanh->save($this->request->data);
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
    }
    public function edit($id = null){
        if (!empty($this->request->data)) {
            $this->Tinhthanh->set($this->request->data);
            if ($this->Tinhthanh->validates()) {
                $this->Tinhthanh->save($this->request->data);
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
        $this->request->data = $this->Tinhthanh->findById($id);
    }
    public function delete($id = null){
        $delete = $this->Tinhthanh->findById($id);
        if (!$delete) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->redirect($this->referer());
        }
        else{
            $this->Tinhthanh->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->redirect($this->referer());
        }
    }

}