<?php

/**
 * Description of NewsController
 * @author : Yeu tinh
 * @since Oct 19, 2012
 */
class CommentController extends AppController {

    public $name = 'Comment';
    public $uses = array('Catalogue', 'Post', 'Slideshow', 'Support', 'Extention', 'Setting', 'Catproduct', 'Product');
    
    function banner(){
		return $this->Extention->find('first',array('conditions'=>array('Extention.status'=>1, 'Extention.type'=> 'banner'),'order'=>'Extention.id DESC'));
	}
    function logofooter(){
		return $this->Extention->find('first',array('conditions'=>array('Extention.status'=>1, 'Extention.type'=> 'logo'),'order'=>'Extention.id DESC'));
	}
    
    // SLide show
    public function slideshow() {
        $slideshow = $this->Slideshow->find('all', array('order' => 'Slideshow.order ASC'));
        return $slideshow;
    }
    public function doitac() {
        $weblink = $this->Extention->find('all', array(
            'conditions' => array(
                'Extention.type' => 'advertisement'
            ),
            'order' => 'Extention.id DESC'
        ));
        return $weblink;
    }
    public function ben1() {
        $weblink = $this->Extention->find('first', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.order' => 0,
                'Extention.type' => 'linkhuuich'
            ),
            'order' => 'Extention.id DESC'
        ));
        return $weblink;
    }
    public function ben2() {
        $weblink = $this->Extention->find('first', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.order' => 1,
                'Extention.type' => 'linkhuuich'
            ),
            'order' => 'Extention.id DESC'
        ));
        return $weblink;
    }
    //sub menu
    public function submenuproduct($parentid = null){
        $parmenu = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1,
                'Catproduct.type <>' => array('dichvu', 'tin')
            ),
            'order' => 'Catproduct.order ASC'
        ));
		return $parmenu;
    }
    public function submenuproductthang($id = null){
		return $this->Catproduct->find('all',array('conditions'=>array('Catproduct.parent_id '=>$id,'Catproduct.status'=>'1' ,'Catproduct.type'=>'dichvu'),'order'=>'Catproduct.order ASC'));
    }
    public function menu($id = null){
		return $this->Catproduct->find('all',array('conditions'=>array('Catproduct.parent_id '=>$id,'Catproduct.status'=>'1' ,'Catproduct.type'=>'product'),'order'=>'Catproduct.order ASC'));
    }
    public function menutin($id = null){
		return $this->Catproduct->find('first',array('conditions'=>array('Catproduct.id '=>$id)));
    }
    public function tintuchome($id = null){
        $menu = $this->multiSp($id);
        $menu[$id] = $id;
		return $this->Product->find('all',array('conditions'=>array('Product.cat_id' => $menu,'Product.status' => '1','Product.type' => 'new','Product.new' => '1'),'order' => 'Product.order DESC', 'limit' => '6'));
    }
    public function multiSp($parentid = null, $trees = NULL) {
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
                $trees = $this->multiSp($field['Catproduct']['id'], $trees);
            }
        }
        return $trees;
    }
    public function spbanchay($id = null){
        $menu = $this->multiSp($id);
        $menu[$id] = $id;
        //pr($menu); die;
		return $this->Product->find('all',array('conditions'=>array('Product.cat_id' => $menu,'Product.status' => '1', 'Product.new' => '1', 'Product.type' => 'product'),'order' => 'Product.order DESC', 'limit' => '30'));
    }
    // Cau hinh website
    public function setting() {
        $setting = $this->Setting->find('first');
        return $setting;
    }
    //Liên kết hữu ích
    public function listExtentionHot($type = null) {
        return $listLinkHuuich = $this->Extention->listExtentionHot($type);
    }
    //Hỗ trợ online 
    public function listSupport($type = null) {
        return $listSupport = $this->Support->listSupport($type);
    }
    //Lấy ra quảng cáo
    public function listAdsHot($type = null) {
        return $listAdsHot = $this->Extention->listAdsHot($type);
    }
    //Lấy ra ảnh đại diện
    public function listImagesHot($type = null) {
        return $listImagesHot = $this->Post->listImagesHot($type);
    }
    //Lấy ra video hot
    public function listVideoHot($type = null) {
        return $listImagesHot = $this->Post->listVideoHot($type);
    }

    public function multiMenuProduct($parentid = null, $trees = NULL) {
        $lang = $this->Session->read('lang');
        $parmenu = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1,
                'Catproduct.type <>' => array('dichvu', 'tin')
            ),
            'order' => 'Catproduct.order ASC'
            ));
        if (count($parmenu) > 0) {
            $trees .='<ul>';
            foreach ($parmenu as $field) {
                if($parentid != null){
                    $trees .= '<li><a href="' . DOMAIN . $field['Catproduct']['url'] . '/' . $field['Catproduct']['link'] .  '.html">' . $field['Catproduct']['name'.$this->Session->read('lang')] . '</a>';
                    $trees = $this->multiMenuProduct($field['Catproduct']['id'], $trees);
                    $trees .='</li>';
                }else{
                    $trees .= '<li><a href="' . DOMAIN . $field['Catproduct']['url'] . '.html">' . $field['Catproduct']['name'.$this->Session->read('lang')] . '</a>';
                    $trees = $this->multiMenuProduct($field['Catproduct']['id'], $trees);
                    $trees .='</li>';
                    }
                }
            $trees .='</ul>';
        }
        return $trees;
    }
    
    public function sanphammau($parentid = 3, $trees = NULL) {
        $lang = $this->Session->read('lang');
        $parmenu = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1,
                'Catproduct.type' => 'product'
            ),
            'order' => 'Catproduct.order ASC'
            ));
        if (count($parmenu) > 0) {
            $trees .='<ul>';
            foreach ($parmenu as $field) {
                if($parentid != null){
                    $trees .= '<li><a href="' . DOMAIN . $field['Catproduct']['url'] . '/' . $field['Catproduct']['link'] .  '.html">' . $field['Catproduct']['name'.$this->Session->read('lang')] . '</a>';
                    $trees = $this->multiMenuProduct($field['Catproduct']['id'], $trees);
                    $trees .='</li>';
                }else{
                    $trees .= '<li><a href="' . DOMAIN . $field['Catproduct']['url'] . '.html">' . $field['Catproduct']['name'.$this->Session->read('lang')] . '</a>';
                    $trees = $this->multiMenuProduct($field['Catproduct']['id'], $trees);
                    $trees .='</li>';
                    }
                }
            $trees .='</ul>';
        }
        return $trees;
    }
}