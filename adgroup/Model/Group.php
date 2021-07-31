<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class Group extends AppModel {

    var $name = 'Group';
    var $displayField = 'name';
    var $validate = array(
        'name' => array(
            'isUnique' => array (
                'rule' => 'isUnique',
                'message' => 'Đã có nhóm này'
            ),
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Tên nhóm không được để trống',
                'allowEmpty' => false,
            ),        
        ),
    );
}

?>
