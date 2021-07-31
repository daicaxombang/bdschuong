<?php

/**
 * Description of NewsController
 * @author : Nguyễn Duy Cường
 * @since Oct 19, 2012
 */
class PostsController extends AppController {

    public $name = 'Posts';
    public $uses = array('Post', 'Setting', 'Catalogue');

    public function beforeFilter() {

    }
    
}