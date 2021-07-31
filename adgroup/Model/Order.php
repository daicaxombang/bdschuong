<?php
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class Order extends AppModel {

    var $name = 'Order';
    var $displayField = 'name';

    var $belongsTo = array(
        'Product' => array(
            'fields' => array('id', 'name', 'link', 'images', 'price'),
            'className' => 'Product',
            'foreignKey' => 'product_id'
        )
    );

}

?>
