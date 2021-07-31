<?php 
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
class Catalogue extends AppModel {

    var $name = 'Catalogue';
    var $displayField = 'name';
    var $actsAs = array('Tree');
    var $belongsTo = array(
        'ParentCat' => array(
            'className' => 'Catalogue',
            'foreignKey' => 'parent_id'
        )
    );
    var $validate = array(
        'id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
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
        'Post' =>
        array(
            'className' => 'Post',
            'foreignKey' => 'cat_id',
            'dependent' => true,
        )
    );

}

?>
