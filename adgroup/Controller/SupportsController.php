<?php


/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class SupportsController extends AppController {
    
    public $name = 'Supports';

    public $max_img = 200;
    public $img_width = 0;//set width of image after upload
    public $img_height = 0;// 0 -> auto
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }


    public function index($id = null) {
        $Support = $this->Support->find('all', array(
            'order' => array('Support.id DESC')
            ));
        $this->set('Support', $Support);
    }

    public function add() {
        if (!empty($this->request->data)) {
            if(isset($this->request->data['Support']['images'])){
                $this->Upload->w = $this->img_width;
                $this->Upload->h = $this->img_height;
                $this->Upload->max_img = $this->max_img;
                if(isset($this->request->data['Support']['name'])) $this->Upload->name = $this->request->data['Support']['name'];
                $this->Upload->new = $this->request->data['Support']['images'];
                //$this->watermark = ROOT.DS.'admin'.DS.'webroot'.DS.'images'.DS.'logo.png';
                $this->request->data['Support']['images'] = $this->Upload->Process();
            }
            if ($this->Support->save($this->data)) {
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            } else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if(isset($this->request->data['Support']['images'])){
                    $img = $this->Support->find(
                        'first',
                        array(
                            'conditions'=>array(
                                'Support.id'    =>  $this->request->data['Support']['id']
                            )
                        )
                    );
                    
                    if (!empty($this->request->data['Support']['images']['name'])) {
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        $this->Upload->max_img = $this->max_img;
                        $this->Upload->delete = $img['Support']['images'];
                        if(isset($this->request->data['Support']['name'])) $this->Upload->name = $this->request->data['Support']['name'];
                        $this->Upload->new = $this->request->data['Support']['images'];
                        $this->request->data['Support']['images'] = $this->Upload->Process();
                    }
                    else $this->request->data['Support']['images'] = $img['Support']['images'];
                }
            if ($this->Support->save($data['Support'])) {
                if(isset($this->notice['edit_success'])) $this->Session->setFlash($this->notice['edit_success'], 'default', array('class' => 'notification success png_bg'));
                 $this->redirect(array('action' => 'index'));
            } else {
                if(isset($this->notice['edit_failed'])) $this->Session->setFlash($this->notice['edit_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else{
            $this->request->data = $this->Support->findById($id);
            if(!$this->request->data){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function delete($id = null) {
        if (!$this->Support->findById($id)) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Support->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function close($id = null) {
        $this->Support->id = $id;
        $this->Support->saveField('status', 0);
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->redirect(array('action' => 'index'));
    }

    public function active($id = null) {
        $this->Support->id = $id;
        $this->Support->saveField('status', 1);
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->redirect(array('action' => 'index'));
    }

}