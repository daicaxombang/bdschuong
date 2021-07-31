<?php


class Post extends AppModel {
    public $useTable = 'posts';
    public $name = 'Post';
    
    
    public $belongsTo = array(
        'Catproduct' => array(
            'conditions' => array(
                'Catproduct.status' => 1,
            ),
            'className' => 'Catproduct',
            'foreignKey' => 'cat_id'
        )
    );
}
