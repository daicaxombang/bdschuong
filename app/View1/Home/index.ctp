<!--<section class="awe-section-2">-->
<!--    <div class="section_search_car">-->
<!--        <div class="main-width">-->
<!--            <div class="row-fluid">-->
<!--                <div class="span12">-->
<!--                    <div class="filter-title">-->
<!--                        <h5><img class="lazy loaded"-->
<!--                                 src="//bizweb.dktcdn.net/100/357/395/themes/723078/assets/search-cart.png?1563887439060"-->
<!--                                 data-src="//bizweb.dktcdn.net/100/357/395/themes/723078/assets/search-cart.png?1563887439060"-->
<!--                                 alt="Tìm Kiếm Xe" data-was-processed="true"> Tìm Kiếm Xe</h5>-->
<!--                    </div>-->
<!--                    <div class="search-bar search_form">-->
<!--                        <fieldset class="form-group">-->
<!--                            <div class="span10 no-padding">-->
<!--                                <div class="row-fluid">-->
<!--                                    <div class="span4">-->
<!--                                        <div class="input_group group_a">-->
<!--                                            <label>Từ khóa</label>-->
<!--                                            <input type="text" autocomplete="off" placeholder="Từ khóa" id="name"-->
<!--                                                   class="form-control form-hai form-control-lg" required="">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="span4">-->
<!--                                        <div class="ab">-->
<!--                                            <label>Dòng xe</label>-->
<!--                                            <select name="garden" class="tag-select" required="">-->
<!--                                                <option value="">Tất cả</option>-->
<!--                                                <option value="product_type:(Hatch Back)">Hatch Back</option>-->
<!--                                                <option value="product_type:(MPV)">MPV</option>-->
<!--                                                <option value="product_type:(Sedan)">Sedan</option>-->
<!--                                                <option value="product_type:(SUV)">SUV</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="span4">-->
<!--                                        <div class="abs">-->
<!--                                            <label>Thương hiệu</label>-->
<!--                                            <select name="gender" class="tag-select option_vendor ui dropdown"-->
<!--                                                    id="select" required="">-->
<!--                                                <option value="">Tất cả</option>-->
<!--                                                <option class="item" value="vendor:(Mazda)">Mazda</option>-->
<!--                                                <option class="item" value="vendor:(Mitsubishi)">Mitsubishi</option>-->
<!--                                                <option class="item" value="vendor:(Toyota)">Toyota</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="span2 no-padding">-->
<!--                                <button class="hs-submit btn-style btn btn-default btn-blues">TÌM KIẾM</button>-->
<!--                            </div>-->
<!--                        </fieldset>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="awe-section-3">
    <div class="main-width section_product_best_sell">
        <div class="row-fluid">
            <div class="span12">
                <div class="section_product clearfix">
                    <div class="section-head clearfix">
                        <h2 class="title_blog">Sản phẩm nổi bật</h2>
                    </div>
                    <div class="e-tabs not-dqtab ajax-tab-2" data-section="ajax-tab-2" data-view="grid_4">
                        <div class="content">
                            <span class="hidden-md hidden-lg button_show_tab">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                            <div class="tab-1 tab-content current">
                                <div class="slick_ajax_tab products-view-grid">
                                    <?php
                                    $num_page = ceil(count($list_productnb) / 4);
                                    for ($i = 0; $i < $num_page; $i++) {
                                        $dem = 0;
                                        echo '<div class="row-fluid">';
                                        foreach ($list_productnb as $k => $row) { ?>
                                            <div class="span3">
                                                <div class="evo-product-car b-goods_back_sm">
                                                    <div class="flip-container">
                                                        <div class="flipper">
                                                            <div class="flip__front">
                                                                <div class="b-goods__img">
                                                                    <a href="<?php echo DOMAIN . $row['Product']['link']; ?>.html"
                                                                       title="<?php echo $row['Product']['name'] ?>">
                                                                        <img class="img-responsive center-block lazy loaded"
                                                                             src="<?php echo DOMAIN; ?>img/w357/h395/fill!<?php echo $row['Product']['images'] ?>"
                                                                             title="<?php echo $row['Product']['name'] ?>"
                                                                             alt="<?php echo $row['Product']['name'] ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="b-goods__inner">
                                                                    <div class="b-goods__name">
                                                                        <a href="<?php echo DOMAIN . $row['Product']['link']; ?>.html"
                                                                           title="<?php echo $row['Product']['name'] ?>">
                                                                            <?php echo $row['Product']['name'] ?>
                                                                        </a>
                                                                    </div>
                                                                    <div class="b-goods__footer">
                                                                        <div class="b-goods__price">
                                                                                <span class="new-price">
                                                                                    <?php
                                                                                    if (is_numeric($row['Product']['price'])) {
                                                                                        if ($row['Product']['price'] > 999) {
                                                                                            echo number_format($row['Product']['price']) . ' đ';
                                                                                        } else {
                                                                                            echo $row['Product']['price'] . ' đ';
                                                                                        }
                                                                                    } else {
                                                                                        echo $row['Product']['price'];
                                                                                    }
                                                                                    ?>
                                                                                </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $dem++;
                                            unset($list_productnb[$k]);
                                            if ($dem == 4) break;
                                        }
                                        echo '</div>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php foreach ($listincn as $val) { ?>
    <section class="awe-section-6">
        <div class="section_customer">
            <div class="main-width">
                <h2 class="text-center ttnew">
                    <a href="<?php echo DOMAIN . $val['link']; ?>"
                       title="<?php echo $val['name']; ?>"><?php echo $val['name']; ?></a></h2>
                <div id="myCarousel11" class="carousel slide">
                    <ol class="carousel-indicators">
                        <?php
                        $num_page = ceil(count($val['list']) / 4);
                        for ($i = 0; $i < $num_page; $i++) {
                            $dem = 0;
                            ?>
                            <li data-target="#myCarousel11" data-slide-to="<?php echo $i; ?>"
                                class="<?php if (!$i) echo 'active '; ?>"></li>
                            <?php $dem++;
                        } ?>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <?php
                        $num_page = ceil(count($val['list']) / 4);
                        for ($i = 0; $i < $num_page; $i++) {
                            $dem = 0;
                            ?>
                            <div class="<?php if (!$i) echo 'active '; ?>item">
                                <section class="awe-section-9 listnew">
                                    <div class="main-width">
                                        <div class="row-fluid">
                                            <div class="span12">

                                                <?php
                                                echo '<div class="row-fluid">';
                                                foreach ($val['list'] as $k => $row) { ?>
                                                    <div class="span3">
                                                        <a href="<?php echo DOMAIN . $row['Post']['link']; ?>.htm"
                                                           title="<?php echo $row['Post']['name'] ?>"
                                                           class="clearfix evo-item-blogs"
                                                           tabindex="0">
                                                            <div class="evo-article-image">
                                                                <img src="<?php echo DOMAIN; ?>img/w357/h265/fill!<?php echo $row['Post']['images'] ?>"
                                                                     alt="<?php echo $row['Post']['name'] ?>"
                                                                     title="<?php echo $row['Post']['name'] ?>"
                                                                     class="">
                                                            </div>
                                                            <h3 class="line-clamp"><?php echo $row['Post']['name'] ?></h3>
                                                            <p><?php echo shortDesc($row['Post']['shortdes'], 100) ?></p>
                                                        </a>
                                                    </div>
                                                    <?php $dem++;
                                                    unset($val['list'][$k]);
                                                    if ($dem == 4) break;
                                                }
                                                echo '</div>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <?php
                        } ?>
                    </div>
                    <!-- Carousel nav -->
                    <!--                <a class="carousel-control left" href="#myCarousel11" data-slide="prev">&lsaquo;</a>-->
                    <!--                <a class="carousel-control right" href="#myCarousel11" data-slide="next">&rsaquo;</a>-->
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<?php foreach ($listproduct as $val) { ?>
    <section class="awe-section-3">
        <div class="main-width section_product_best_sell">
            <div class="row-fluid">
                <div class="span12">
                    <div class="section_product clearfix">
                        <div class="section-head clearfix">
                            <h2 class="title_blog"><?php echo $val['name']; ?></h2>
                        </div>
                        <div class="e-tabs not-dqtab ajax-tab-2" data-section="ajax-tab-2" data-view="grid_4">
                            <div class="content">
                            <span class="hidden-md hidden-lg button_show_tab">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                                <div class="tab-1 tab-content current">
                                    <div class="slick_ajax_tab products-view-grid">
                                        <?php
                                        $num_page = ceil(count($val['list']) / 4);
                                        for ($i = 0; $i < $num_page; $i++) {
                                            $dem = 0;
                                            echo '<div class="row-fluid">';
                                            foreach ($val['list'] as $k => $row) { ?>
                                                <div class="span3">
                                                    <div class="evo-product-car b-goods_back_sm">
                                                        <div class="flip-container">
                                                            <div class="flipper">
                                                                <div class="flip__front">
                                                                    <div class="b-goods__img">
                                                                        <a href="<?php echo DOMAIN . $row['Product']['link']; ?>.html"
                                                                           title="<?php echo $row['Product']['name'] ?>">
                                                                            <img class="img-responsive center-block lazy loaded"
                                                                                 src="<?php echo DOMAIN; ?>img/w357/h395/fill!<?php echo $row['Product']['images'] ?>"
                                                                                 title="<?php echo $row['Product']['name'] ?>"
                                                                                 alt="<?php echo $row['Product']['name'] ?>">
                                                                        </a>
                                                                    </div>
                                                                    <div class="b-goods__inner">
                                                                        <div class="b-goods__name">
                                                                            <a href="<?php echo DOMAIN . $row['Product']['link']; ?>.html"
                                                                               title="<?php echo $row['Product']['name'] ?>">
                                                                                <?php echo $row['Product']['name'] ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="b-goods__footer">
                                                                            <div class="b-goods__price">
                                                                                <span class="new-price">
                                                                                    <?php
                                                                                    if (is_numeric($row['Product']['price'])) {
                                                                                        if ($row['Product']['price'] > 999) {
                                                                                            echo number_format($row['Product']['price']) . ' đ';
                                                                                        } else {
                                                                                            echo $row['Product']['price'] . ' đ';
                                                                                        }
                                                                                    } else {
                                                                                        echo $row['Product']['price'];
                                                                                    }
                                                                                    ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $dem++;
                                                unset($val['list'][$k]);
                                                if ($dem == 4) break;
                                            }
                                            echo '</div>';
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php foreach ($listintt as $val) { ?>
    <section class="awe-section-9">
        <div class="main-width">
            <div class="row-fluid">
                <div class="span12">
                    <h2 class="text-center">
                        <a href="<?php echo DOMAIN . $val['link']; ?>"
                           title="<?php echo $val['name']; ?>"><?php echo $val['name']; ?></a>
                    </h2>

                    <div class="row-fluid">
                        <?php foreach ($val['list'] as $k => $row) { ?>
                            <div class="span3">
                                <a href="<?php echo DOMAIN . $row['Post']['link']; ?>.htm"
                                   title="<?php echo $row['Post']['name'] ?>"
                                   class="clearfix evo-item-blogs"
                                   tabindex="0">
                                    <div class="evo-article-image">
                                        <img src="<?php echo DOMAIN; ?>img/w357/h265/fill!<?php echo $row['Post']['images'] ?>"
                                             alt="<?php echo $row['Post']['name'] ?>"
                                             title="<?php echo $row['Post']['name'] ?>"
                                             class="">
                                    </div>
                                    <h3 class="line-clamp"><?php echo $row['Post']['name'] ?></h3>
                                    <p><?php echo shortDesc($row['Post']['shortdes'], 100) ?></p>
                                </a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="text-center">
                        <a href="<?php echo DOMAIN . $val['link']; ?>" title="Xem tất cả"
                           class="evo-button mobile-viewmore">Xem tất cả</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php } ?>