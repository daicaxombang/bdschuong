<?php
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class HangsController extends AppController {

    public $name = 'Hangs';
    public $uses = array('Hang');
    
    public $type = 'product';
    
    public $max_img = 1000;
    public $img_width = 0;//set width of image after upload
    public $img_height = 0;// 0 -> auto
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }

    public function index($id = null) {
        
        if($this->request->is('post')){

            if($this->request->data['option'] == 'order'){
                foreach($this->request->data['order'] as $key => $value){
                    $this->Hang->id = $key;
                    $this->Hang->saveField('order',$value);
                }
                if(isset($this->notice['order'])) $this->Session->setFlash($this->notice['order'], 'default', array('class' => 'notification success png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Hang->id = $key;
                        $this->Hang->saveField('status','1');
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
                        $this->Hang->id = $key;
                        $this->Hang->saveField('status','0');
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
                        $this->Hang->delete($key);
                    }
                    if(isset($this->notice['delete_many'])) $this->Session->setFlash($this->notice['delete_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
        }
        
        $this->paginate = array(
            'conditions' => array(
                'Hang.type' => $this->type,
                'Hang.parent_id' => $id,
            ),
            'order' => array('Hang.order'=>'DESC', 'Hang.id'=>'DESC'),
            'limit' => '20'
        );
        $this->set('view', $this->paginate('Hang'));

        // List for combo box
        //$list_cat = $this->Hang->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        $list_cat = $this->Hang->treelist(
            array(
                'conditions' => array(
                    'Hang.parent_id' => null,
                    'Hang.type' => $this->type,
                ),
                'order' => array('Hang.order'=>'DESC', 'Hang.id'=>'DESC'),
            ),
            ' -- '
        );

        $this->set(compact('list_cat'));
        
        $this->Session->write('parent_id',$id);
    }

    public function add($id = null) {
       
        if (!empty($this->request->data)) {  
            //pr($this->request->data); die;
            $this->Hang->set($this->request->data);
            if ($this->Hang->validates()) {
                $this->request->data['Hang']['type'] = $this->type;
                $link = null;
                
                if($this->request->data['Hang']['parent_id'] != null){
                    $link = $this->Hang->findById($this->request->data['Hang']['parent_id']);
                    
                }
                if($link != null){
                    $this->request->data['Hang']['url'] = $link['Hang']['url']; 
                }
                if(isset($this->request->data['Hang']['images'])){
                    $this->Upload->w = $this->img_width;
                    $this->Upload->h = $this->img_height;
                    $this->Upload->max_img = $this->max_img;
                    if(isset($this->request->data['Hang']['name'])) $this->Upload->name = $this->request->data['Hang']['name'];
                    $this->Upload->new = $this->request->data['Hang']['images'];
                    $this->request->data['Hang']['images'] = $this->Upload->Process();
                }
                $this->request->data['Hang']['user_id'] = $_SESSION['id'];
                $this->Hang->save($this->request->data);
                if($link == null){
                    $order = $this->Hang->find('first',array('conditions'=>array(),'order' => array('Hang.id' => 'DESC')));
                    $this->Hang->id = $order['Hang']['id'];
                    $this->Hang->saveField('url', $order['Hang']['link']); 
                }
                
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));

                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index')); 
            }
            else{
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification error png_bg'));
            }
        }
        else{
            $this->request->data['Hang']['parent_id'] = $this->Session->read('parent_id');
            $order = $this->Hang->find('first',array('conditions'=>array('Hang.parent_id' => $this->request->data['Hang']['parent_id'], 'Hang.type' => $this->type),'order' => array('Hang.order' => 'DESC')));
            if(isset($order['Hang']['order'])){ $this->request->data['Hang']['order'] = $order['Hang']['order'] + 1;}else{$this->request->data['Hang']['order'] = 0;}
            //$this->Session->write('back_after_save',$this->referer());
        }
        
        //$list_cat = $this->Hang->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        
        $list_cat = $this->Hang->treelist(
            array(
                'conditions' => array(
                    'Hang.parent_id' => null,
                    'Hang.type' => $this->type,
                ),
                'order' => array('Hang.order'=>'DESC', 'Hang.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat'));
    
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            
            $this->Hang->set($this->request->data);
            if ($this->Hang->validates()) {
                //pr($this->request->data); die;
                if(isset($this->request->data['Hang']['images'])){
                    $img = $this->Hang->find(
                        'first',
                        array(
                            'conditions'=>array(
                                'Hang.id'    =>  $this->request->data['Hang']['id']
                            )
                        )
                    );
                    
                    if (!empty($this->request->data['Hang']['images']['name'])) {
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        $this->Upload->max_img = $this->max_img;
                        $this->Upload->delete = $img['Hang']['images'];
                        if(isset($this->request->data['Hang']['name'])) $this->Upload->name = $this->request->data['Hang']['name'];
                        $this->Upload->new = $this->request->data['Hang']['images'];
                        $this->request->data['Hang']['images'] = $this->Upload->Process();
                    }
                    else $this->request->data['Hang']['images'] = $img['Hang']['images'];
                }
                
                $this->request->data['Hang']['type'] = $this->type;
                $this->request->data['Hang']['user_id_edit'] = $_SESSION['id'];
                $this->Hang->save($this->request->data);
                if(isset($this->notice['edit_success'])) $this->Session->setFlash($this->notice['edit_success'], 'default', array('class' => 'notification success png_bg'));
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index')); 
            }
            else{
                if(isset($this->notice['edit_failed'])) $this->Session->setFlash($this->notice['edit_failed'], 'default', array('class' => 'notification error png_bg'));
            }
        }
        else {
            $this->request->data = $this->Hang->findById($id);
            
            if (!$this->request->data) {
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            //$this->Session->write('back_after_save',$this->referer());
        }
        //$list_cat = $this->Hang->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        
        $list_cat = $this->Hang->treelist(
            array(
                'conditions' => array(
                    'Hang.parent_id' => null,
                    'Hang.type' => $this->type,
                ),
                'order' => array('Hang.order'=>'DESC', 'Hang.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat'));
    }

    public function delete($id = null) {
        $this->loadModel('Product');
        $hang_id = $this->Product->findByHang_id($id);
        if(!empty($hang_id)){
            if(isset($this->notice['no_delete_hang'])) $this->Session->setFlash($this->notice['no_delete_hang'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        
        if (!$this->Hang->findById($id)) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Hang->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }
    
    public function close($id = null, $j = null) {
        $this->Hang->id = $id;
        if($j){
            $this->Hang->saveField($j, 0);
        }else{
            $this->Hang->saveField('status', 0);
        }
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null, $j = null) {
        $this->Hang->id = $id;
        if($j){
            $this->Hang->saveField($j, 1);
        }else{
            $this->Hang->saveField('status', 1);
        }
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }
}