<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
 
    Router::connect('/', array('controller' => 'Home', 'action' => 'index'));
    //Router::connect('/page/*', array('controller' => 'Home', 'action' => 'index'));
    Router::connect('/load-sp-ajax/*', array('controller' => 'Home', 'action' => 'index_ajax'));

    //thanh vien
    Router::connect('/dang-nhap', array('controller' => 'User', 'action' => 'login'));
    Router::connect('/dang-ky', array('controller' => 'User', 'action' => 'register'));
    Router::connect('/logout', array('controller' => 'User', 'action' => 'logout'));
    Router::connect('/thong-tin-tai-khoan', array('controller' => 'User', 'action' => 'info'));
    Router::connect('/doi-mat-khau/*', array('controller' => 'User', 'action' => 'doipas'));
    Router::connect('/quen-mat-khau', array('controller' => 'User', 'action' => 'quenmatkhau'));
    
    Router::connect('/trang-chu', array('controller' => 'Home', 'action' => 'index'));
    Router::connect('/err-page', array('controller' => 'Errpage', 'action' => 'thongbao'));
    Router::connect('/lien-he', array('controller' => 'Product', 'action' => 'lienhe', 7));
    Router::connect('/dat-hang', array('controller' => 'Contact', 'action' => 'dathang'));
    Router::connect('/contact/*', array('controller' => 'Contact', 'action' => 'send'));
    Router::connect('/dang-ky-ung-tuyen', array('controller' => 'Contact', 'action' => 'dangkyungvien'));
    Router::connect('/dang-ky-kham', array('controller' => 'Contact', 'action' => 'dangkykham'));
    Router::connect('/dang-ky/*', array('controller' => 'Contact', 'action' => 'dangky'));
    Router::connect('/tim-kiem', array('controller' => 'Product', 'action' => 'timkiem'));
    Router::connect('/tim-kiem/*', array('controller' => 'Product', 'action' => 'timkiem'));
    
    Router::connect('/register-email', array('controller' => 'Emaildk', 'action' => 'dk'));
    Router::connect('/dat-cau-hoi', array('controller' => 'Product', 'action' => 'datcauhoi'));
    
    Router::connect('/mua-hang/*', array('controller' => 'Product', 'action' => 'addshopingcart'));
    Router::connect('/hien-gio-hang-cua-mat-hang.html', array('controller' => 'Product', 'action' => 'viewshopingcart'));
    Router::connect('/lien-he-mua-hang', array('controller' => 'Product', 'action' => 'buy'));
    Router::connect('/productdelete/*', array('controller' => 'Product', 'action' => 'deleteshopingcart'));
    Router::connect('/productupdate/*', array('controller' => 'Product', 'action' => 'updateshopingcart'));
    
    
    
    //Router::connect('/khuyen-mai', array('controller' => 'Product', 'action' => 'spouter', 'khuyenmai'));
    //Router::connect('/tat-ca-san-pham', array('controller' => 'Product', 'action' => 'spouter', 'allsp'));
    //Router::connect('/san-pham-moi', array('controller' => 'Product', 'action' => 'spouter', 'spmoi'));
    
    Router::connect('/hang/*', array('controller' => 'Product', 'action' => 'hang'));
    Router::connect('/:alias.html', array('controller' => 'Product', 'action' => 'detailnew'), array('pass' => array('id', 'alias')));
    Router::connect('/page/*', array('controller' => 'Product', 'action' => 'detail'));
    Router::connect('/:alias.htm', array('controller' => 'Product', 'action' => 'detailnew'), array('pass' => array('id', 'alias')));
    Router::connect('/:alias', array('controller' => 'Product', 'action' => 'index'), array('pass' => array('id', 'alias')));
    Router::connect('/*', array('controller' => 'Product', 'action' => 'index'));
    
    
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
