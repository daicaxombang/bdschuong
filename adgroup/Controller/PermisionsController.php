<?php


/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 

class PermisionsController extends AppController {

    public $name = 'Permisions';
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }
    
    public function index($id=null) {
        $Permisions = $this->Permision->find(
            'all',
            array()
        );
        $this->set('Permisions', $Permisions);
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Permision->set($this->request->data);
            if ($this->Permision->validates()) {
                $this->Permision->save($this->request->data);
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
    }

    public function edit($id = null) {
        
        if (!empty($this->request->data)) {
            $this->Permision->set($this->request->data);
            if ($this->Permision->validates()) {
                $this->Permision->save($this->request->data);
                if(isset($this->notice['edit_success'])) $this->Session->setFlash($this->notice['edit_success'], 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                if(isset($this->notice['edit_failed'])) $this->Session->setFlash($this->notice['edit_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else{
            $this->request->data = $this->Permision->findById($id);
            if (!$this->request->data) {
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
 
    public function delete($id = null) {
        
        if (!$this->Permision->findById($id)) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Permision->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }

}
