<?php
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class CatnewimgsController extends AppController {

    public $name = 'Catnewimgs';
    public $uses = array('Catproduct');
    
    public $type = 'new';
    
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
                    $this->Catproduct->id = $key;
                    $this->Catproduct->saveField('order',$value);
                }
                if(isset($this->notice['order'])) $this->Session->setFlash($this->notice['order'], 'default', array('class' => 'notification success png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Catproduct->id = $key;
                        $this->Catproduct->saveField('status','1');
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
                        $this->Catproduct->id = $key;
                        $this->Catproduct->saveField('status','0');
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
                        $this->Catproduct->delete($key);
                    }
                    if(isset($this->notice['delete_many'])) $this->Session->setFlash($this->notice['delete_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
        }
        
        $this->paginate = array(
            'conditions' => array(
                'Catproduct.type' => $this->type,
                'Catproduct.parent_id' => $id,
            ),
            'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            'limit' => '20'
        );
        $this->set('view', $this->paginate('Catproduct'));

        // List for combo box
        //$list_cat = $this->Catproduct->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type' => $this->type,
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );

        $this->set(compact('list_cat'));
        
        $this->Session->write('parent_id',$id);
    }

    public function add($id = null) {
        $this->redirect(array('action' => 'index')); 
        if (!empty($this->request->data)) {  
            //pr($this->request->data); die;
            $this->Catproduct->set($this->request->data);
            if ($this->Catproduct->validates()) {
                $this->request->data['Catproduct']['type'] = $this->type;
                $link = null;
                
                if($this->request->data['Catproduct']['parent_id'] != null){
                    $link = $this->Catproduct->findById($this->request->data['Catproduct']['parent_id']);
                    
                }
                if($link != null){
                    $this->request->data['Catproduct']['url'] = $link['Catproduct']['url']; 
                }
                if(isset($this->request->data['Catproduct']['images'])){
                    $this->Upload->w = $this->img_width;
                    $this->Upload->h = $this->img_height;
                    $this->Upload->max_img = $this->max_img;
                    if(isset($this->request->data['Catproduct']['name'])) $this->Upload->name = $this->request->data['Catproduct']['name'];
                    $this->Upload->new = $this->request->data['Catproduct']['images'];
                    $this->request->data['Catproduct']['images'] = $this->Upload->Process();
                }
                $this->request->data['Catproduct']['user_id'] = $_SESSION['id'];
                $this->Catproduct->save($this->request->data);
                if($link == null){
                    $order = $this->Catproduct->find('first',array('conditions'=>array(),'order' => array('Catproduct.id' => 'DESC')));
                    $this->Catproduct->id = $order['Catproduct']['id'];
                    $this->Catproduct->saveField('url', $order['Catproduct']['link']); 
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
            $this->request->data['Catproduct']['parent_id'] = $this->Session->read('parent_id');
            $order = $this->Catproduct->find('first',array('conditions'=>array('Catproduct.parent_id' => $this->request->data['Catproduct']['parent_id'], 'Catproduct.type' => $this->type),'order' => array('Catproduct.order' => 'DESC')));
            if(isset($order['Catproduct']['order'])){ $this->request->data['Catproduct']['order'] = $order['Catproduct']['order'] + 1;}else{$this->request->data['Catproduct']['order'] = 0;}
            //$this->Session->write('back_after_save',$this->referer());
        }
        
        //$list_cat = $this->Catproduct->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type' => $this->type,
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat'));
    
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            
            $this->Catproduct->set($this->request->data);
            if ($this->Catproduct->validates()) {
                //pr($this->request->data); die;
                if(isset($this->request->data['Catproduct']['images1'])){
                    $img = $this->Catproduct->find(
                        'first',
                        array(
                            'conditions'=>array(
                                'Catproduct.id'    =>  $this->request->data['Catproduct']['id']
                            )
                        )
                    );
                    
                    if (!empty($this->request->data['Catproduct']['images1']['name'])) {
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        $this->Upload->max_img = $this->max_img;
                        $this->Upload->delete = $img['Catproduct']['images1'];
                        if(isset($this->request->data['Catproduct']['name'])) $this->Upload->name = $this->request->data['Catproduct']['name'];
                        $this->Upload->new = $this->request->data['Catproduct']['images1'];
                        $this->request->data['Catproduct']['images1'] = $this->Upload->Process();
                    }
                    else $this->request->data['Catproduct']['images1'] = $img['Catproduct']['images1'];
                }
                
                $this->request->data['Catproduct']['type'] = $this->type;
                $this->request->data['Catproduct']['user_id_edit'] = $_SESSION['id'];
                $this->Catproduct->save($this->request->data);
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
            $this->request->data = $this->Catproduct->findById($id);
            
            if (!$this->request->data) {
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            //$this->Session->write('back_after_save',$this->referer());
        }
        //$list_cat = $this->Catproduct->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type' => $this->type,
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat'));
    }

    public function delete($id = null) {$this->redirect(array('action' => 'index')); 
        if(in_array($id, $this->cat_nodel)){
            if(isset($this->notice['no_delete'])) $this->Session->setFlash($this->notice['no_delete'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        
        if (!$this->Catproduct->findById($id)) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Catproduct->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }
    
    public function close($id = null, $j = null) {
        $this->Catproduct->id = $id;
        if($j){
            $this->Catproduct->saveField($j, 0);
        }else{
            $this->Catproduct->saveField('status', 0);
        }
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null, $j = null) {
        $this->Catproduct->id = $id;
        if($j){
            $this->Catproduct->saveField($j, 1);
        }else{
            $this->Catproduct->saveField('status', 1);
        }
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }
}