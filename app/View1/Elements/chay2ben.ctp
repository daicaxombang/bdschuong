<?php //if(!isset($mobile)){?>
<style type="text/css">
.box-chayquangcao{
    width: 1025px;
    margin: 0 auto;
    position: relative;
}
.box-chayquangcao img{
    width: 135px;
}
.anh-left{
    position: absolute;
    width: 135px;
    height: 100px;
    left: -135px;
    top: 485px;
}
.anh-right{
    position: absolute;
    width: 135px;
    height: 100px;
    right: -135px;
    top: 485px;
}
</style>
<div class="box-chayquangcao">
    <div class="anh-left">
        <?php if(!empty($chaytrai)){?>
        <div id="menu" class="default">
            <a href="<?php echo $chaytrai['Extention']['url'];?>" title="<?php echo $chaytrai['Extention']['name'];?>">
                <img src="<?php echo DOMAIN;?>img/w135/<?php echo $chaytrai['Extention']['images'];?>"/>
            </a>
        </div>
        <?php }?>
    </div>
    <div class="anh-right">
        <?php if(!empty($chayphai)){?>
        <div id="menu1" class="default">
            <a href="<?php echo $chayphai['Extention']['url'];?>" title="<?php echo $chayphai['Extention']['name'];?>">
                <img src="<?php echo DOMAIN;?>img/w135/<?php echo $chayphai['Extention']['images'];?>"/>
            </a>
        </div>
        <?php }?>
    </div>
</div>
<?php //}?>