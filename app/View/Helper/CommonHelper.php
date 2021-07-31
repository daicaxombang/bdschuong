<?php
class CommonHelper extends AppHelper {
    public function banner ($width = null, $height = null){
        
        $Extention=ClassRegistry::init('Extention');		
		$y=$Extention->find('all',array('conditions'=>array('type'=>'banner','status'=>1)));
        $ext = get_extension($y[0]['Extention']['images']);
        ?><img src="<?php echo get_url($ext);if($width) echo 'w'.$width.'/';if($height) echo 'h'.$height.'/';echo $y[0]['Extention']['images'];?>" /><?php
    }
    
    public function slideshow ($width = null, $height = null){
        $Slideshow=ClassRegistry::init('Slideshow');
        $y2=$Slideshow->find('all',array('conditions'=>array('status'=>1)));
        ?>
        <div style="overflow:hidden; width:960px; margin: 100px auto; padding:0 20px;"> 
            <div class="pix_diapo">
            <?php foreach($y2 as $key => $value){?>
                <div data-thumb="<?php echo IMG_URL.'fill/w58/h58/'.$value['Slideshow']['images'];?>">
                    <img src="<?php echo IMG_URL;if($width) echo 'w'.$width.'/';if($height) echo 'h'.$height.'/';echo $value['Slideshow']['images'];?>" />
                    <?php if($value['Slideshow']['content']){?>
                    <div class="caption elemHover fromLeft">
                        <?php echo $value['Slideshow']['content'];?>
                    </div>
                    <?php }?>
                </div>
            <?php }?>
            </div>
        </div>
        <?php
    }
}
?>
