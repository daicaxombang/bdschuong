<?php


/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/
 
App::import('Vendor', 'upload');

class UploadComponent extends Component {
    
    public $w = 0;
    public $h = 0;
    public $new = array();
    public $name = null;
    public $delete = null;
    public $copy = null;
    public $max_char = 80;
    public $watermark =  null;
    public $max_img =  1000;
    
    private function get_dir($ext){          
        if($ext == 'swf') return SWF_DIR;
        else if($ext == 'jpg'||$ext == 'jpeg'||$ext == 'gif'||$ext == 'png') return IMG_DIR;
        else return FILE_DIR;  
    }
    
    public function Process(){
        if($this->delete){
            $dir = $this->get_dir(get_extension($this->delete));
            
            if(is_file($dir.$this->delete)) if(file_exists($dir.$this->delete)) unlink($dir.$this->delete);
        }
        if($this->copy){
            
            $ext = get_extension($this->copy);
            $dir = $this->get_dir($ext);
            
            if($this->name) $body_name = $this->name;
            else $body_name = get_body_name($this->copy);
            $body_name = str_to_url($body_name);
            if(strlen($body_name) > $this->max_char ) $body_name = substr($body_name, $this->max_char);
            
            if(file_exists($dir.$body_name.'.'.$ext)){
                $tmp_name = $body_name;
                for($i=2;;$i++){
                    if(!file_exists($dir.$tmp_name.'-'.$i.'.'.$ext)){
                        $body_name = $tmp_name.'-'.$i;
                        break;
                    }
                }
            }
            
            $new_file = $body_name.'.'.$ext;
            if(is_file($dir.$this->copy)) if(file_exists($dir.$this->copy)){
                copy($dir.$this->copy, $dir.$new_file);
                return $new_file;
            }
            return null;
        }
        else if($this->new) {
            
            $handle = new upload($this->new);
            $dir = $this->get_dir($handle->file_src_name_ext);

            if ($handle->uploaded) {
    		
    			// Neu resize
                if($this->w || $this->h){
                    $handle->image_resize          = true;
                    
                    if(!$this->h){
                        $handle->image_ratio_y         = true;
                        $handle->image_x               = $this->w;
                    }
                    else if(!$this->w){
                        $handle->image_ratio_x         = true;
                        $handle->image_y               = $this->h;
                    }
                    else {
                        $handle->image_x               = $this->w;
    				    $handle->image_y               = $this->h;
                    }
                }else{
                    if($this->max_img){
                        $handle->image_x               = $this->max_img;
                        $handle->image_ratio_y         = true;   
                    }else{
                        $handle->image_x               = $handle->image_src_x;
                        $handle->image_y               = $handle->image_src_y;
                    }
                }
                // in anh
                if($this->watermark){
                    //$handle->image_watermark = ROOT.DS.'admin'.DS.'webroot'.DS.'images'.DS.'logo.png';
                    $handle->image_watermark = $this->watermark;
                    $handle->image_watermark_no_zoom_out = true;
                    $handle->image_watermark_position = 'BR';
                }
                
                if($this->name) $body_name = $this->name;
                else $body_name = $handle->file_src_name_body;
            	$body_name = str_to_url($body_name);
                if(strlen($body_name) > $this->max_char ) $body_name = substr($body_name, $this->max_char);
            	
                if(file_exists($dir.$body_name.'.'.$handle->file_src_name_ext)){
                    $tmp_name = $body_name;
                    for($i=2;;$i++){
                        if(!file_exists($dir.$tmp_name.'-'.$i.'.'.$handle->file_src_name_ext)){
                            $body_name = $tmp_name.'-'.$i;
                            break;
                        }
                    }
                }
                
    
                $handle->file_new_name_body = $body_name;
    
                $handle->Process($dir);
                if ($handle->processed) {
                    return $handle->file_dst_name;
                }
            }
        }
    }
}

?>
