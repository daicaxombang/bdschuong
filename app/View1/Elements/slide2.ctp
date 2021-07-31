<div class="">
    <div class="slideslide" style="margin: 0;">
        <div id="myCarousel_slidec" class="carousel slide">
            <ol class="carousel-indicators">
                <?php $dem = 0; foreach($slide2 as $value){?>
                    <li data-target="#myCarousel_slidec" data-slide-to="<?php echo $dem;?>" <?php if($dem == 0) echo 'class="active"';?>></li>
                <?php $dem ++;}?>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <?php $dem = 0; foreach($slide2 as $value){?>
                    <div class="<?php if($dem == 0) echo 'active ';?>item">
                        <a href="<?php echo $value['Extention']['url'];?>" title="<?php echo $value['Extention']['name'];?>">
                            <img src="<?php echo DOMAIN;?>img/w700/h324/<?php echo $value['Extention']['images'];?>" alt="<?php echo $value['Extention']['name'];?>" title="<?php echo $value['Extention']['name'];?>" style="width: 100%;" />
                        </a>
                    </div>
                <?php $dem ++;}?>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel_slidec" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel_slidec" data-slide="next">&rsaquo;</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#myCarousel_slidec').carousel({
        interval: 8000
    });
</script>