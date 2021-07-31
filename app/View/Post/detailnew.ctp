<div class="bar-product">
    <div class="list-category-product-title-left">
        <a href="#">
            <h1><?php echo $detailNews['Post']['name']?></h1>
        </a>
    </div>
</div>
<div class="ct-tthome">
    <div class="ct-tt">
        <?php echo $detailNews['Post']['content'];?>
        <div class="clear-main"></div>
    </div><!--end ct-tt-->
    <div class="time-date">
        <?php echo date('h:i:s', strtotime($detailNews['Post']['created']));?>&nbsp;&nbsp;
        <span><?php echo date('d/m/Y', strtotime($detailNews['Post']['created']));?></span>
    </div><!--end time-date--><div class="clear-content"></div>
    <div class="box-like-share">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <g:plusone></g:plusone> 
        <div class="fb-like" data-href="<?php echo DOMAIN.$detailNews['Post']['link'];?>.html" data-layout="button_count" data-action="recommend" data-show-faces="false" data-share="true"></div>
    </div><!--end box-like-share-->

    <?php if(!empty($tinlq)){?>
    <div class="bar-new-detail">
        <label>Tin cùng chuyên mục</label>
        <div class="clear-main"></div>
        <ul>
            <?php foreach($tinlq as $value){?>
            <li>
                <div class="ngaythang"><?php echo date('d-m-Y h:i:s', strtotime($value['Post']['created'])); ?> -&nbsp</div>
                <a href="<?php echo DOMAIN.$value['Post']['link'];?>.html" title="<?php echo $value['Post']['name'];?>">
                    <h3> <?php echo $value['Post']['name'];?></h3>
                </a>
                <div class="clear-main"></div>
            </li>
            <?php }?>
        </ul>
        <div class="clear-main"></div>
    </div><!--end bar-new-detail-->
    <?php }?>

    <div class="fb-comments" data-href="<?php echo DOMAIN.$detailNews['Post']['link'];?>.html" data-width="100%" data-numposts="5"></div>

</div>