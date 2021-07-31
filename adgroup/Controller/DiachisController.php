<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class DiachisController extends AppController {

    public $name = 'Diachis';
    public $uses = array('Diachi');
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }
 
    public function index() {
        $this->paginate = array(
            'limit' => '35'
        );
        $this->set('view', $this->paginate('Diachi'));
    }
    
    public function add(){
        if (!empty($this->request->data)) {
            $this->Diachi->set($this->request->data);
            if ($this->Diachi->validates()) {
                $this->Diachi->save($this->request->data);
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
        //list tinh thanh
        $this->loadModel('Tinhthanh');
        $tinhthanh = $this->Tinhthanh->find('list', array('fields' => array('id', 'name')));
        $this->set('tinhthanh', $tinhthanh);
    }
    public function edit($id = null){
        if (!empty($this->request->data)) {
            $this->Diachi->set($this->request->data);
            if ($this->Diachi->validates()) {
                $this->Diachi->save($this->request->data);
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
        $this->request->data = $this->Diachi->findById($id);
        //list tinh thanh
        $this->loadModel('Tinhthanh');
        $tinhthanh = $this->Tinhthanh->find('list', array('fields' => array('id', 'name')));
        $this->set('tinhthanh', $tinhthanh);
    }
    public function delete($id = null){
        $delete = $this->Diachi->findById($id);
        if (!$delete) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Diachi->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }

}