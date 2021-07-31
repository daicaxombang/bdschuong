<?php


class Extention extends AppModel {
    public $useTable = 'extentions';
    public $name = 'Extention';

    public function listExtentionHot($type = null) {
        $listExtentionHot = $this->find('all', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.type' => $type
            ),
            'limit' => 4,
            'order' => 'Extention.order ASC',
            ));
        return $listExtentionHot;
    }
    public function listAdsHot($type = null) {
        $listAdsHot = $this->find('first', array(
            'conditions' => array(
                'Extention.status' => 1,
                'Extention.type' => $type
            ),
            'order' => 'Extention.order ASC',
            ));
        return $listAdsHot;
    }
    
}
