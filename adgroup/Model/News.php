<?php
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class News extends AppModel {

    var $name = 'News';
    
    var $belongsTo = array(
        'Catproduct' => array(
            'className' => 'Catproduct',
            'foreignKey' => 'category_id'
        )
    );

}

?>
