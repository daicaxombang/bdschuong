<?php

class Catalogue extends AppModel {
    public $useTable = 'catalogues';
    public $name = 'Catalogue';

    public function listAlbum($type = null, $cate = null) {
        $listAlbum = $this->find('all', array(
            'conditions' => array(
                'Catalogue.status' => 1,
                'Catalogue.type' => $cate,
                'Catalogue.parent_id' => $type
            ),
                'limit' => 4,
                'order' => 'Catalogue.order ASC',
            ));
        return $listAlbum;
    }
    
}
