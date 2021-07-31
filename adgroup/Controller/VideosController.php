<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class VideosController extends AppController {

    public $name = 'Videos';
    public $uses = array('Video');
    
    public $type = 'video';
    public $only_one = false;
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
                    $this->Video->id = $key;
                    $this->Video->saveField('order',$value);
                }
                if(isset($this->notice['order'])) $this->Session->setFlash($this->notice['order'], 'default', array('class' => 'notification success png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'active'){
                if(isset($this->request->data['check']))
                {
                    if($this->only_one){
                        if(count($this->request->data['check'])>1){
                            if(isset($this->notice['only_one'])) $this->Session->setFlash($this->notice['only_one'], 'default', array('class' => 'notification error png_bg'));
                        }
                        else{
                            $check = array_keys($this->request->data['check']);
                            $this->Video->updateAll(array('Video.status' => 0), array('Video.type' => $this->type));
                            $this->Video->id = $check[0];
                            $this->Video->saveField('status', 1);
                            if(isset($this->notice['active_many'])) $this->Session->setFlash($this->notice['active_many'], 'default', array('class' => 'notification success png_bg'));
                        }
                    }
                    else{
                        foreach($this->request->data['check'] as $key => $value){
                            $this->Video->id = $key;
                            $this->Video->saveField('status','1');
                        }
                        if(isset($this->notice['active_many'])) $this->Session->setFlash($this->notice['active_many'], 'default', array('class' => 'notification success png_bg'));
                    }
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'close'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Video->id = $key;
                        $this->Video->saveField('status','0');
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
                        
                        $delete = $this->Video->findById($key);
                        
                        $this->Upload->delete = $delete['Video']['images'];
                        $this->Upload->Process();
                        
                        $this->Video->delete($key);
                    }
                    if(isset($this->notice['delete_many'])) $this->Session->setFlash($this->notice['delete_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
        }
        
        $this->paginate = array(
            'conditions'=>array('Video.type'=>$this->type),
            'order' => array('Video.order'=>'DESC','Video.id' => 'DESC'),
            'limit' => '10'
        );
        
        $this->set('view', $this->paginate('Video'));
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Video->set($this->request->data);
            if ($this->Video->validates()) {
                
                if($this->only_one) if($this->request->data['Video']['status']) $this->Video->updateAll(array('Video.status' => 0), array('Video.type' => $this->type));
                
                $this->request->data['Video']['type'] = $this->type;
                $this->Video->save($this->request->data);
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
            $order = $this->Video->find('first',array('conditions'=>array('Video.type'=>$this->type),'order' => array('Video.order' => 'DESC')));
            if(isset($order['Video']['order'])) $this->request->data['Video']['order'] = $order['Video']['order'] + 1; else $this->request->data['Video']['order'] = 0;
            
        }
        
        $this->loadModel("Catproduct");
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=>$this->type
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        $this->set(compact('list_cat'));
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            
            $this->Video->set($this->request->data);
            if ($this->Video->validates()) {
                
                if($this->only_one) if($this->request->data['Video']['status']) $this->Video->updateAll(array('Video.status' => 0), array('Video.type' => $this->type));
                
                $this->request->data['Video']['type'] = $this->type;
                $this->Video->save($this->request->data);
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
            $this->request->data = $this->Video->findById($id);
            if (empty($this->request->data)){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            
        }
        
        $this->loadModel("Catproduct");
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=>$this->type
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        $this->set(compact('list_cat'));
    }

    public function delete($id = null) {
        
        $delete = $this->Video->findById($id);
        if (!$delete) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Upload->delete = $delete['Video']['images'];
            $this->Upload->Process();
            $this->Video->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }
    
    public function close($id = null) {
        if($this->only_one) $this->cancel();
        $this->Video->id = $id;
        $this->Video->saveField('status', 0);
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null) {
        if($this->only_one) $this->Video->updateAll(array('Video.status' => 0), array('Video.type' => $this->type));
        $this->Video->id = $id;
        $this->Video->saveField('status', 1);
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

}