<header class="header">
    <div class="evo-main-header">
        <div class="main-width">
            <div class="row-fluid">
                <div class="span2">
                    <?php
                    if(!empty($banner)){
                        ?>
                        <div style="" class="bnmb">
                            <a href="<?php echo DOMAIN;?>">
                                <?php if(get_extension($banner['Extention']['images']) == "swf") { ?>
                                    <embed src="<?php echo SWF_URL.$banner['Extention']['images']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="1000" height="215" scale="ExactFit"> </embed>
                                <?php } else { ?>
                                    <img src="<?php echo DOMAIN.'img/h40/fill!'.$banner['Extention']['images']; ?>"/>
                                <?php } ?>
                            </a>
                        </div>
                    <?php }?>
                </div>
                <div class="span10">
                    <?php echo $this->element('menu'); ?>
                </div>
            </div>
        </div>
    </div>
</header>