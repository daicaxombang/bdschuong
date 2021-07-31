<section class="awe-section-3">
    <div class="main-width section_product_best_sell">
        <div class="row-fluid">
            <div class="span12">
                <div class="section_product clearfix">
                    <div class="section-head clearfix">
                        <h1 class="title_blog">
                            <?php echo $title_for_layout; ?> <?php if ($this->request->params['action'] == 'timkiem') { ?>
                                <span style="text-transform: none;">
                                (<?php if ($this->Session->check('tukhoa')) echo $this->Session->read('tukhoa'); ?>
                                )</span><?php } ?>
                        </h1>
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
                                    $num_page = ceil(count($listnews) / 4);
                                    for ($i = 0; $i < $num_page; $i++) {
                                        $dem = 0;
                                        echo '<div class="row-fluid">';
                                        foreach ($listnews as $k => $row) { ?>
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
                                            unset($listnews[$k]);
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

<?php if ($this->Paginator->numbers()) { ?>
    <div class="pagination">
        <?php
        echo $this->Paginator->first('« Đầu');
        echo $this->Paginator->prev('« Trước', null, null, array('class' => 'disabled'));
        echo $this->Paginator->numbers(
            array(
                'before' => null,
                'after' => null,

                'tag' => 'span',
                'class' => 'number',
                'modulus' => '6',
                'separator' => null,
                'first' => 2,
                'last' => 2,
                'ellipsis' => '...',
                'currentClass' => 'current',
                'currentTag' => null
            )
        );
        echo $this->Paginator->next('Tiếp »');
        echo $this->Paginator->last('Cuối »');
        echo $this->Paginator->counter('Trang {:page}/{:pages}. Đang xem {:current}/{:count}.');
        ?>
    </div>
<?php } ?>
<div class="clear-main"></div>