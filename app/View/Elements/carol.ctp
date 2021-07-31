<div class="">
    <div class="box-carol position-relative">
        <div class="list_carousel">
        	<a id="prev1" href="#"><img src="<?php echo DOMAIN;?>images/carol-left.png"/></a>
        	<ul id="user_interaction">
                <?php foreach($doitac as $value){?>
            		<li class="position-relative cl<?php echo $value['Extention']['id'];?>">
                        <a href="<?php echo $value['Extention']['name'];?>"><div class="b-cl"></div></a>
                        <div class="clear-main"></div>
                    </li>
                <?php }?>
        	</ul>
        	<a id="next1" href="#"><img src="<?php echo DOMAIN;?>images/carol-right.png"/></a>
        	<div class="clearfix"></div>
        </div>
        <div class="clear-main"></div>
    </div><!--end box-carol-->
</div><div class="clear-main"></div>

<style type="text/css">
    <?php foreach($doitac as $value){?>
        .cl<?php echo $value['Extention']['id'];?>{
            background: url("<?php echo DOMAIN;?>img/w385/h193/<?php echo $value['Extention']['images'];?>") no-repeat top center;
        }
        .cl<?php echo $value['Extention']['id'];?>:hover{
            background: url("<?php echo DOMAIN;?>img/w385/h193/<?php echo $value['Extention']['images'];?>") no-repeat top center;
        }
    <?php }?>
</style>