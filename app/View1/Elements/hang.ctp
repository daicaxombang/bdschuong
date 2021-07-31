<div class="main-width box-hang">
    <ul>
        <?php foreach($hang as $value){?>
            <li class="img-outer">
                <a href="<?php echo DOMAIN.'hang/'.$value['Hang']['link'];?>" title="<?php echo $value['Hang']['name'];?>">
                    <img class="image" src="<?php echo DOMAIN;?>img/<?php echo $value['Hang']['images'];?>" title="<?php echo $value['Hang']['name'];?>" alt="<?php echo $value['Hang']['name'];?>"/>
                </a>
            </li>
        <?php }?>
    </ul>
    <div class="clear-main"></div>
</div>