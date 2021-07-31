<?php


class Support extends AppModel {
    public $useTable = 'supports';
    public $name = 'Support';
    
    public function listSupport($type = null) {
        $listSupport = $this->find('first', array(
            'conditions' => array(
                'Support.id' => 2
            )));
        return $listSupport;
    }
    
}
