<?php


class Product extends AppModel {
    public $useTable = 'products';
    public $name = 'Product';
    
    
    public $belongsTo = array(
        'Catproduct' => array(
            'conditions' => array(
                'Catproduct.status' => 1,
            ),
            'className' => 'Catproduct',
            'foreignKey' => 'cat_id'
        ),
        'Hang' => array(
            'className' => 'Hang',
            'foreignKey' => 'hang_id'
        )
    );

}
