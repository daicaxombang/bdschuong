<?php



/**

 * Description of HomeComtroller

 * @author : Yeu tinh

 * @since Math 11, 2013

 */

class ErrpageController extends AppController {

    public $name = 'Errpage';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'errpage';
    }
    
    public function thongbao(){
        $this->set('title_for_layout', 'Lỗi không tìm thấy !');
    }
}