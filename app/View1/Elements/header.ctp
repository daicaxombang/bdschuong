<div class="evo-search-bar">
    <form action="/search" method="get" class="has-validation-callback">
        <div class="input-group">
            <input type="text" name="query" class="search-auto form-control" placeholder="Tìm kiếm xe...">
            <span class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
			</span>
        </div>
    </form>
    <button class="site-header__search" title="Đóng tìm kiếm">
        <svg xmlns="http://www.w3.org/2000/svg" width="26.045" height="26.044">
            <g data-name="Group 470">
                <path d="M19.736 17.918l-4.896-4.896 4.896-4.896a1.242 1.242 0 0 0-.202-1.616 1.242 1.242 0 0 0-1.615-.202l-4.896 4.896L8.127 6.31a1.242 1.242 0 0 0-1.615.202 1.242 1.242 0 0 0-.202 1.615l4.895 4.896-4.896 4.896a1.242 1.242 0 0 0 .202 1.615 1.242 1.242 0 0 0 1.616.202l4.896-4.896 4.896 4.896a1.242 1.242 0 0 0 1.615-.202 1.242 1.242 0 0 0 .202-1.615z"
                      data-name="Path 224" fill="#1c1c1c"></path>
            </g>
        </svg>
    </button>
</div>
<header class="header">
    <div class="evo-top-bar hidden-sm hidden-xs">
        <div class="main-width">
            <div class="row-fluid">
                <div class="span8">
                    <ul class="mosttop-bar-info">
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <a href="tel:<?php echo $setting['hotline']; ?>" title="<?php echo $setting['hotline']; ?>"><?php echo $setting['hotline']; ?></a>
                        </li>
                        <li>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:<?php echo $setting['email']; ?>" title="<?php echo $setting['email']; ?>"><?php echo $setting['email']; ?></a>
                        </li>
                    </ul>
                </div>
                <div class="span4">
                    <ul class="social-icons">
                        <li><a href="<?php echo $setting['tiwter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo $setting['printerest']; ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="<?php echo $setting['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
<!--                        <li class="evo-search">-->
<!--                            <a href="javascript:void(0);" class="site-header-search" rel="nofollow" title="Tìm kiếm"><i-->
<!--                                        class="fa fa-search" aria-hidden="true"></i></a>-->
<!--                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="evo-main-header">
        <div class="main-width">
            <div class="row-fluid">
                <div class="span3">
                    <?php
                    if(!empty($banner)){
                        ?>
                        <div style="">
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
                <div class="span9">
                    <?php echo $this->element('menu'); ?>
                </div>
            </div>
        </div>
    </div>
</header>