<?php
 
/** ******************************
 * @author  :   001
 * @email   :   ctkgroup@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class ProductsController extends AppController {

    public $name = 'Products';
    public $uses = array('Product', 'Addimg', 'Hang', 'Exttmp');
    
    public $type = 'product';
    
    public $max_img = 1000;
    public $img_width = 0;//set width of image after upload
    public $img_height = 0;// 0 -> auto
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
        
        $list_hang = $this->Hang->treelist(
            array(
                'conditions' => array(
                    'Hang.parent_id' => null,
                    'Hang.type'=>$this->type
                ),
                'order' => array('Hang.order'=>'DESC', 'Hang.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_hang'));
        $data = $this->Product->find('all');
        
        /*$dem = 1;
        for($i = 0; $i <= 5; $i++){
            $data = $this->Product->findById($dem);
            $data['Product']['id'] = null;
            $data['Product']['cat_id'] = 12;
            $this->Product->save($data['Product']);
            $dem ++; if($dem == 7) $dem = 1;
        }*/

        $list_size = $this->Exttmp->find('all', array(
            'conditions' => array(
                'Exttmp.type' => 'size',
                'Exttmp.status' => 1
            ),
            'order' => array('Exttmp.order'=>'DESC', 'Exttmp.id'=>'DESC'),
        ));
        $this->set('list_size', $list_size);

        $list_color = $this->Exttmp->find('all', array(
            'conditions' => array(
                'Exttmp.type' => 'color',
                'Exttmp.status' => 1
            ),
            'order' => array('Exttmp.order'=>'DESC', 'Exttmp.id'=>'DESC'),
        ));
        $this->set('list_color', $list_color);

    }

    public function index() {
        
        if($this->request->is('post')){
            if($this->request->data['option'] == 'order'){
                foreach($this->request->data['order'] as $key => $value){
                    $this->Product->id = $key;
                    $this->Product->saveField('order',$value);
                }
                if(isset($this->notice['order'])) $this->Session->setFlash($this->notice['order'], 'default', array('class' => 'notification success png_bg'));
                $this->redirect($this->referer());
            }
            else if($this->request->data['option'] == 'price'){
                foreach($this->request->data['price'] as $key => $value){
                    $this->Product->id = $key;
                    $this->Product->saveField('price',$value);
                }
                if(isset($this->notice['price'])) $this->Session->setFlash($this->notice['price'], 'default', array('class' => 'notification success png_bg'));
                $this->cancel();
            }
            else if($this->request->data['option'] == 'active'){
                if(isset($this->request->data['check']))
                {
                    foreach($this->request->data['check'] as $key => $value){
                        $this->Product->id = $key;
                        $this->Product->saveField('status','1');
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
                        $this->Product->id = $key;
                        $this->Product->saveField('status','0');
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
                        
                        $delete = $this->Product->findById($key);
                        
                        $this->Upload->delete = $delete['Product']['images'];
                        $this->Upload->Process();
                        
                        $this->Product->delete($key);
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
                        $this->Product->id = $key;
                        $this->Product->saveField('choose1','1');
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
                        $this->Product->id = $key;
                        $this->Product->saveField('choose1','0');
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
                        $this->Product->id = $key;
                        $this->Product->saveField('choose2','1');
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
                        $this->Product->id = $key;
                        $this->Product->saveField('choose2','0');
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
                        $this->Product->id = $key;
                        $this->Product->saveField('choose3','1');
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
                        $this->Product->id = $key;
                        $this->Product->saveField('choose3','0');
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
                        $this->Product->id = $key;
                        $this->Product->saveField('choose4','1');
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
                        $this->Product->id = $key;
                        $this->Product->saveField('choose4','0');
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
                'Product.type' => $this->type
            ),
            'order' => array('Product.id' => 'DESC'),
            'limit' => '30'
        );
        
        $this->set('view', $this->paginate('Product'));

        $this->loadModel("Catproduct");
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
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
    
    public function add() {
        if (!empty($this->request->data)) {
            $this->request->data['Product']['tinhtrang'] = 1;
            $this->Product->set($this->request->data);
            
            //check slg chọn
            if(!empty($this->request->data['Product']['files'])){
                if(count($this->request->data['Product']['files']) > 12){
                    $this->Session->setFlash('Bạn chỉ được chọn tối đa 12 ảnh 1 lần', 'default', array('class' => 'notification error png_bg'));
                    $this->redirect($this->referer());
                    exit;
                }
            }
            if ($this->Product->validates()) {
                
                if(isset($this->request->data['Product']['images'])){
                    $this->Upload->w = $this->img_width;
                    $this->Upload->h = $this->img_height;
                    $this->Upload->max_img = $this->max_img;
                    if(isset($this->request->data['Product']['name'])) $this->Upload->name = $this->request->data['Product']['name'];
                    $this->Upload->new = $this->request->data['Product']['images'];
                    //$this->watermark = ROOT.DS.'admin'.DS.'webroot'.DS.'images'.DS.'logo.png';
                    $this->request->data['Product']['images'] = $this->Upload->Process();
                }
                
                //multi ảnh
                $groupImg = "";
                $dem = 0;
                if(count($this->request->data['Product']['files'] > 0)){
                    $count = count($this->request->data['Product']['files']);
                    foreach($this->request->data['Product']['files'] as $key=>$value){
                        //echo $value['name'].'----';
                        if(isset($value['name'])){
                            $this->Upload->w = $this->img_width;
                            $this->Upload->h = $this->img_height;
                            if(isset($this->request->data['Product']['name'])) $this->Upload->name = $this->request->data['Product']['name'].$key;
                            $this->Upload->new = $this->request->data['Product']['files'][$key];
                            //if($logoin){
                                //$this->watermark = ROOT.DS.'app'.DS.'webroot'.DS.'img'.DS.$logoin['Extention']['images'];
                            //}
                            $this->request->data['Product']['files'][$key] = $this->Upload->Process();
                            $img = $this->request->data['Product']['files'][$key];
                        }
                        if($dem == ($count - 1)){
                            $groupImg .= $img;
                        }else{
                            $groupImg .= $img . ",";
                        }
                    $dem ++;
                    }//end for
                }//end if
                $this->request->data['Product']['multiple'] = $groupImg;

                //luu mau, size
                if(isset($this->request->data['size'])){
                    $tmp = '';
                    foreach($this->request->data['size'] as $key=>$value){
                        $tmp .= $value.',';
                    }
                    $this->request->data['Product']['size'] = substr($tmp, 0, -1);
                }

                if(isset($this->request->data['color'])){
                    $tmp = '';
                    foreach($this->request->data['color'] as $key=>$value){
                        $tmp .= $value.',';
                    }
                    $this->request->data['Product']['mausac'] = substr($tmp, 0, -1);
                }
                $this->request->data['Product']['type'] = $this->type;
                $this->request->data['Product']['user_id'] = $_SESSION['id'];
                $this->Product->save($this->request->data);
                
                
                if(isset($this->notice['add_success'])) $this->Session->setFlash($this->notice['add_success'], 'default', array('class' => 'notification success png_bg'));
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index'));
            } else {
                if(isset($this->notice['add_failed'])) $this->Session->setFlash($this->notice['add_failed'], 'default', array('class' => 'notification error png_bg'));
            }
        }
        else{
            //$this->request->data = $this->Product->findById(27);
            $this->request->data['Product']['cat_id'] = $this->Session->read('search_cat');
            $order = $this->Product->find('first',array('conditions'=>array('Product.type' => $this->type, 'Product.cat_id'=>$this->request->data['Product']['cat_id']),'order' => array('Product.order' => 'DESC')));
            if(isset($order['Product']['order'])){ $this->request->data['Product']['order'] = $order['Product']['order'] + 1;}else{$this->request->data['Product']['order'] = 0;}
            $this->request->data['Product']['status'] = 1;
            $this->request->data['Product']['tinhtrang'] = 1;
            $this->Product->set($this->request->data);
        }
        
        $this->loadModel("Catproduct");
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
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
        //chọn loại
        $list_cat_loai = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=> 'footer'
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat_loai'));
    }
    
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            //check slg chọn
            if(!empty($this->request->data['Product']['files'])){
                if(count($this->request->data['Product']['files']) > 12){
                    $this->Session->setFlash('Bạn chỉ được chọn tối đa 12 ảnh 1 lần', 'default', array('class' => 'notification error png_bg'));
                    $this->redirect($this->referer());
                    exit;
                }
            }
            
            $this->Product->set($this->request->data);
            if ($this->Product->validates()) {
                
                if(isset($this->request->data['Product']['images'])){
                    $img = $this->Product->find(
                        'first',
                        array(
                            'conditions'=>array(
                                'Product.id'    =>  $this->request->data['Product']['id']
                            )
                        )
                    );
                    
                    if (!empty($this->request->data['Product']['images']['name'])) {
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        $this->Upload->max_img = $this->max_img;
                        //$this->Upload->delete = $img['Product']['images'];
                        if(isset($this->request->data['Product']['name'])) $this->Upload->name = $this->request->data['Product']['name'];
                        $this->Upload->new = $this->request->data['Product']['images'];
                        $this->request->data['Product']['images'] = $this->Upload->Process();
                    }
                    else $this->request->data['Product']['images'] = $img['Product']['images'];
                }
                
                $temp = null;
                    if(isset($_POST['img'])){
                        $dem = 1;
                        foreach($_POST['img'] as $key => $value){
                            if(count($_POST['img']) == $dem){
                                $temp .= $value;
                            }else{
                                $temp .= $value.',';
                            }
                            $dem ++;
                        }
                    }
                //echo $temp;die;
                //multi ảnh
                $groupImg = "";
                $Imggroup = "";
                $dem = 0;
                if(count($this->request->data['Product']['files'] > 0)){
                    $count = count($this->request->data['Product']['files']);
                    foreach($this->request->data['Product']['files'] as $key=>$value){
                        //echo $value['name'].'----';
                        if(isset($value['name'])){
                            $this->Upload->w = $this->img_width;
                            $this->Upload->h = $this->img_height;
                            if(isset($this->request->data['Product']['name'])) $this->Upload->name = $this->request->data['Product']['name'].$key;
                            $this->Upload->new = $this->request->data['Product']['files'][$key];
                            //if($logoin){
                            //    $this->Upload->watermark = ROOT.DS.'app'.DS.'webroot'.DS.'img'.DS.$logoin['Extention']['images'];
                            //}
                            
                            $this->request->data['Product']['files'][$key] = $this->Upload->Process();
                            $img = $this->request->data['Product']['files'][$key];
                        }
                        if($dem == ($count - 1)){
                            $groupImg .= $img;
                        }else{
                            $groupImg .= $img . ",";
                        }
                    $dem ++;
                    }//end for
                }//end if
                if($groupImg){
                    $Imggroup = $temp.','.$groupImg;
                }else{
                    $Imggroup = $temp;
                }
                //echo $Imggroup;die;
                $this->request->data['Product']['multiple'] = $Imggroup;

                //luu mau, size
                if(isset($this->request->data['size'])){
                    $tmp = '';
                    foreach($this->request->data['size'] as $key=>$value){
                        $tmp .= $value.',';
                    }
                    $this->request->data['Product']['size'] = substr($tmp, 0, -1);
                }

                if(isset($this->request->data['color'])){
                    $tmp = '';
                    foreach($this->request->data['color'] as $key=>$value){
                        $tmp .= $value.',';
                    }
                    $this->request->data['Product']['mausac'] = substr($tmp, 0, -1);
                }

//                $this->request->data['Product']['id'] = null;
                $this->request->data['Product']['type'] = $this->type;
                $this->request->data['Product']['user_id_edit'] = $_SESSION['id'];
                $this->Product->save($this->request->data);
                if(isset($this->notice['edit_success'])) $this->Session->setFlash($this->notice['edit_success'], 'default', array('class' => 'notification success png_bg'));
                
                $bak_after_save = $this->Session->read('back_after_save');
                if(!empty($bak_after_save)) $this->redirect($bak_after_save);
                else $this->redirect(array('action' => 'index'));
            } else {
                if(isset($this->notice['edit_failed'])) $this->Session->setFlash($this->notice['edit_failed'], 'default', array('class' => 'notification error png_bg'));
            }
            

        }
        else{
            $this->request->data = $this->Product->findById($id);
            if (empty($this->request->data)){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            
        }

        $this->loadModel("Catproduct");
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
        $detailNews = $this->Product->findById($id);
        $this->set('edit', $detailNews);
        
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
        //chọn loại
        $list_cat_loai = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=> 'footer'
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat_loai'));
    }
    
    public function copy($id = null) {
        if (!empty($this->request->data)) {
            
            $this->Product->set($this->request->data);
            if ($this->Product->validates()) {
                
                if(isset($this->request->data['Product']['images'])){
                    if ($this->request->data['Product']['images']['name']!='') {
    
                        $this->Upload->w = $this->img_width;
                        $this->Upload->h = $this->img_height;
                        if(isset($this->request->data['Product']['name'])) $this->Upload->name = $this->request->data['Product']['name'];
                        $this->Upload->new = $this->request->data['Product']['images'];
                        $this->request->data['Product']['images'] = $this->Upload->Process();
                    }
                    else {
                        $this->Upload->copy = $this->request->data['Product']['images_old'];
                        if(isset($this->request->data['Product']['name'])) $this->Upload->name = $this->request->data['Product']['name'];
                        $this->request->data['Product']['images'] = $this->Upload->process();
                    }
                }
                
                $this->request->data['Product']['type'] = $this->type;
                $this->request->data['Product']['user_id'] = $_SESSION['id'];
                $this->Product->save($this->request->data);
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
            $this->request->data = $this->Product->findById($id);
            if (empty($this->request->data)){
                if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            $this->request->data['Product']['images_old'] = $this->request->data['Product']['images'];
            
            $order = $this->Product->find('first',array('conditions'=>array('Product.type' => $this->type, 'Product.id' => $id),'order' => array('Product.order' => 'DESC')));
            if(isset($order['Product']['order'])){ $this->request->data['Product']['order'] = $order['Product']['order'] + 1;}else{$this->request->data['Product']['order'] = 0;}
            
            

        }

        $this->loadModel("Catproduct");
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
        $detailNews = $this->Product->findById($id);
        $this->set('edit', $detailNews);
        
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
        //chọn loại
        $list_cat_loai = $this->Catproduct->treelist(
            array(
                'conditions' => array(
                    'Catproduct.parent_id' => null,
                    'Catproduct.type'=> 'footer'
                ),
                'order' => array('Catproduct.order'=>'DESC', 'Catproduct.id'=>'DESC'),
            ),
            ' -- '
        );
        
        $this->set(compact('list_cat_loai'));
    }
        
    public function delete($id = null) {
        $delete = $this->Product->findById($id);
        if (!$delete) {
            if(isset($this->notice['not_exist'])) $this->Session->setFlash($this->notice['not_exist'], 'default', array('class' => 'notification error png_bg'));
            $this->cancel();
        }
        else{
            $this->Upload->delete = $delete['Product']['images'];
            $this->Upload->Process();
            
            $this->Product->delete($id);
            if(isset($this->notice['delete_success'])) $this->Session->setFlash($this->notice['delete_success'], 'default', array('class' => 'notification success png_bg'));
            $this->cancel();
        }
    }

    public function close($id = null, $j = null) {
        $this->Product->id = $id;
        if($j){
            $this->Product->saveField($j, 0);
        }else{
            $this->Product->saveField('status', 0);
        }
        if(isset($this->notice['close'])) $this->Session->setFlash($this->notice['close'], 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }

    public function active($id = null, $j = null) {
        $this->Product->id = $id;
        if($j){
            $this->Product->saveField($j, 1);
        }else{
            $this->Product->saveField('status', 1);
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
                'Product.type' => $this->type,
                'Product.name like' => '%'.$search_keyword.'%',
                'Product.cat_id'    => $this->multiMenuProduct($search_cat),
            ),
            'order' => array('Product.order'=>'DESC', 'Product.id'=>'DESC'),
            'limit' => '20'
        );
        
        $this->set('view', $this->paginate('Product'));

        // Load model
        //$list_cat = $this->Catproduct->generateTreeList(null, null, null, ' - ');
        
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
        
        $this->render('index');
    }
}