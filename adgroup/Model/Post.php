<?php
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class Post extends AppModel {

    var $name = 'Post';
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
        'cat_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Vui lòng chọn',
                'allowEmpty' => false,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    var $belongsTo = array(
        'Catproduct' => array(
            'className' => 'Catproduct',
            'foreignKey' => 'cat_id'
        ),
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
