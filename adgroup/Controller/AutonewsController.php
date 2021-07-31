<?php
 
/** ******************************
 * @author  :   001
 * @email   :   ctkgroup@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class AutonewsController extends AppController {

    public $name = 'Autonews';
    public $uses = array('Post');
    
    public $type = 'post';
    public $type_cat = 'product';
    
    public $max_img = 1000;
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
                    $this->Post->id = $key;
                    $this->Post->saveField('order',$value);
                }
                if(isset($this->notice['order'])) $this->Session->setFlash($this->notice['order'], 'default', array('class' => 'notification success png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'price'){
                foreach($this->request->data['price'] as $key => $value){
                    $this->Post->id = $key;
                    $this->Post->saveField('price',$value);
                }
                if(isset($this->notice['price'])) $this->Session->setFlash($this->notice['price'], 'default', array('class' => 'notification success png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('status','1');
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
                        $this->Post->id = $key;
                        $this->Post->saveField('status','0');
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
                        
                        $delete = $this->Post->findById($key);
                        
                        $this->Upload->delete = $delete['Post']['images'];
                        $this->Upload->Process();
                        
                        $this->Post->delete($key);
                    }
                    if(isset($this->notice['delete_many'])) $this->Session->setFlash($this->notice['delete_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            //phan thay doi choose 1
            else if($this->request->data['option'] == 'choose1_active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose1','1');
                    }
                    if(isset($this->notice['active_many'])) $this->Session->setFlash($this->notice['active_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'choose1_close'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose1','0');
                    }
                    if(isset($this->notice['colse_many'])) $this->Session->setFlash($this->notice['colse_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            //phan thay doi choose 2
            else if($this->request->data['option'] == 'choose2_active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose2','1');
                    }
                    if(isset($this->notice['active_many'])) $this->Session->setFlash($this->notice['active_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'choose2_close'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose2','0');
                    }
                    if(isset($this->notice['colse_many'])) $this->Session->setFlash($this->notice['colse_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            //phan thay doi choose 3
            else if($this->request->data['option'] == 'choose3_active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose3','1');
                    }
                    if(isset($this->notice['active_many'])) $this->Session->setFlash($this->notice['active_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'choose3_close'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose3','0');
                    }
                    if(isset($this->notice['colse_many'])) $this->Session->setFlash($this->notice['colse_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            //phan thay doi choose 4
            else if($this->request->data['option'] == 'choose4_active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose4','1');
                    }
                    if(isset($this->notice['active_many'])) $this->Session->setFlash($this->notice['active_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'choose4_close'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose4','0');
                    }
                    if(isset($this->notice['colse_many'])) $this->Session->setFlash($this->notice['colse_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            //phan thay doi choose 5
            else if($this->request->data['option'] == 'choose5_active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose5','1');
                    }
                    if(isset($this->notice['active_many'])) $this->Session->setFlash($this->notice['active_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'choose5_close'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Post->id = $key;
                        $this->Post->saveField('choose5','0');
                    }
                    if(isset($this->notice['colse_many'])) $this->Session->setFlash($this->notice['colse_many'], 'default', array('class' => 'notification success png_bg'));
                }
                else if(isset($this->notice['empty_select'])) $this->Session->setFlash($this->notice['empty_select'], 'default', array('class' => 'notification attention png_bg'));
                $this->cancel();
            }
            
        }
        
        $this->Session->delete('search_keyword');
        $this->Session->delete('search_cat');
        
        $this->paginate = array(
            'conditions' => array(
                'Post.type' => $this->type,
                'Post.auto' => 1
            ),
            'order' => array('Post.id' => 'DESC'),
            'limit' => '50'
        );
        
        $this->set('view', $this->paginate('Post'));

        $this->loadModel("Catproduct");
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=>$this->type_cat
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat'));
    }
    
    public function add() {
        if (!empty($this->request->data)) {
            $this->request->data['Post']['tinhtrang'] = 1;
            $this->Post->set($this->request->data);
            
            if ($this->Post->validates()) {
                
                if(isset($this->request->data['Post']['images'])){
                    $this->Upload->w = $this->img_width;
                    $this->Upload->h = $this->img_height;
                    $this->Upload->max_img = $this->max_img;
                    if(isset($this->request->data['Post']['name'])) $this->Upload->name = $this->request->data['Post']['name'];
                    $this->Upload->new = $this->request->data['Post']['images'];
                    //$this->watermark = ROOT.DS.'admin'.DS.'webroot'.DS.'images'.DS.'logo.png';
                    $this->request->data['Post']['images'] = $this->Upload->Process();
                }
                
                $this->request->data['Post']['type'] = $this->type;
                $this->request->data['Post']['user_id'] = $_SESSION['id'];
                $this->Post->save($this->request->data);
                
                
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index'));
            } else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification error png_bg'));
            }
        }
        else{
            $this->request->data['Post']['cat_id'] = $this->Session->read('search_cat');
            $order = $this->Post->find('first',array('conditions'=>array('Post.type' => $this->type, 'Post.cat_id'=>$this->request->data['Post']['cat_id']),'order' => array('Post.order' => 'DESC')));
            if(isset($order['Post']['order'])){ $this->request->data['Post']['order'] = $order['Post']['order'] + 1;}else{$this->request->data['Post']['order'] = 0;}
            $this->request->data['Post']['status'] = 1;
            $this->request->data['Post']['tinhtrang'] = 1;
            $this->Post->set($this->request->data);
        }
        
        $this->loadModel("Catproduct");
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=>$this->type_cat
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat'));
    }
    
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            $this->Post->set($this->request->data);
            if ($this->Post->validates()) {
                
                if(isset($this->request->data['Post']['images'])){
                    $img = $this->Post->find(
                        'first',
                        array(
                            'conditions'=>array(
                                'Post.id'    =>  $this->request->data['Post']['id']
                            )
                        )
                    );
                    
                    if (!empty($this->request->data['Post']['images']['name'])) {
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        $this->Upload->max_img = $this->max_img;
                        $this->Upload->delete = $img['Post']['images'];
                        if(isset($this->request->data['Post']['name'])) $this->Upload->name = $this->request->data['Post']['name'];
                        $this->Upload->new = $this->request->data['Post']['images'];
                        $this->request->data['Post']['images'] = $this->Upload->Process();
                    }
                    else $this->request->data['Post']['images'] = $img['Post']['images'];
                }
                
                $this->request->data['Post']['type'] = $this->type;
                $this->request->data['Post']['user_id_edit'] = $_SESSION['id'];
                $this->Post->save($this->request->data);
                if(isset($this->notice['edit_success'])) $this->Session->setFlash($this->notice['edit_success'], 'default', array('class' => 'notification success png_bg'));
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index'));
            } else {
                if(isset($this->notice['edit_failed'])) $this->Session->setFlash($this->notice['edit_failed'], 'default', array('class' => 'notification error png_bg'));
            }
            

        }
        else{
            $this->request->data = $this->Post->findById($id);
            if (empty($this->request->data)){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            
        }

        $this->loadModel("Catproduct");
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
        $detailNews = $this->Post->findById($id);
        $this->set('edit', $detailNews);
        
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=>$this->type_cat
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat'));
    }
    
    public function copy($id = null) {
        if (!empty($this->request->data)) {
            
            $this->Post->set($this->request->data);
            if ($this->Post->validates()) {
                
                if(isset($this->request->data['Post']['images'])){
                    if ($this->request->data['Post']['images']['name']!='') {
    
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        if(isset($this->request->data['Post']['name'])) $this->Upload->name = $this->request->data['Post']['name'];
                        $this->Upload->new = $this->request->data['Post']['images'];
                        $this->request->data['Post']['images'] = $this->Upload->Process();
                    }
                    else {
                        $this->Upload->copy = $this->request->data['Post']['images_old'];
                        if(isset($this->request->data['Post']['name'])) $this->Upload->name = $this->request->data['Post']['name'];
                        $this->request->data['Post']['images'] = $this->Upload->process();
                    }
                }
                
                $this->request->data['Post']['type'] = $this->type;
                $this->request->data['Post']['user_id'] = $_SESSION['id'];
                $this->Post->save($this->request->data);
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
            $this->request->data = $this->Post->findById($id);
            if (empty($this->request->data)){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            $this->request->data['Post']['images_old'] = $this->request->data['Post']['images'];
            
            $order = $this->Post->find('first',array('conditions'=>array('Post.type' => $this->type, 'Post.id' => $id),'order' => array('Post.order' => 'DESC')));
            if(isset($order['Post']['order'])){ $this->request->data['Post']['order'] = $order['Post']['order'] + 1;}else{$this->request->data['Post']['order'] = 0;}
            
            

        }

        $this->loadModel("Catproduct");
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
        $detailNews = $this->Post->findById($id);
        $this->set('edit', $detailNews);
        
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=>$this->type_cat
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat'));
    }
        
    public function delete($id = null) {
        $delete = $this->Post->findById($id);
        if (!$delete) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Upload->delete = $delete['Post']['images'];
            $this->Upload->Process();
            
            $this->Post->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }

    public function close($id = null, $j = null) {
        $this->Post->id = $id;
        if($j){
            $this->Post->saveField($j, 0);
        }else{
            $this->Post->saveField('status', 0);
        }
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null, $j = null) {
        $this->Post->id = $id;
        if($j){
            $this->Post->saveField($j, 1);
        }else{
            $this->Post->saveField('status', 1);
        }
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    
    private function multiMenuProduct($parentid = null, $trees = array()) {
        
        $trees[] = $parentid;
        
        $parmenu = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1
            ),
            ));
        if ($parmenu) {
            foreach ($parmenu as $field) {
                $trees = $this->multiMenuProduct($field['Catproduct']['id'], $trees);
            }
        }
        return $trees;
    }

    public function search() {
        if ($this->request->is('post')) {
            $this->Session->write('search_keyword', $this->request->data['search_keyword']);
            $this->Session->write('search_cat', $this->request->data['search_cat']);
        }
        $search_keyword = $this->Session->read('search_keyword');
        $search_cat = $this->Session->read('search_cat');
        
        $this->loadModel("Catproduct");

        $this->paginate = array(
            'conditions' => array(
                'Post.type' => $this->type,
                'Post.name like' => '%'.$search_keyword.'%',
                'Post.cat_id'    => $this->multiMenuProduct($search_cat),
                'Post.auto' => 1
            ),
            'order' => array('Post.order'=>'DESC', 'Post.id'=>'DESC'),
            'limit' => '50'
        );
        
        $this->set('view', $this->paginate('Post'));

        // Load model
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
        $list_cat = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=>$this->type_cat
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat'));
        
        $this->render('index');
    }
}