<?php


class Home extends AppModel {
    public $useTable = 'products';
    public $name = 'Home';
    
    
    public $belongsTo = array(
        'Catproduct' => array(
            'conditions' => array(
                'Catproduct.status' => 1,
            ),
            'className' => 'Catproduct',
            'foreignKey' => 'cat_id'
        )
    );

    public function listHomeHot($type = array(), $limit = null) {
        $menu = array(); 
        if($type){
            foreach($type as $vl){
                $menu = array_merge($menu,$this->multiMenuProduct($vl)); 
            }
        }
        $listHomeHot = $this->find('all', array(
            'conditions' => array(
                'Home.status' => 1,
                'Home.new' => 1,
                'Home.cat_id' => $menu
            ),
            'order' => 'Home.order ASC',
            'limit' => $limit
            ));
        return $listHomeHot;
    }
    
    public function multiMenuProduct($parentid = null, $trees = array()) {
        $trees[] = $parentid;
        $parmenu = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1
            ),
        ));
        if ($parmenu) {
            foreach ($parmenu as $field) {
                $trees = $this->multiMenuProduct($field['Catproduct']['id'], $trees);
            }
        }
        return $trees;
    }

}
