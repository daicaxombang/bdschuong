<div class="slideslide">
    <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators" style="display: none;">
            <?php $dem = 0;
            foreach ($slideshow as $value) { ?>
                <li data-target="#myCarousel"
                    data-slide-to="<?php echo $dem; ?>" <?php if ($dem == 0) echo 'class="active"'; ?>></li>
                <?php $dem++;
            } ?>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
            <?php $dem = 0;
            foreach ($slideshow as $value) { ?>
                <div class="<?php if ($dem == 0) echo 'active '; ?>item">
                    <a href="<?php echo $value['Slideshow']['url']; ?>"
                       title="<?php echo $value['Slideshow']['name']; ?>">
                        <img src="<?php echo DOMAIN; ?>img/w1680/h580/fill!<?php echo $value['Slideshow']['images']; ?>"
                             alt="<?php echo $value['Slideshow']['name']; ?>"
                             title="<?php echo $value['Slideshow']['name']; ?>" style="width: 100%;"/>
                    </a>
                </div>
                <?php $dem++;
            } ?>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>