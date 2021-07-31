<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class Extention extends AppModel {

    var $name = 'Extention';
    var $displayField = 'name';
    var $validate = array(
        //'name' => array(
//            'notempty' => array(
//                'rule' => array('notempty'),
//                'message' => 'Vui lòng điền thông tin',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//                //'on' => 'create', // Limit validation to 'create' or 'update' operations
//                'required' => true,
//            ),
//        ),
        'images' => array(
            'ext' => array(
                'rule' => array('extension',array('jpeg','jpg','png','gif','swf')),
                'required' => false,
                'allowEmpty' => true,
                'message' => 'Bạn phải chọn các tệp jpeg,jpg,png,gif,swf',
                'on' => 'create'
            ),
        ),
        /*'url' => array(
            'isUrl' => array(
                'rule' => array('url'),
                'message' => 'Liên kết không hợp lệ',
            ),
        ),*/
    );
    var $belongsTo = array(
        'Account' => array(
            'className' => 'Account',
            'foreignKey' => 'user_id'
        ),
        'Accountedit' => array(
            'className' => 'Account',
            'foreignKey' => 'user_id_edit'
        )
    );
}

?>