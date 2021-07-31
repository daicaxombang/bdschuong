<?php



/**

 * Description of HomeComtroller

 * @author : Yeu tinh

 * @since Math 11, 2013

 */

class HomeController extends AppController {

    public $name = 'Home';
    public $uses = array('Catproduct', 'Product', 'Post');


    public function beforeFilter() {
        parent::beforeFilter();
        
    }

    public function intro(){
        $this->layout = 'intro';
    }

    public function index() {
        $this->set('trangchu', 'trangchu');
        $this->Session->write('active_menu', '1');

        //load mn ft
        $list_productnb = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.choose1' => 1
            ),
            'order' => array('Product.order' => 'DESC'),
            'limit' => 4
        ));
        $this->set('list_productnb', $list_productnb);

        $list_cat = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.status' => 1,
                'Catproduct.type' => 'product',
                'Catproduct.home' => 1,
            ),
            'fields' => array('id', 'name', 'link'),
            'order' => array('Catproduct.order' => 'ASC')
        ));
        $listproduct = array();
        foreach ($list_cat as $value) {
            //load new
            $cat_id = $this->multiMenuProduct($value['Catproduct']['id'], null);
            $cat_id[$value['Catproduct']['id']] = $value['Catproduct']['id'];
            $table = 'Product';
            $list = $this->$table->find('all', array(
                'conditions' => array(
                    $table . '.status' => 1,
//                    $table . '.choose1' => 1,
                    $table . '.cat_id' => $cat_id
                ),
                'order' => array($table . '.order' => 'DESC'),
                'limit' => 12
            ));

            //gop ten cha + noi dung
            $listproduct[] = array(
                'id' => $value['Catproduct']['id'],
                'name' => $value['Catproduct']['name'],
                'link' => $value['Catproduct']['link'],
                'list' => $list,
            );
        }
        $this->set('listproduct', $listproduct);



        $listcattt = $this->Catproduct->find('all', array(
            'conditions' => array(
                'Catproduct.status' => 1,
                'Catproduct.id' => 4,
            ),
            'fields' => array('id', 'name', 'link'),
            'order' => array('Catproduct.order' => 'ASC')
        ));
        $listintt = array();
        foreach ($listcattt as $value) {
            //load new
            $cat_id = $this->multiMenuProduct($value['Catproduct']['id'], null);
            $cat_id[$value['Catproduct']['id']] = $value['Catproduct']['id'];
            $table = 'Post';
            $list = $this->$table->find('all', array(
                'conditions' => array(
                    $table . '.status' => 1,
//                    $table . '.choose1' => 1,
                    $table . '.cat_id' => $cat_id
                ),
                'order' => array($table . '.order' => 'DESC'),
                'limit' => 4
            ));

            //gop ten cha + noi dung
            $listintt[] = array(
                'id' => $value['Catproduct']['id'],
                'name' => $value['Catproduct']['name'],
                'link' => $value['Catproduct']['link'],
                'list' => $list,
            );
        }
        $this->set('listintt', $listintt);

    }

    public function index_ajax($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;

        if($this->Session->check('user_app')){
            $price_sp = 'price2';
            $text_price_sp = 'Giá sỉ';
        }else{
            $price_sp = 'price';
            $text_price_sp = 'Giá đề xuất';
        }

        $list_sphome = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.choose1' => 1,
                'Product.type' => 'product'
            ),
            'fields' => array('id', 'name', 'link', 'images', 'code', 'price', 'price2'),
            'order' => array('Product.order' => 'DESC', 'Product.id' => 'DESC'),
            'offset' => $id,
            'limit' => '20'
        ));

        $tmp = '';
        foreach($list_sphome as $value){
            $tmp .= '<li>';
                $tmp .= '<div class="padd-product">';
                    $tmp .= '<div class="b-img-product">';
                        $tmp .= '<a href="'.DOMAIN.$value['Product']['link'].'.html" title="'.$value['Product']['name'].'">';
                            $tmp .= '<img src="'. DOMAIN.'img/w485/'.$value['Product']['images'].'" title="'.$value['Product']['name'].'" alt="'.$value['Product']['name'].'" />';
                        $tmp .= '</a>';
                    $tmp .= '</div>';
                    $tmp .= '<a href="'.DOMAIN.$value['Product']['link'].'.html" title="'.$value['Product']['name'].'">';
                        $tmp .= '<h3>'.$value['Product']['name'].'</h3>';
                    $tmp .= '</a>';
                    $tmp .= '<div class="clear-main"></div>';
                    $tmp .= '<div class="b-code-product">Mã: <span>'.$value['Product']['code'].'</span></div>';
                    $tmp .= '<div class="b-price-buy">';
                        $tmp .= $text_price_sp.' : ';
                        $tmp .= '<span>'; 
                            if($value['Product'][$price_sp]){
                                if(is_numeric($value['Product'][$price_sp])){
                                    $tmp .= number_format($value['Product'][$price_sp], '0').' <sup>vnđ</sup>';
                                }else{
                                    $tmp .= $value['Product'][$price_sp].' <sup>vnđ</sup>';
                                }
                            }else{
                                $tmp .= 'Liên hệ';
                            }
                        $tmp .= '</span>';
                    $tmp .= '</div>';
                    $tmp .= '<div class="clear-main"></div>';
                $tmp .= '</div>';
            $tmp .= '</li>';
        }
        
        echo $tmp; die;
    }

    public function multiMenuProduct($parentid = null, $trees = NULL) {
        $parmenu = $this->Catproduct->find('all', array(
            'fields' => array('id', 'name'),
            'conditions' => array(
                'Catproduct.parent_id' => $parentid,
                'Catproduct.status' => 1
            ),
            'order' => 'Catproduct.order ASC'
            ));
        if (count($parmenu) > 0) {
            foreach ($parmenu as $field) {
                $trees[$field['Catproduct']['id']] = $field['Catproduct']['id'];
                $trees = $this->multiMenuProduct($field['Catproduct']['id'], $trees);
            }
        }
        return $trees;
    }
}