<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


App::uses('Controller', 'Controller');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $ext = '.php';

    public function beforeFilter()
    {

        parent::beforeFilter();

        $this->Session->write('lang', '');

        if ($this->Session->check('user_app')) {
            $this->set('price_sp', 'price2');
            $this->set('text_price_sp', 'Giá sỉ');
        } else {
            $this->set('price_sp', 'price');
            $this->set('text_price_sp', 'Giá');
        }

        //set menu
        $app_menu = $this->multiMenu(null, null);
        $this->set('app_menu', $app_menu);

//        $app_menu_new = $this->multiMenuNew(null, null);
//        $this->set('app_menu_new', $app_menu_new);
//
//        //set menu
//        $app_menu_left = $this->multiMenuLeft(3, null);
//        $this->set('app_menu_left', $app_menu_left);

        $this->loadModel('Slideshow');
        $this->loadModel('Catproduct');
        $this->loadModel('Product');
        $this->loadModel('Extention');
        $this->loadModel('Support');
        $this->loadModel('Post');

        //load sp xem nhieu
//        $this->loadModel('Product');
//        $list_spxemnhieu = $this->Product->find('all', array(
//            'conditions' => array(
//                'Product.status' => 1,
//                'Product.type' => 'product'
//            ),
//            'fields' => array('id', 'name', 'link', 'images', 'price', 'shortdes', 'price2'),
//            'order' => array('Product.view' => 'DESC'),
//            'limit' => '5'
//        ));
//        $this->set('list_spxemnhieu', $list_spxemnhieu);
//
//        //load support
//        $hotrotructuyen = $this->Support->find('all', array(
//            'conditions' => array(
//                'Support.status' => 1,
//            ),
//            'order' => 'Support.id ASC',
//        ));
//        $this->set('hotrotructuyen', $hotrotructuyen);
//
//        //load danh muc
//        $danhmucintro = $this->Catproduct->find('all', array(
//            'conditions' => array(
//                'Catproduct.status' => 1,
//                'Catproduct.parent_id' => 20,
//            ),
//            'order' => 'Catproduct.order ASC',
//            'limit' => 4
//        ));
//        $this->set('danhmucintro', $danhmucintro);

        //load danh muc 
        $danhmuc = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.status' => 1,
                'Catproduct.parent_id' => null,
            ),
            'order' => 'Catproduct.order ASC',
        ));
        $this->set('danhmuc', $danhmuc);

        //load mn ft
        $list_mn_ft = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.status' => 1,
                'Catproduct.dang1' => 1,
            ),
            'fields' => array('id', 'name', 'link'),
            'order' => array('Catproduct.order' => 'ASC'),
            'limit' => 2
        ));
        $list_mn = array();
        foreach ($list_mn_ft as $value) {
            //load new
            $list = $this->Catproduct->find('all', array(
                'conditions' => array(
                    'Catproduct.status' => 1,
                    'Catproduct.parent_id' => $value['Catproduct']['id'],
                ),
                'fields' => array('id', 'name', 'link'),
                'order' => array('Catproduct.order' => 'ASC'),
                //'limit' => 2
            ));

            //gop ten cha + noi dung
            $list_mn[] = array(
                'id' => $value['Catproduct']['id'],
                'name' => $value['Catproduct']['name'],
                'link' => $value['Catproduct']['link'],
                'list' => $list,
            );
        }
        $this->set('list_mn', $list_mn);

        //load banner, logo
        $banner = $this->Extention->find('first', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.type' => 'banner'
            ),
        ));
        $this->set('banner', $banner);

        $listcatcn = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.status' => 1,
                'Catproduct.id' => 7,
            ),
            'fields' => array('id', 'name', 'link'),
            'order' => array('Catproduct.order' => 'ASC')
        ));
        $listincn = array();
        foreach ($listcatcn as $value) {
            //load new
            $cat_id = $this->multiMenuProduct($value['Catproduct']['id'], null);
            $cat_id[$value['Catproduct']['id']] = $value['Catproduct']['id'];
            $table = 'Post';
            $list = $this->$table->find('all', array(
                'conditions' => array(
                    $table . '.status' => 1,
//                    $table . '.choose1' => 1,
                    $table . '.cat_id' => $cat_id
                ),
                'order' => array($table . '.order' => 'DESC'),
                'limit' => 20
            ));

            //gop ten cha + noi dung
            $listincn[] = array(
                'id' => $value['Catproduct']['id'],
                'name' => $value['Catproduct']['name'],
                'link' => $value['Catproduct']['link'],
                'list' => $list,
            );
        }
        $this->set('listincn', $listincn);

        /*$chaytrai = $this->Extention->find('first', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.type' => 'advone'
            ),
        ));
        $this->set('chaytrai', $chaytrai);

        $chayphai = $this->Extention->find('first', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.type' => 'advtwo'
            ),
        ));
        $this->set('chayphai', $chayphai);*/

        //load doi tac
        /*$doitac = $this->Extention->find('all', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.type' => 'rightone'
            ),
        ));
        $this->set('doitac', $doitac);*/

        //load doi tac
        $quangcaophai = $this->Extention->find('all', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.type' => 'advright'
            ),
        ));
        $this->set('quangcaophai', $quangcaophai);

        //load doi tac
        $hotline = $this->Extention->find('all', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.type' => 'rightone'
            ),
            'limit' => 1
        ));
        $this->set('hotline', $hotline);

        //slide
        $slideshow = $this->Slideshow->find('all', array(
            'conditions' => array(
                'Slideshow.status' => 1,
            ),
            'order' => 'Slideshow.order DESC'
        ));
        $this->set('slideshow', $slideshow);

        //set gia tri setting website
        $this->loadModel('Setting');
        $setting = $this->Setting->find('first');
        if ($setting != null) {
            $this->set('title_for_layout', $setting['Setting']['title']);
            $this->set('keywords_for_layout', $setting['Setting']['meta_key']);
            $this->set('description_for_layout', $setting['Setting']['meta_des']);
            $this->set('setting', $setting['Setting']);
        }
    }

    public function set_title_key_meta($arr = array())
    {
        if (!empty($arr['title_seo'])) $this->set('title_for_layout', $arr['title_seo']); else $this->set('title_for_layout', $arr['name']);
        if ($arr['meta_key']) $this->set('keywords_for_layout', $arr['meta_key']);
        if ($arr['meta_des']) $this->set('description_for_layout', $arr['meta_des']);
    }

    public function multiMenu($parentid = null, $trees = NULL)
    {
        $this->loadModel('Catproduct');
        if (empty($parentid)) {
            $parmenu = $this->Catproduct->find('all', array(
                'fields' => array('id', 'name', 'link', 'images'),
                'conditions' => array(
                    'Catproduct.parent_id' => $parentid,
                    'Catproduct.status' => 1,
                    'Catproduct.dang1' => 0,
                    'Catproduct.id <>' => 7,
//                'Catproduct.type' => array('new', ''),
                ),
                'order' => 'Catproduct.order DESC'
            ));
        } else {
            $parmenu = $this->Catproduct->find('all', array(
                'fields' => array('id', 'name', 'link', 'images'),
                'conditions' => array(
                    'Catproduct.parent_id' => $parentid,
                    'Catproduct.status' => 1,
                    'Catproduct.dang1' => 0,
//                'Catproduct.type' => array('new', ''),
                ),
                'order' => 'Catproduct.order ASC'
            ));
        }

        if (count($parmenu) > 0) {
            $trees .= '<ul>';
            foreach ($parmenu as $field) {
                if ($parentid != null) {
                    $trees .= '<li><a href="' . DOMAIN . $field['Catproduct']['link'] . '" title="' . $field['Catproduct']['name'] . '">' . $field['Catproduct']['name' . $this->Session->read('lang')] . '</a>';
                    $trees = $this->multiMenu($field['Catproduct']['id'], $trees);
                    $trees .= '</li>';
                } else {
                    if ($field['Catproduct']['id'] == 1) {
                        $trees .= '<li><a href="' . DOMAIN . '" title="' . $field['Catproduct']['name'] . '">' . $field['Catproduct']['name' . $this->Session->read('lang')] . '</a>';
                    } else {
                        //$mn_child = $this->Catproduct->findByParent_id($field['Catproduct']['id']);
                        $i = null;
                        //if(!empty($mn_child)) $i = '<i class="fa fa-caret-down"></i>';
//                    $img = '<img src="' . DOMAIN . 'img/w39/h30/' . $field['Catproduct']['images'] . '" /><br/>';
                        $trees .= '<li><a class="parent1" href="' . DOMAIN . $field['Catproduct']['link'] . '" title="' . $field['Catproduct']['name'] . '">' . $field['Catproduct']['name' . $this->Session->read('lang')] . $i . '</a>';
                    }
                    $trees = $this->multiMenu($field['Catproduct']['id'], $trees);
                    $trees .= '</li>';
                }
            }
            $trees .= '</ul>';
        }
        return $trees;
    }

    public
    function multiMenuNew($parentid = null, $trees = NULL)
    {
        $this->loadModel('Catproduct');
        $parmenu = $this->Catproduct->find('all', array(
            'fields' => array('id', 'name', 'link', 'images'),
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1,
                'Catproduct.dang1' => 0,
                'Catproduct.type' => array('product'),
            ),
            'order' => 'Catproduct.order ASC'
        ));
        if (count($parmenu) > 0) {
            $trees .= '<ul>';
            foreach ($parmenu as $field) {
                if ($parentid != null) {
                    $trees .= '<li><a href="' . DOMAIN . $field['Catproduct']['link'] . '" title="' . $field['Catproduct']['name'] . '">' . $field['Catproduct']['name' . $this->Session->read('lang')] . '</a>';
                    $trees = $this->multiMenuNew($field['Catproduct']['id'], $trees);
                    $trees .= '</li>';
                } else {
                    $active = '';
                    if ($this->Session->check('active_menu')) {
                        if ($field['Catproduct']['id'] == $this->Session->read('active_menu')) $active = 'class="active_menu"';
                    }

                    //if ($field['Catproduct']['id'] == 1) {
                    //    $trees .= '<li ' . $active . '><a class="parent1" href="' . DOMAIN . '" title="' . $field['Catproduct']['name'] . '">' . $field['Catproduct']['name' . $this->Session->read('lang')] . '</a>';
                    //} else {
                    $img = DOMAIN . 'img/w22/h20/' . $field['Catproduct']['images'];
                    $trees .= '<li ' . $active . ' style="background: url(' . $img . ') no-repeat top 10px left 15px;"><a class="parent1" href="' . DOMAIN . $field['Catproduct']['link'] . '" title="' . $field['Catproduct']['name'] . '">' . $field['Catproduct']['name' . $this->Session->read('lang')] . '</a>';
                    //}
                    $trees = $this->multiMenuNew($field['Catproduct']['id'], $trees);
                    $trees .= '</li>';
                }
            }
            $trees .= '</ul>';
        }
        return $trees;
    }

    public
    function multiMenuLeft($parentid = 3, $trees = NULL)
    {
        $this->loadModel('Catproduct');
        if (!$parentid) $parentid = 3;
        $parmenu = $this->Catproduct->find('all', array(
            'fields' => array('id', 'name', 'link', 'images'),
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1,
            ),
            'order' => 'Catproduct.order ASC'
        ));
        if (count($parmenu) > 0) {
            $trees .= '<ul>';
            foreach ($parmenu as $field) {
                if ($parentid != null) {
                    $trees .= '<li><a href="' . DOMAIN . $field['Catproduct']['link'] . '" title="' . $field['Catproduct']['name'] . '">' . $field['Catproduct']['name' . $this->Session->read('lang')] . '</a>';
                    $trees = $this->multiMenuLeft($field['Catproduct']['id'], $trees);
                    $trees .= '</li>';
                } else {
                    $trees .= '<li><a class="parent1" href="' . DOMAIN . $field['Catproduct']['link'] . '" title="' . $field['Catproduct']['name'] . '">' . $field['Catproduct']['name' . $this->Session->read('lang')] . '</a>';
                    $trees = $this->multiMenuLeft($field['Catproduct']['id'], $trees);
                    $trees .= '</li>';
                }
            }
            $trees .= '</ul>';
        }
        return $trees;
    }

    public
    function multiMenuFooter($parentid = null, $trees = NULL)
    {
        $this->loadModel('Catproduct');
        $parmenu = $this->Catproduct->find('all', array(
            'fields' => array('id', 'name', 'link', 'images'),
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1,
                'Catproduct.dang1' => 0,
            ),
            'order' => 'Catproduct.order ASC'
        ));
        if (count($parmenu) > 0) {
            $trees .= '<ul>';
            foreach ($parmenu as $field) {
                if ($parentid != null) {
                    $trees .= '<li><a href="' . DOMAIN . $field['Catproduct']['link'] . '" title="' . $field['Catproduct']['name'] . '"><i class="fa fa-angle-right"></i><h4>' . $field['Catproduct']['name' . $this->Session->read('lang')] . '</h4></a>';
                    $trees = $this->multiMenuFooter($field['Catproduct']['id'], $trees);
                    $trees .= '</li>';
                } else {
                    $trees .= '<li><a class="parent1" href="' . DOMAIN . $field['Catproduct']['link'] . '" title="' . $field['Catproduct']['name'] . '"><h4>' . $field['Catproduct']['name' . $this->Session->read('lang')] . '</h4></a>';
                    $trees = $this->multiMenuFooter($field['Catproduct']['id'], $trees);
                    $trees .= '</li>';
                }
            }
            $trees .= '</ul>';
        }
        return $trees;
    }

    public
    function multiParentNull($parentid = null, $trees = NULL)
    {
        $this->loadModel('Catproduct');
        $parmenu = $this->Catproduct->find('first', array(
            'conditions' => array(
                'Catproduct.id' => $parentid,
                'Catproduct.status' => 1
            ),
            'order' => 'Catproduct.order ASC'
        ));
        if (count($parmenu) > 0) {
            if (empty($parmenu['Catproduct']['parent_id'])) {
                $trees = $parmenu['Catproduct']['id'];
            } else {
                $trees = $this->multiParentNull($parmenu['Catproduct']['parent_id']);
            }
        }
        return $trees;
    }

    public
    function multiMenuProduct($parentid = null, $trees = NULL)
    {
        $this->loadModel('Catproduct');
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

