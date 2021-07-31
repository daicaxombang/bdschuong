<?php


/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
  
class SettingsController extends AppController {

    public $name = 'Settings';
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }

    public function index() {
        if (!empty($this->request->data)) {
            $this->request->data['Setting']['id'] = 1;
            if ($this->Setting->save($this->request->data)) {
                if(isset($this->notice['edit_success'])) $this->Session->setFlash($this->notice['edit_success'], 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action'=>'index'));
            } else {
                if(isset($this->notice['edit_failed'])) $this->Session->setFlash($this->notice['edit_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else{
            $this->request->data = $this->Setting->findById(1);
        }
    }
}