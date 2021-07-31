<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class Permision extends AppModel {

    var $name = 'Permision';
    var $displayField = 'name';
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Vui lòng điền thông tin',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                //'on' => 'update', // Limit validation to 'create' or 'update' operations
                'required' => true,
            ),
            'isUnique' => array (
                'rule' => 'isUnique',
                'message' => 'Đã có tên này'
            ),
        ),
        'allow' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Vui lòng điền thông tin',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => array (
                'rule' => 'isUnique',
                'message' => 'Đã có quyền này'
            ),
        ),
    );
}

?>