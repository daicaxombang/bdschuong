<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class RunrightsController extends AppController {

    public $name = 'Runrights';
    public $uses = array('Extention');
    
    public $type = 'right';
    public $only_one = true;
    public $img_width = 145;//set width of image after upload
    public $img_height = 0;// 0 -> auto
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }
 
    public function index() {
        
        
        if($this->request->is('post')){

            if($this->request->data['option'] == 'order'){
                foreach($this->request->data['order'] as $key => $value){
                    $this->Extention->id = $key;
                    $this->Extention->saveField('order',$value);
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
                            $this->Extention->updateAll(array('Extention.status' => 0), array('Extention.type' => $this->type));
                            $this->Extention->id = $check[0];
                            $this->Extention->saveField('status', 1);
                            if(isset($this->notice['active_many'])) $this->Session->setFlash($this->notice['active_many'], 'default', array('class' => 'notification success png_bg'));
                        }
                    }
                    else{
                        foreach($this->request->data['check'] as $key => $value){
                            $this->Extention->id = $key;
                            $this->Extention->saveField('status','1');
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
                        $this->Extention->id = $key;
                        $this->Extention->saveField('status','0');
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
                        
                        $delete = $this->Extention->findById($key);
                        
                        $this->Upload->delete = $delete['Extention']['images'];
                        $this->Upload->Process();
                        
                        $this->Extention->delete($key);
                    }
                    if(isset($this->notice['delete_many'])) $this->Session->setFlash($this->notice['delete_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
        }
        
        $this->paginate = array(
            'conditions'=>array('Extention.type'=>$this->type),
            'order' => array('Extention.order'=>'DESC','Extention.id' => 'DESC'),
            'limit' => '10'
        );
        
        $this->set('view', $this->paginate('Extention'));
    }

    public function add() {
        if (!empty($this->request->data) && isset($_SESSION['session_cat'])) {
            $this->Extention->set($this->request->data);
            if ($this->Extention->validates()) {
                
                if(isset($this->request->data['Extention']['images'])){
                    $this->Upload->w = $this->img_width;
                    $this->Upload->h = $this->img_height;
                    if(isset($this->request->data['Extention']['name'])) $this->Upload->name = $this->request->data['Extention']['name'];
    				$this->Upload->new = $this->request->data['Extention']['images'];
    				$this->request->data['Extention']['images'] = $this->Upload->Process();
                }
                
                if($this->only_one) if($this->request->data['Extention']['status']) $this->Extention->updateAll(array('Extention.status' => 0), array('Extention.type' => $this->type));
                
                $this->request->data['Extention']['type'] = $this->type;
                $this->Extention->save($this->request->data);
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
            $order = $this->Extention->find('first',array('conditions'=>array('type'=>$this->type),'order' => array('order' => 'DESC')));
            if(isset($order['Extention']['order'])) $this->request->data['Extention']['order'] = $order['Extention']['order'];
            
        }
    }

    public function edit($id = null) {
        if (!empty($this->request->data) && isset($_SESSION['session_cat'])) {
            
            $this->Extention->set($this->request->data);
            if ($this->Extention->validates()) {
			
                if(isset($this->request->data['Extention']['images'])){
                    $img = $this->Extention->find(
    					'first',
    					array(
    						'conditions'=>array(
    							'Extention.id'    =>  $this->request->data['Extention']['id']
    						)
    					)
    				);
                    if (!empty($this->request->data['Extention']['images']['name'])) {
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        $this->Upload->delete = $img['Extention']['images'];
                        if(isset($this->request->data['Extention']['name'])) $this->Upload->name = $this->request->data['Extention']['name'];
                        $this->Upload->new = $this->request->data['Extention']['images'];
                        $this->request->data['Extention']['images'] = $this->Upload->Process();
                    }
                    else $this->request->data['Extention']['images'] = $img['Extention']['images'];
                }
                
                if($this->only_one) if($this->request->data['Extention']['status']) $this->Extention->updateAll(array('Extention.status' => 0), array('Extention.type' => $this->type));
                
                $this->request->data['Extention']['type'] = $this->type;
                $this->Extention->save($this->request->data);
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
            $this->request->data = $this->Extention->findById($id);
            if (empty($this->request->data)){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            
        }
    }

    public function delete($id = null) {
        
        $delete = $this->Extention->findById($id);
        if (!$delete) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Upload->delete = $delete['Extention']['images'];
            $this->Upload->Process();
            $this->Extention->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }
    
    public function close($id = null) {
        if($this->only_one) $this->cancel();
        $this->Extention->id = $id;
        $this->Extention->saveField('status', 0);
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null) {
        if($this->only_one) $this->Extention->updateAll(array('Extention.status' => 0), array('Extention.type' => $this->type));
        $this->Extention->id = $id;
        $this->Extention->saveField('status', 1);
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

}