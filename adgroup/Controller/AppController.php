<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

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
    public $uses = array('Account', 'Permision');
    public $components = array('Upload', 'Session', 'Common');
    public $helpers = array('Common');

    //khởi tạo quyền cơ bản;
    private $Pms = array(
        'accounts/delete',
        'accounts/theme'
    );


    public $notice = array(
        'add_success' => 'Đã thêm!',
        'add_cat' => 'Bạn phải chọn danh mục cha !',
        'add_failed' => 'Vui lòng kiểm tra lại thông tin trước khi thêm!',
        'edit_success' => 'Đã lưu thay đổi!',
        'edit_failed' => 'Vui lòng kiểm tra lại thông tin trước khi lưu!',
        'copy_success' => 'Đã sao chép!',
        'copy_failed' => 'Vui lòng kiểm tra lại thông tin trước khi lưu!',
        'delete_success' => 'Đã xóa!',
        'delete_failed' => 'Không xóa được!',
        'active' => 'Đã kích hoạt!',
        'close' => 'Đã tắt!',
        'not_exist' => 'Không tồn tại!',

        'order' => 'Đã sắp xếp theo thứ tự mới!',
        'price' => 'Đã thay đổi giá!',
        'active_many' => 'Đã kích hoạt các mục được chọn!',
        'colse_many' => 'Đã hủy tắt các mục được chọn!',
        'delete_many' => 'Đã xóa các mục được chọn!',
        'empty_select' => 'Bạn chưa chọn mục nào!',
        'no_permision' => 'Không được phép truy cập!',
        'only_one' => 'Chỉ được phép kích hoạt 1 mục',
        'no_delete' => 'Bạn không được phép xóa mục này, do mục này đã được sử dụng vào hiển thị web',
        'no_delete_hang' => 'Bạn không được phép xóa hãng này, do hãng đã được thêm sản phẩm',
    );

    public function cancel()
    {
        $bak_after_save = $this->Session->read('back_after_save');
        if (!empty($bak_after_save)) $this->redirect($bak_after_save);
        else $this->redirect(array('action' => 'index'));
    }

    public function save_url()
    {
        $this->Session->write('back_after_save', 'http://' . $_SERVER['HTTP_HOST'] . $this->request->here);
    }

    public function beforeFilter()
    {
        parent::beforeFilter();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        lotus_controller($this);
        $this->cat_nodel = array('1', '4', '6', '7');
    }

    public function replacekytu($id = null)
    {
        return str_replace("'", "", str_replace("/", "", str_replace('"', '', $id)));
    }

}
