<?php
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class DanhmucsController extends AppController {

    public $name = 'Danhmucs';
    public $uses = array('Catproduct');
    
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
                'Catproduct.parent_id' => $id,
                'Catproduct.dang1' => 0,
//                'Catproduct.type' => array('new', ''),
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
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );

        $this->set(compact('list_cat'));
        
        $this->Session->write('parent_id',$id);
    }
    
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            
            $this->Catproduct->set($this->request->data);
            if ($this->Catproduct->validates()) {
                //pr($this->request->data); die;
                if(isset($this->request->data['Catproduct']['images'])){
                    $img = $this->Catproduct->find(
                        'first',
                        array(
                            'conditions'=>array(
                                'Catproduct.id'    =>  $this->request->data['Catproduct']['id']
                            )
                        )
                    );
                    
                    if (!empty($this->request->data['Catproduct']['images']['name'])) {
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        $this->Upload->max_img = $this->max_img;
                        $this->Upload->delete = $img['Catproduct']['images'];
                        if(isset($this->request->data['Catproduct']['name'])) $this->Upload->name = $this->request->data['Catproduct']['name'];
                        $this->Upload->new = $this->request->data['Catproduct']['images'];
                        $this->request->data['Catproduct']['images'] = $this->Upload->Process();
                    }
                    else $this->request->data['Catproduct']['images'] = $img['Catproduct']['images'];
                }
                $edit = $this->Catproduct->findById($this->request->data['Catproduct']['id']);
                if(!empty($edit['Catproduct']['id'])){
                    $this->request->data['Catproduct']['parent_id'] = $edit['Catproduct']['parent_id'];
                    $this->request->data['Catproduct']['type'] = $edit['Catproduct']['type'];
                }
                
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