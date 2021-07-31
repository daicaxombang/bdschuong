<?php


/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
 
class NewsController extends AppController {

    public $name = 'News';
    public $uses = array('Post');
    
    public $type = 'news';
    
    public $img_width = 600;//set width of image after upload
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
        }
        
        $this->Session->delete('search_keyword');
        $this->Session->delete('search_cat');
        
        $this->paginate = array(
            'conditions' => array(
                'Post.type' => $this->type
            ),
            'order' => array('Post.order'=>'DESC','Post.id' => 'DESC'),
            'limit' => '10'
        );
        
        $this->set('view', $this->paginate('Post'));

        $this->loadModel("Catalogue");
        //$list_cat = $this->Catalogue->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        
        $list_cat = $this->Catalogue->treelist(
            array(
                'conditions' => array(
                    'Catalogue.parent_id' => null,
                    'Catalogue.type'=>$this->type
                ),
                'order' => array('Catalogue.order'=>'DESC', 'Catalogue.id'=>'DESC'),
            ),
            ' - '
        );
        
        $this->set(compact('list_cat'));
    }
    
    public function add() {
        if (!empty($this->request->data)) {
            
            $this->Post->set($this->request->data);
            if ($this->Post->validates()) {
                
                if(isset($this->request->data['Post']['images'])){
                    $this->Upload->w = $this->img_width;
                    $this->Upload->h = $this->img_height;
                    if(isset($this->request->data['Post']['name'])) $this->Upload->name = $this->request->data['Post']['name'];
                    $this->Upload->new = $this->request->data['Post']['images'];
                    $this->request->data['Post']['images'] = $this->Upload->Process();
                }
                
                $this->request->data['Post']['type'] = $this->type;
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
            $order = $this->Post->find('first',array('conditions'=>array('Post.cat_id'=>$this->request->data['Post']['cat_id']),'order' => array('Post.order' => 'DESC')));
            if(isset($order['Post']['order'])) $this->request->data['Post']['order'] = $order['Post']['order'];
            $this->request->data['Post']['status'] = 1;
            $this->Session->write('back_after_save',$this->referer());
        }

        $this->loadModel("Catalogue");
        //$list_cat = $this->Catalogue->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        
        $list_cat = $this->Catalogue->treelist(
            array(
                'conditions' => array(
                    'Catalogue.parent_id' => null,
                    'Catalogue.type'=>$this->type
                ),
                'order' => array('Catalogue.order'=>'DESC', 'Catalogue.id'=>'DESC'),
            ),
            ' - '
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
                        $this->Upload->delete = $img['Post']['images'];
                        if(isset($this->request->data['Post']['name'])) $this->Upload->name = $this->request->data['Post']['name'];
                        $this->Upload->new = $this->request->data['Post']['images'];
                        $this->request->data['Post']['images'] = $this->Upload->Process();
                    }
                    else $this->request->data['Post']['images'] = $img['Post']['images'];
                }

                $this->request->data['Post']['type'] = $this->type;
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
            $this->Session->write('back_after_save',$this->referer());
        }

        $this->loadModel("Catalogue");
        //$list_cat = $this->Catalogue->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        
        $list_cat = $this->Catalogue->treelist(
            array(
                'conditions' => array(
                    'Catalogue.parent_id' => null,
                    'Catalogue.type'=>$this->type
                ),
                'order' => array('Catalogue.order'=>'DESC', 'Catalogue.id'=>'DESC'),
            ),
            ' - '
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
            
            $order = $this->Post->find('first',array('order' => array('Post.order' => 'DESC')));
            if(isset($order['Post']['order'])) $this->request->data['Post']['order'] = $order['Post']['order'];
            
            $this->Session->write('back_after_save',$this->referer());
        }

        $this->loadModel("Catalogue");
        //$list_cat = $this->Catalogue->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        
        $list_cat = $this->Catalogue->treelist(
            array(
                'conditions' => array(
                    'Catalogue.parent_id' => null,
                    'Catalogue.type'=>$this->type
                ),
                'order' => array('Catalogue.order'=>'DESC', 'Catalogue.id'=>'DESC'),
            ),
            ' - '
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

    public function close($id = null) {
        $this->Post->id = $id;
        $this->Post->saveField('status', 0);
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null) {
        $this->Post->id = $id;
        $this->Post->saveField('status', 1);
        if(isset($this->notice['active'])) $this->Session->setFlash($this->notice['active'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    
    private function multiMenuPost($parentid = null, $trees = array()) {
        
        $trees[] = $parentid;
        
        $parmenu = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.parent_id' => $parentid,
                'Catalogue.status' => 1
            ),
            ));
        if ($parmenu) {
            foreach ($parmenu as $field) {
                $trees = $this->multiMenuPost($field['Catalogue']['id'], $trees);
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
        
        $this->loadModel("Catalogue");

        $this->paginate = array(
            'conditions' => array(
                'Post.type' => $this->type,
                'Post.name like' => '%'.$search_keyword.'%',
                'Post.cat_id'    => $this->multiMenuPost($search_cat),
            ),
            'order' => array('Post.order'=>'DESC', 'Post.id'=>'DESC'),
            'limit' => '10'
        );
        
        $this->set('view', $this->paginate('Post'));

        
        //$list_cat = $this->Catalogue->generateTreeList(array('type'=>$this->type), null, null, ' - ');
        
        $list_cat = $this->Catalogue->treelist(
            array(
                'conditions' => array(
                    'Catalogue.parent_id' => null,
                    'Catalogue.type'=>$this->type
                ),
                'order' => array('Catalogue.order'=>'DESC', 'Catalogue.id'=>'DESC'),
            ),
            ' - '
        );
        
        $this->set(compact('list_cat'));
        
        $this->render('index');
    }
}