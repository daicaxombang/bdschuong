<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
 
class SlideshowsController extends AppController {

    public $name = 'Slideshows';
    
    public $max_img = 1920;
    public $img_width = 0;//set width of image after upload
    public $img_height = 0;// 0 -> auto
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }
 
    public function index() {
        
        
        if($this->request->is('post')){

            if($this->request->data['option'] == 'order'){
                foreach($this->request->data['order'] as $key => $value){
                    $this->Slideshow->id = $key;
                    $this->Slideshow->saveField('order',$value);
                }
                if(isset($this->notice['order'])) $this->Session->setFlash($this->notice['order'], 'default', array('class' => 'notification success png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Slideshow->id = $key;
                        $this->Slideshow->saveField('status','1');
                    }
                    if(isset($this->notice['active_many'])) $this->Session->setFlash($this->notice['active_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'close'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Slideshow->id = $key;
                        $this->Slideshow->saveField('status','0');
                    }
                    if(isset($this->notice['colse_many'])) $this->Session->setFlash($this->notice['colse_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'delete'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        
                        $delete = $this->Slideshow->findById($key);
                        
                        $this->Upload->delete = $delete['Slideshow']['images'];
                        $this->Upload->Process();
                        
                        $this->Slideshow->delete($key);
                    }
                    if(isset($this->notice['delete_many'])) $this->Session->setFlash($this->notice['delete_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
        }
        
        
        $this->paginate = array(
            'order' => array('Slideshow.order'=>'DESC','Slideshow.id' => 'DESC'),
            'limit' => '10'
        );
        
        $this->set('view', $this->paginate('Slideshow'));
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Slideshow->set($this->request->data);
            if ($this->Slideshow->validates()) {
                if(isset($this->request->data['Slideshow']['images'])){
                    $this->Upload->w = $this->img_width;
                    $this->Upload->h = $this->img_height;
                    $this->Upload->max_img = $this->max_img;
    				if(isset($this->request->data['Slideshow']['name'])) $this->Upload->name = $this->request->data['Slideshow']['name'];
    				$this->Upload->new = $this->request->data['Slideshow']['images'];
    				$this->request->data['Slideshow']['images'] = $this->Upload->Process();
                }

                $this->Slideshow->save($this->request->data);
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index'));
            }
            else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else{
            $order = $this->Slideshow->find('first',array('order' => array('order' => 'DESC')));
            if(isset($order['Slideshow']['order'])) $this->request->data['Slideshow']['order'] = $order['Slideshow']['order'];
            $this->Session->write('back_after_save',$this->referer());
        }
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            
            $this->Slideshow->set($this->request->data);
            if ($this->Slideshow->validates()) {
                
                if(isset($this->request->data['Slideshow']['images'])){
                    $img = $this->Slideshow->find(
    					'first',
    					array(
    						'conditions'=>array(
    							'Slideshow.id'    =>  $this->request->data['Slideshow']['id']
    						)
    					)
    				);
    
                    if (!empty($this->request->data['Slideshow']['images']['name'])) {
                        
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        $this->Upload->max_img = $this->max_img;
                        $this->Upload->delete = $img['Slideshow']['images'];
                        if(isset($this->request->data['Slideshow']['name'])) $this->Upload->name = $this->request->data['Slideshow']['name'];
                        $this->Upload->new = $this->request->data['Slideshow']['images'];
                        $this->request->data['Slideshow']['images'] = $this->Upload->Process();
                    }
                    else $this->request->data['Slideshow']['images'] = $img['Slideshow']['images'];
                }
                
                $this->Slideshow->save($this->request->data);
                if(isset($this->notice['edit_success'])) $this->Session->setFlash($this->notice['edit_success'], 'default', array('class' => 'notification success png_bg'));;
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index'));  
            }
            else{
                if(isset($this->notice['edit_failed'])) $this->Session->setFlash($this->notice['edit_failed'], 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else{
            $this->request->data = $this->Slideshow->findById($id);
            if (empty($this->request->data)){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function delete($id = null) {
        
        $delete = $this->Slideshow->findById($id);
        if (!$delete) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Upload->delete = $delete['Slideshow']['images'];
            $this->Upload->Process();
            $this->Slideshow->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }
    
    public function close($id = null) {
        $this->Slideshow->id = $id;
        $this->Slideshow->saveField('status', 0);
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null) {
        $this->Slideshow->id = $id;
        $this->Slideshow->saveField('status', 1);
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

}