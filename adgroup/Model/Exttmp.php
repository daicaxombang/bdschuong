<?php
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class Exttmp extends AppModel {

    var $name = 'Exttmp';
    var $displayField = 'name';
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Xin vui lòng điền thông tin',
                'allowEmpty' => false,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),

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
