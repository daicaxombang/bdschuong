<div class="new-line">
    <ul>
        <li>Tin mới:</li>
        <li id="change-post">
            <a href="" title="">
                Phong thuỷ nhà hướng Tây Nam và căn biệt thự của tỷ phú Bill Gates
            </a>
        </li>
    </ul>
</div>

<section class="awe-section-3">
    <div class="section_product_best_sell">
        <div class="row-fluid">
            <div class="span12">
                <div class="section_product clearfix">
                    <div class="section-head clearfix">
                        <h2 class="title_blog">Sản phẩm nổi bật</h2>
                    </div>
                    <div class="b-content-news">
                        <?php
                        $num_page = ceil(count($list_productnb) / 3);
                        for ($i = 0;
                             $i < $num_page;
                             $i++) {
                            $dem = 0;
                            echo '<div class="row-fluid">';
                            foreach ($list_productnb

                                     as $k => $row) { ?>
                                <div class="span4">
                                    <div class="b-item-new">
                                        <div class="b-img">
                                            <a href="<?php echo DOMAIN . $row['Product']['link']; ?>.html"
                                               title="<?php echo $row['Product']['name'] ?>">
                                                <img class="img-responsive center-block lazy loaded"
                                                     src="<?php echo DOMAIN; ?>img/w350/h290/fill!<?php echo $row['Product']['images'] ?>"
                                                     title="<?php echo $row['Product']['name'] ?>"
                                                     alt="<?php echo $row['Product']['name'] ?>">
                                            </a>
                                        </div>
                                        <div class="b-name">
                                            <h3>
                                                <a href="<?php echo DOMAIN . $row['Product']['link']; ?>.html"
                                                   title="<?php echo $row['Product']['name'] ?>">
                                                    <?php echo $row['Product']['name'] ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="b-status">
                                            ĐANG PHÂN PHỐI
                                        </div>
                                    </div>
                                </div>
                                <?php $dem++;
                                unset($list_productnb[$k]);
                                if ($dem == 3) break;
                            }
                            echo '</div>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>