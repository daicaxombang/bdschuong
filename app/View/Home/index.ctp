<?php if(!empty($tinmoi['Post']['id'])){?>
<div class="new-line">
    <ul>
        <li>Tin mới:</li>
        <li id="change-post">
            <a href="<?php echo DOMAIN.$tinmoi['Post']['link'];?>.html" title="<?php echo $tinmoi['Post']['name'];?>">
                <?php echo $tinmoi['Post']['name'];?>
            </a>
        </li>
    </ul>
</div>
<?php }?>

<section class="awe-section-3">
    <div class="section_product_best_sell">
        <div class="row-fluid">
            <div class="span12">
                <div class="section_product clearfix">
                    <div class="section-head clearfix">
                        <h2 class="title_blog">DỰ ÁN BẤT ĐỘNG SẢN ĐANG PHÂN PHỐI</h2>
                    </div>
                    <div class="b-content-news">
                        <?php
                        $num_page = ceil(count($list_post) / 3);
                        for ($i = 0;
                             $i < $num_page;
                             $i++) {
                            $dem = 0;
                            echo '<div class="row-fluid">';
                            foreach ($list_post as $k => $row) { ?>
                                <div class="span4">
                                    <div class="b-item-new">
                                        <div class="b-img">
                                            <a href="<?php echo DOMAIN . $row['Post']['link']; ?>.html"
                                               title="<?php echo $row['Post']['name'] ?>">
                                                <img class="img-responsive center-block lazy loaded"
                                                     src="<?php echo DOMAIN; ?>img/w350/h290/fill!<?php echo $row['Post']['images'] ?>"
                                                     title="<?php echo $row['Post']['name'] ?>"
                                                     alt="<?php echo $row['Post']['name'] ?>">
                                            </a>
                                        </div>
                                        <div class="b-name">
                                            <h3>
                                                <a href="<?php echo DOMAIN . $row['Post']['link']; ?>.html"
                                                   title="<?php echo $row['Post']['name'] ?>">
                                                    <?php echo $row['Post']['name'] ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="b-status">
                                            <?php echo !empty($row['Post']['is_service']) ? "SẮP MỞ BÁN" : "ĐANG PHÂN PHỐI";?>
                                        </div>
                                    </div>
                                </div>
                                <?php $dem++;
                                unset($list_post[$k]);
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