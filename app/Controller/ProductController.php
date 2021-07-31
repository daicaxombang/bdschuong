<?php

/**

 * Description of NewsController

 * @author : Yeu tinh

 * @since Oct 19, 2012

 */

class ProductController extends AppController {

    public $name = 'Product';
    public $uses = array('Catproduct', 'Post', 'Product');

    public function beforeFilter() {
        parent::beforeFilter();
        //echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language="javascript"> alert("Website đang trong quá trình nâng cấp, mời bạn quay trở lại sau !"); window.location.replace("'.DOMAIN.'"); </script>';
        //$this->layout = 'extent';
    }

    public function index($id = null){
        if(empty($id)) $this->redirect(DOMAIN.'err-page');
        $detailNews = $this->Catproduct->findByLink($id);
        if(empty($detailNews)) $this->redirect(DOMAIN.'err-page');

        //set title, keyword, desciption
        $this->set_title_key_meta($detailNews['Catproduct']);
        
        //set limmit
        //$limit  = 10;
        if($detailNews['Catproduct']['type'] == 'product') $limit  = 12;
        //set bang nao
        $table = 'Product';
        if($detailNews['Catproduct']['type'] == 'product') $table = 'Product';
        if(in_array($detailNews['Catproduct']['type'], array('new', 'newtwo'))) $table = 'Post';
        
        $mnId = $this->multiMenuProduct($detailNews['Catproduct']['id'], null);
        $mnId[$detailNews['Catproduct']['id']] = $detailNews['Catproduct']['id'];
        
        $this->set('cat', $detailNews);
        
        if($detailNews['Catproduct']['type'] == 'product'){
            //$this->layout = 'sanpham';
            //sap xep
            $order = 'order';
            if(count($mnId) > 1) $order = 'price';
            $this->paginate = array(
                'conditions'=>array(
                    $table.'.status'=>1,
                    $table.'.cat_id'=>$mnId
                ),
                    'limit' => $limit,
                    //'order' => $table.'.'.$order.' DESC'
                    'order' => array($table.'.order DESC', $table.'.price DESC'),
                );
                
    	    $this->set('listnews', $this->paginate($table,array()));            
            $this->render('list');    
        }

        if(in_array($detailNews['Catproduct']['type'], array('new', 'newtwo'))){
            //$this->layout = 'extent';
            $this->paginate = array(
                'conditions'=>array(
                    $table.'.status'=>1,
                    $table.'.cat_id'=>$mnId
                ),
                    'limit' => 5,
                    'order' => $table.'.id DESC'
                );
            $listnews = $this->paginate($table,array());
            if(count($listnews) == 1) $this->redirect(DOMAIN.$listnews[0][$table]['link'].'.htm');

            //$this->layout = 'news';
    	    $this->set('listnews', $listnews);            
            $this->render('/Post/listnews');
        }

        if(in_array($detailNews['Catproduct']['type'], array('hoidap'))){
            $this->paginate = array(
                'conditions'=>array(
                    $table.'.status'=>1,
                    $table.'.cat_id'=>$mnId
                ),
                    'limit' => 6,
                    'order' => $table.'.id DESC'
                );
                
            $this->set('listnews', $this->paginate($table,array()));            
            $this->render('/Post/list_hoidap');
        }

    }

    public function datcauhoi(){
        $this->autoLayout = false;
        $this->autoRender = false;
        if($this->request->is('post')){
            $data = array();
            $data['Post'] = $this->request->data;
            $data['Post']['type'] = 'hoidap';
            $data['Post']['cat_id'] = '23';
            $data['Post']['status'] = '0';

            $this->Session->write('name_datcauhoi', $data['Post']['name']);
            $this->Session->write('email_datcauhoi', $data['Post']['email']);
            $this->Session->write('phone_datcauhoi', $data['Post']['phone']);

            if(!isset($_POST['captcha'])){
                $this->Session->setFlash('Captcha not exits', 'default', array('class' => 'alert alert-error'));
                $this->redirect($this->referer());
            }
            if($_POST['captcha'] != $this->Session->read('captcha')){
                $this->Session->setFlash('Captcha not exits', 'default', array('class' => 'alert alert-error'));
                $this->redirect($this->referer());
            }else{
                $this->Post->save($data['Post']);
                $this->Session->setFlash('Thành công', 'default', array('class' => 'alert alert-success'));
                $this->redirect($this->referer());
            }
        }
    }
    
    public function timkiem(){
        //$this->layout = 'sanpham';
        if(isset($_POST['tukhoa'])){
            $this->Session->write('tukhoa', $_POST['tukhoa']);
            $tukhoa = $_POST['tukhoa'];
        }else{
            $tukhoa = $this->Session->read('tukhoa');
        }
        
        $cnn = array();
        
        if(!empty($tukhoa)){
            /*$cnn['OR'] = array(
                'Product.name LIKE' => '%'.$tukhoa.'%',
                'Product.code LIKE' => '%'.$tukhoa.'%'
            );*/
            $cnn['Post.name LIKE'] = '%'.$tukhoa.'%';
        }
        
        $cnn['Post.status'] = 1;
        //$cnn['Product.type'] = 'newtwo';
        
        $limit  = 20;
        $table = 'Post';
        $this->paginate = array(
            'conditions' => $cnn,
                'limit' => $limit,
                'order' => $table.'.id DESC'
        );
            
	    $this->set('listnews', $this->paginate($table,array()));
        
        $this->set('title_for_layout', 'Tìm kiếm');
        //$this->render('list');
        $this->render('/Post/listnews');
    }
    
    public function hang($id = null){
        if(empty($id)) $this->redirect(DOMAIN.'err-page');
        $this->loadModel('Hang');
        $detailNews = $this->Hang->findByLink($id);
        if(empty($detailNews)) $this->redirect(DOMAIN.'err-page');

        //set title, keyword, desciption
        $this->set_title_key_meta($detailNews['Hang']);
        
        //set limmit
        $limit  = 40;
        //set bang nao
        $table = 'Product';
        
        $this->paginate = array(
            'conditions'=>array(
                $table.'.status'=>1,
                $table.'.hang_id'=>$detailNews['Hang']['id']
            ),
                'limit' => $limit,
                'order' => $table.'.order DESC'
            );
            
	    $this->set('listnews', $this->paginate($table,array()));
        $this->set('cat', $detailNews);
        $this->render('list'); 
    }
        
    public function detail($id = null) {
        $this->set('detail_asd', '321');
        if(empty($id)) $this->redirect(DOMAIN.'err-page');
        $detailNews = $this->Product->findByLink($id);
        if(empty($detailNews)) $this->redirect(DOMAIN.'err-page');
        
        //set luot xem
        if(!$this->Session->check('id_view'.$detailNews['Product']['id'])){
            $this->Product->id = $detailNews['Product']['id'];
            $this->Product->saveField('view', ($detailNews['Product']['view'] + 1));
        }
        $this->Session->write('id_view'.$detailNews['Product']['id'], $detailNews['Product']['id']);
        
        $this->set('detailNews', $detailNews);
        if(!empty($detailNews['Product']['cat_id'])){
            $cat_parent = $this->Catproduct->findById($detailNews['Catproduct']['parent_id']);
            $this->set('cat_parent', $cat_parent);
        }

        //size
        $this->loadModel('Exttmp');
        $tmp = array();
        foreach(explode(',', $detailNews['Product']['size']) as $value){
            $tmp[$value] = $value;
        }
        $list_size = $this->Exttmp->find('all', array(
            'conditions' => array(
                'Exttmp.type' => 'size',
                'Exttmp.status' => 1,
                'Exttmp.id' => $tmp
            ),
            'order' => array('Exttmp.order'=>'DESC', 'Exttmp.id'=>'DESC')
        ));
        $this->set('list_size', $list_size);

        //color
        $tmp = array();
        foreach(explode(',', $detailNews['Product']['mausac']) as $value){
            $tmp[$value] = $value;
        }
        $list_color = $this->Exttmp->find('all', array(
            'conditions' => array(
                'Exttmp.type' => 'color',
                'Exttmp.status' => 1,
                'Exttmp.id' => $tmp
            ),
            'order' => array('Exttmp.order'=>'DESC', 'Exttmp.id'=>'DESC')
        ));
        $this->set('list_color', $list_color);

        //set limmit
        $limit  = 12;

		$this->paginate = array(
            'conditions'=>array(
                'Product.status'=>1, 
                'Product.id <>' => $detailNews['Product']['id'],
                'Product.cat_id'=>$detailNews['Product']['cat_id']
            ),
                'order' => 'Product.order DESC','limit' => $limit
        );
        $this->set('tinlienquan', $this->paginate('Product', array()));	

        //set title, keyword, desciption
        $this->set_title_key_meta($detailNews['Product']);
    }

    public function detailnew($id = null){
        //$this->layout = 'extent';
        if(empty($id)) $this->redirect(DOMAIN.'err-page');
        $detailNews = $this->Post->findByLink($id);
        if(empty($detailNews)) $this->redirect(DOMAIN.'err-page');
        
        //set luot xem
        if(!$this->Session->check('id_view'.$detailNews['Post']['id'])){
            $this->Post->id = $detailNews['Post']['id'];
            $this->Post->saveField('view', ($detailNews['Post']['view'] + 1));
        }
        $this->Session->write('id_view'.$detailNews['Post']['id'], $detailNews['Post']['id']);
        
        $this->set('detailNews', $detailNews);

        //set limmit
        $limit  = 10;

		$tinlienquan = $this->Post->find('all', array(
            'conditions'=>array(
                'Post.status'=>1, 
                'Post.id <>' => $detailNews['Post']['id'],
                'Post.cat_id'=>$detailNews['Post']['cat_id']
            ),
                'order' => 'Post.order DESC','limit' => $limit
        ));
	    $this->set('tinlq', $tinlienquan);	
        
        $tinmoiup = $this->Post->find('all', array(
            'conditions'=>array(
                'Post.status'=>1,
            ),
                'order' => 'Post.id DESC',
                'limit' => $limit
        ));
	    $this->set('tinmoiup', $tinmoiup);	

        //set title, keyword, desciption
        $this->set_title_key_meta($detailNews['Post']);

        $this->render('/Post/detailnew');
    }
    
    public function lienhe($id = null){
        $this->layout = "extent";
        $abc = $this->Catproduct->findById($id);
        $this->set('cat', $abc);
        $this->set('title_for_layout', $abc['Catproduct']['name']);
        $setting = $this->Setting->find('first');
        $this->set('keywords_for_layout', $setting['Setting']['meta_key']);
        $this->set('description_for_layout', $setting['Setting']['meta_des']);
    }
    
    public function addshopingcart($id=null){
        $this->layout = false;
        $product=$this->Product->read(null,$id);	
        if(!isset($_SESSION['shopingcart']))
            $_SESSION['shopingcart']=array();
            if(isset($_SESSION['shopingcart'])){   
                $shopingcart=$_SESSION['shopingcart'];
                if(isset($shopingcart[$id])){
                    if(isset($_POST['soluong'])) $shopingcart[$id]['sl'] = $_POST['soluong']; else $shopingcart[$id]['sl'] = 1;
                    $shopingcart[$id]['total']=$shopingcart[$id]['price']*$shopingcart[$id]['sl'];			
                    $_SESSION['shopingcart']=$shopingcart;
                    echo '<script language="javascript"> window.location.replace("'.DOMAIN.'hien-gio-hang-cua-mat-hang.html"); </script>';exit; // co the thay DOMAIN bang url ban muon chay toi
                }else{		
                    //viet nam	  
                    $shopingcart[$id]['name']=$product['Product']['name'];
                    $shopingcart[$id]['id']=$product['Product']['id'];		
                    $shopingcart[$id]['images']=DOMAIN.'img/w80/'.$product['Product']['images'];
                    if(isset($_POST['soluong'])) $shopingcart[$id]['sl'] = $_POST['soluong']; else $shopingcart[$id]['sl'] = 1;
                    $shopingcart[$id]['price']=$product['Product']['price'];
                    $shopingcart[$id]['content']=$product['Product']['content'];
                    $shopingcart[$id]['total'] = $shopingcart[$id]['price']*$shopingcart[$id]['sl'];

                    if(isset($_POST['size'])) $shopingcart[$id]['size'] = $_POST['size']; else $shopingcart[$id]['size'] = '';
                    if(isset($_POST['color'])) $shopingcart[$id]['color'] = $_POST['color']; else $shopingcart[$id]['color'] = '';

                    $_SESSION['shopingcart']=$shopingcart;
                    $this->set(compact('shopingcart'));
                    echo '<script language="javascript"> window.location.replace("'.DOMAIN.'lien-he-mua-hang"); </script>';exit;
                }
            }	
    } 
    public function viewshopingcart(){
        $this->set('title_for_layout', 'Giỏ hàng của bạn');
        $this->set('giohang', 'Giỏ hàng của bạn');
		if(isset($_SESSION['shopingcart']))
		 {   
			 $shopingcart=$_SESSION['shopingcart'];			 
			 $this->set(compact('shopingcart'));
		 }
		 else
		 {
			 echo '<script language="javascript"> alert("Chua co san pham nao trong gio hang"); location.href="'.DOMAIN.'"; </script>';
		 }
	}
    public function deleteshopingcart($id=null){
		if(isset($_SESSION['shopingcart']))
		 {   
			 $shopingcart=$_SESSION['shopingcart'];			 
			  if(isset($shopingcart[$id]))
			  unset($shopingcart[$id]);
			  $_SESSION['shopingcart']=$shopingcart;
			  $this->redirect($this->referer());
		 }
		
	}
	public function updateshopingcart($id=null){
		
		if(isset($_SESSION['shopingcart']))
		 {   
			 $shopingcart=$_SESSION['shopingcart'];			 
			  if(isset($shopingcart[$id]))
			  {
				  $shopingcart[$id]['sl']=$_POST['soluong'];
				  $shopingcart[$id]['total']=$shopingcart[$id]['sl']*$shopingcart[$id]['price'];
			  }
			  $_SESSION['shopingcart']=$shopingcart;
			 
			  $this->redirect($this->referer());
		 }
	}
    public function buy(){
        $this->set('title_for_layout', 'Giỏ hàng của bạn');
        $this->set('giohang', 'Giỏ hàng của bạn');
        if(isset($_SESSION['shopingcart'])){   
            if(count($_SESSION['shopingcart']) == 0){
                $this->redirect(DOMAIN);
            }
            $shopingcart=$_SESSION['shopingcart'];          
            $this->set(compact('shopingcart'));
        }else{
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language="javascript"> alert("Bạn không có sản phẩm nào trong giỏ hàng !"); location.href="'.DOMAIN.'"; </script>';
            exit;
        }
    }
    
    public function multiParentNull($parentid = null, $trees = NULL) {
        $this->loadModel('Catproduct');
        $parmenu = $this->Catproduct->find('first', array(
            'conditions' => array(
                'Catproduct.id' => $parentid,
                'Catproduct.status' => 1
            ),
            'order' => 'Catproduct.order ASC'
            ));
        if (count($parmenu) > 0) {
            if(empty($parmenu['Catproduct']['parent_id'])){
                $trees = $parmenu['Catproduct']['id'];
            }else{
                $trees = $this->multiParentNull($parmenu['Catproduct']['parent_id']);
            }
        }
        return $trees;
    }

    public function multiMenuProduct($parentid = null, $trees = NULL) {
        $parmenu = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1
            ),
            'order' => 'Catproduct.order ASC'
            ));
        if (count($parmenu) > 0) {
            foreach ($parmenu as $field) {
                $trees[$field['Catproduct']['id']] = $field['Catproduct']['id'];
                $trees = $this->multiMenuProduct($field['Catproduct']['id'], $trees);
            }
        }
        return $trees;
    }
}

