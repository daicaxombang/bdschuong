<?php
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
 
class Catproduct extends AppModel {

    var $name = 'Catproduct';
    var $displayField = 'name';
    var $actsAs = array('Tree');
    var $belongsTo = array(
        'ParentCat' => array(
            'className' => 'Catproduct',
            'foreignKey' => 'parent_id'
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
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Xin vui lòng điền thông tin',
                'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    var $hasMany = array(
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'cat_id',
            'dependent' => true,
        ),
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'cat_id',
            'dependent' => true,
        )
    );

}

?>
