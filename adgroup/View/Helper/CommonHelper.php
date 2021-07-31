<?php
/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
class CommonHelper extends AppHelper {
    function menu_current ($array = null){
        if(is_array($array)){
            foreach ($array as $controller){
                if($this->request->params['controller']==$controller) return ' current ';
            }
        }
        else if($this->request->params['controller']==$array) return ' current ';
        return null;
    }
}
?>
