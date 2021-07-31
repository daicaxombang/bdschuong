<?php
class SlideshowHelper extends AppHelper {

    public function nivo ($width = null, $height = null,$position = null){
        $Slideshow=ClassRegistry::init('Slideshow');
        $y=$Slideshow->find('all',array('conditions'=>array('status'=>1)));
        ?>
    <div style="<?php if($width) echo 'width:'.$width.'px;';if($height) echo 'height:'.$height.'px;'; ?>">
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <?php foreach($y as $key => $value){
                if($value['Slideshow']['url']){?>
                    <a href="<?php echo $value['Slideshow']['url'];?>"><img src="<?php echo IMG_URL;if($position) echo $position.'/';if($width) echo 'w'.$width.'/';if($height) echo 'h'.$height.'/';echo $value['Slideshow']['images'];?>" data-thumb="<?php echo IMG_URL.'fill/h50/w100/'.$value['Slideshow']['images'];?>" alt="" <?php if($value['Slideshow']['content']){?>title="#htmlcaption<?php echo $key;?>"<?php }?> /></a>
                <?php }else{?>
                    <img src="<?php echo IMG_URL;if($position) echo $position.'/';if($width) echo 'w'.$width.'/';if($height) echo 'h'.$height.'/';echo $value['Slideshow']['images'];?>" data-thumb="<?php echo IMG_URL.'fill/h50/w100/'.$value['Slideshow']['images'];?>" alt="" <?php if($value['Slideshow']['content']){?>title="#htmlcaption<?php echo $key;?>"<?php }?> />
                <?php }
            }?>
        </div>
        <?php foreach($y as $key => $value){
            if($value['Slideshow']['content']){?>
                <div id="htmlcaption<?php echo $key;?>" class="nivo-html-caption">
                    <?php echo $value['Slideshow']['content'];?> 
                </div>
            <?php }
        }?>
    </div>
    </div>
    <link rel="stylesheet" href="<?php echo DOMAIN;?>css/nivo/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo DOMAIN;?>css/nivo/nivo-slider.css" type="text/css" media="screen" />
    
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect:'random'
        });
    });
    </script>
    
        <?php
    }
    
    public function diapo ($width = null, $height = null,$position = null){
        $Slideshow=ClassRegistry::init('Slideshow');
        $y2=$Slideshow->find('all',array('conditions'=>array('status'=>1)));
        ?>
        <div style="overflow:hidden; width:960px; margin: 100px auto; padding:0 20px;"> 
            <div class="pix_diapo">
            <?php foreach($y2 as $key => $value){?>
                <div data-thumb="<?php echo IMG_URL.'fill/w58/h58/'.$value['Slideshow']['images'];?>">
                    <img src="<?php echo IMG_URL;if($position) echo $position.'/';if($width) echo 'w'.$width.'/';if($height) echo 'h'.$height.'/';echo $value['Slideshow']['images'];?>" />
                    <?php if($value['Slideshow']['content']){?>
                    <div class="caption elemHover fromLeft">
                        <?php echo $value['Slideshow']['content'];?>
                    </div>
                    <?php }?>
                </div>
            <?php }?>
            </div>
        </div>
        <link rel='stylesheet' id='style-css'  href='<?php echo DOMAIN;?>css/diapo/diapo.css' type='text/css' media='all'> 
        
        <!--[if !IE]><!--><script type='text/javascript' src='<?php echo DOMAIN;?>js/diapo/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
        <script type='text/javascript' src='<?php echo DOMAIN;?>js/diapo/jquery.easing.1.3.js'></script> 
        <script type='text/javascript' src='<?php echo DOMAIN;?>js/diapo/jquery.hoverIntent.minified.js'></script> 
        <script type='text/javascript' src='<?php echo DOMAIN;?>js/diapo/diapo.js'></script> 
        <?php
    }
    
    public function wow($width = null, $height = null,$position = null){
        $Slideshow=ClassRegistry::init('Slideshow');
        $y=$Slideshow->find('all',array('conditions'=>array('status'=>1)));
        ?>
        
        <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN;?>css/wow/style.css" />
        <script type="text/javascript" src="<?php echo DOMAIN;?>js/wow/wowslider.js"></script>
        <script type="text/javascript" src="<?php echo DOMAIN;?>js/wow/script.js"></script>
        <?php
    }
}
?>
