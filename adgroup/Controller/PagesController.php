<?php


/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
 
class PagesController extends AppController {

    public $name = 'Pages';
    
    public $img_width = 600;//set width of image after upload
    public $img_height = 0;// 0 -> auto
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }

    public function index() {
        
        $this->paginate = array(
            'order' => 'Page.id DESC',
            'limit' => '10'
        );
        
        $this->set('view', $this->paginate('Page'));

    }
    
    public function add() {
        if (!empty($this->request->data)) {
            
            $this->Page->set($this->request->data);
            if ($this->Page->validates()) {
                
                if(isset($this->request->data['Page']['images'])){
                    $this->Upload->w = $this->img_width;
                    $this->Upload->h = $this->img_height;
                    if(isset($this->request->data['Page']['name'])) $this->Upload->name = $this->request->data['Page']['name'];
                    $this->Upload->new = $this->request->data['Page']['images'];
                    $this->request->data['Page']['images'] = $this->Upload->Process();
                }   
                
                $this->Page->save($this->request->data);
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index')); 
            } else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else $this->Session->write('back_after_save',$this->referer());
    }
    
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            
            $this->Page->set($this->request->data);
            if ($this->Page->validates()) {
                
                if(isset($this->request->data['Page']['images'])){
                    $img = $this->Page->find(
                        'first',
                        array(
                            'conditions'=>array(
                                'Page.id'    =>  $this->request->data['Page']['id']
                            )
                        )
                    );
                    
                    if ($this->request->data['Page']['images']['name']!='') {
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        $this->Upload->delete = $img['Page']['images'];
                        if(isset($this->request->data['Page']['name'])) $this->Upload->name = $this->request->data['Page']['name'];
                        $this->Upload->new = $this->request->data['Page']['images'];
                        $this->request->data['Page']['images'] = $this->Upload->Process();
                    }
                    else $this->request->data['Page']['images'] = $img['Page']['images'];
                }
    
                $this->Page->save($this->request->data);
                if(isset($this->notice['edit_success'])) $this->Session->setFlash($this->notice['edit_success'], 'default', array('class' => 'notification success png_bg'));
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index')); 
            } else {
                if(isset($this->notice['edit_failed'])) $this->Session->setFlash($this->notice['edit_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
            

        }
        else{
            $this->request->data = $this->Page->findById($id);
            if (empty($this->request->data)){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->write('back_after_save',$this->referer());
        }
    }
    
    public function copy($id = null) {
        if (!empty($this->request->data)) {
            
            $this->Page->set($this->request->data);
            if ($this->Page->validates()) {
                
                if(isset($this->request->data['Page']['images'])){
                    if ($this->request->data['Page']['images']['name']!='') {
    
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        if(isset($this->request->data['Page']['name'])) $this->Upload->name = $this->request->data['Page']['name'];
                        $this->Upload->new = $this->request->data['Page']['images'];
                        $this->request->data['Page']['images'] = $this->Upload->Process();
                    }
                    else {
                        $this->Upload->copy = $this->request->data['Page']['images_old'];
                        if(isset($this->request->data['Page']['name'])) $this->Upload->name = $this->request->data['Post']['name'];
                        $this->request->data['Page']['images'] = $this->Upload->process();
                    }
                }
                
                $this->Page->save($this->request->data);
                if(isset($this->notice['copy_success'])) $this->Session->setFlash($this->notice['copy_success'], 'default', array('class' => 'notification success png_bg'));
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index'));
            }
            else {
                if(isset($this->notice['copy_failed'])) $this->Session->setFlash($this->notice['copy_failed'], 'default', array('class' => 'notification error png_bg'));
            }
        }
        else {
            $this->request->data = $this->Page->findById($id);
            if (empty($this->request->data)){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            $this->request->data['Page']['images_old'] = $this->request->data['Page']['images'];
            $this->Session->write('back_after_save',$this->referer());
        }
    }
        
    public function delete($id = null) {
        $delete = $this->Page->findById($id);
        if (!$delete) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->redirect($this->referer());
        }
        else{
            $this->Upload->delete = $delete['Page']['images'];
            $this->Upload->Process();
            
            $this->Page->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->redirect($this->referer());
        }
    }

    public function close($id = null) {
        $this->Page->id = $id;
        $this->Page->saveField('status', 0);
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->redirect($this->referer());
    }

    public function active($id = null) {
        $this->Page->id = $id;
        $this->Page->saveField('status', 1);
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->redirect($this->referer());
    }
}