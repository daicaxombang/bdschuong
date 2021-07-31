<section class="awe-section-3">
    <div class="main-width section_product_best_sell">
        <div class="row-fluid">
            <div class="span12">
                <div class="section_product clearfix">
                    <div class="section-head clearfix">
                        <h1 class="title_blog">
                            <?php echo $detailNews['Product']['name'] ?>
                        </h1>
                    </div>

                    <div style="height: 25px;"></div>

                    <div class="padd-spcat">
                        <div class="b-product-list padd-b-product-list">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="border text-left">
                                        <div style="height: 480px; margin-bottom: 15px; text-align: center;">
                                            <img id="img_01"
                                                 src="<?php echo DOMAIN; ?>img/h480/fill!<?php echo $detailNews['Product']['images']; ?>"
                                                 data-zoom-image="<?php echo DOMAIN; ?>img/h1000/fill!<?php echo $detailNews['Product']['images']; ?>"
                                                 title="<?php echo $detailNews['Product']['name']; ?>"
                                                 alt="<?php echo $detailNews['Product']['name']; ?>"/>
                                        </div>
                                        <div id="gallery_01" style="text-align: center;">
                                            <a class="active" href="#"
                                               data-image="<?php echo DOMAIN; ?>img/h480/fill!<?php echo $detailNews['Product']['images']; ?>"
                                               data-zoom-image="<?php echo DOMAIN; ?>img/h1000/fill!<?php echo $detailNews['Product']['images']; ?>"
                                               title="<?php echo $detailNews['Product']['name']; ?>">
                                                <img id="img_01"
                                                     src="<?php echo DOMAIN; ?>img/w85/h85/fill!<?php echo $detailNews['Product']['images']; ?>"
                                                     title="<?php echo $detailNews['Product']['name']; ?>"
                                                     alt="<?php echo $detailNews['Product']['name']; ?>"/>
                                            </a>
                                            <?php
                                            $dem = 1;
                                            if ($detailNews['Product']['multiple']) {
                                                $img_multi = explode(",", $detailNews['Product']['multiple']);
                                                foreach ($img_multi as $k => $values) {
                                                    if ($values) {
                                                        ?>
                                                        <a href="#"
                                                           data-image="<?php echo DOMAIN; ?>img/h480/fill!<?php echo $values; ?>"
                                                           data-zoom-image="<?php echo DOMAIN; ?>img/h1000/fill!<?php echo $values; ?>"
                                                           title="<?php echo $detailNews['Product']['name']; ?>">
                                                            <img id="img_01"
                                                                 src="<?php echo DOMAIN; ?>img/w85/h85/fill!<?php echo $values; ?>"
                                                                 title="<?php echo $detailNews['Product']['name']; ?>"
                                                                 alt="<?php echo $detailNews['Product']['name']; ?>"/>
                                                        </a>
                                                        <?php $dem++;
                                                    }
                                                }
                                            } ?>
                                        </div>
                                    </div><!--end padding-detail-left-->

                                </div><!--end span5-->
                                <div class="span6">
                                    <form method="post" id="myForm"
                                          action="<?php echo DOMAIN; ?>mua-hang/<?php echo $detailNews['Product']['id']; ?>">
                                        <div class="box-detail-product">
                                            <h1 class="title"><?php echo $detailNews['Product']['name']; ?></h1>
                                            <div class="box-info-product" style="border: 0;">
                                                <div class="row-fluid">
                                                    <div class="span3"><?php echo $detailNews['Product']['name']; ?></div>
                                                    <div class="span9">
                                                        <div class="b-sogam">
                                                            <ul>
                                                                <?php if (!empty($detailNews['Product']['g'])) { ?>
                                                                    <li>
                                                                        <label>
                                                                            <input type="radio" name="gam" data-id="1"
                                                                                   data-price="<?php echo $detailNews['Product']['price']; ?>"
                                                                                   value="<?php echo $detailNews['Product']['g']; ?>"
                                                                                   checked/> <?php echo $detailNews['Product']['g']; ?>
                                                                        </label>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if (!empty($detailNews['Product']['g1'])) { ?>
                                                                    <li>
                                                                        <label>
                                                                            <input type="radio" name="gam" data-id="2"
                                                                                   data-price="<?php echo $detailNews['Product']['price2']; ?>"
                                                                                   value="<?php echo $detailNews['Product']['g1']; ?>"/> <?php echo $detailNews['Product']['g1']; ?>
                                                                        </label>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-info-product gggg" id="price1">
                                                <div class="row-fluid">
                                                    <div class="span3">Giá</div>
                                                    <div class="span9">
                                <span class="giagia">
                                    <?php
                                    if ($detailNews['Product']['price']) {
                                        if (is_numeric($detailNews['Product']['price'])) {
                                            echo number_format($detailNews['Product']['price'], '0') . ' <sup>vnđ</sup>';
                                        } else {
                                            echo $detailNews['Product']['price'] . ' <sup>vnđ</sup>';
                                        }
                                    } else {
                                        echo 'Liên hệ';
                                    }
                                    ?>
                                </span>
                                                    </div>
                                                </div>
                                            </div><!--end box-info-product-->
                                            <div class="box-info-product gggg" id="price2" style="display: none;">
                                                <div class="row-fluid">
                                                    <div class="span3">Giá</div>
                                                    <div class="span9">
                                <span class="giagia">
                                    <?php
                                    if ($detailNews['Product']['price2']) {
                                        if (is_numeric($detailNews['Product']['price2'])) {
                                            echo number_format($detailNews['Product']['price2'], '0') . ' <sup>vnđ</sup>';
                                        } else {
                                            echo $detailNews['Product']['price2'] . ' <sup>vnđ</sup>';
                                        }
                                    } else {
                                        echo 'Liên hệ';
                                    }
                                    ?>
                                </span>
                                                    </div>
                                                </div>
                                            </div><!--end box-info-product-->
                                            <input type="hidden" name="price" id="gban"
                                                   value="<?php echo $detailNews['Product']['price']; ?>"/>
                                            <input type="hidden" name="type" id="type" value="1"/>

                                            <div class="box-info-product">
                                                <div class="row-fluid">
                                                    <div class="span3">Mã</div>
                                                    <div class="span9"><?php echo $detailNews['Product']['code']; ?></div>
                                                </div>
                                            </div><!--end box-info-product-->
                                            <div class="box-info-product">
                                                <div class="row-fluid">
                                                    <div class="span3">Tình trạng</div>
                                                    <div class="span9"><?php if ($detailNews['Product']['tinhtrang']) echo 'Còn hàng'; else echo 'Hết hàng'; ?></div>
                                                </div>
                                            </div><!--end box-info-product-->

                                            <div class="box-info-product">
                                                <div class="row-fluid">
                                                    <div class="span3">Số lượng</div>
                                                    <div class="span9">
                                                        <div class="row-fluid">
                                                            <input type="number" name="soluong" class="span3"
                                                                   value="1"/>
                                                            <input type="submit" class="btn btn-danger btn-small"
                                                                   value="Mua ngay"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end box-info-product-->
                                            <div class="box-info-product">
                                                <div class="row-fluid">
                                                    <div class="span12 b-detail-if"><?php echo $detailNews['Product']['shortdes']; ?></div>
                                                </div>
                                            </div><!--end box-info-product-->
                                            <div class="position-relative">
                                                <div class="clear-content"></div>
                                                <div class="clear-content"></div>
                                                <script type="text/javascript"
                                                        src="https://apis.google.com/js/plusone.js"></script>
                                                <g:plusone></g:plusone>
                                                <div>
                                                    <div class="fb-like"
                                                         data-href="<?php echo DOMAIN . $detailNews['Product']['link']; ?>.html"
                                                         data-layout="button_count" data-action="like" data-show-faces="false"
                                                         data-share="true"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--end span7-->
                            </div>
                            <div class="clear-main"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('#myForm input').on('change', function () {
        var val = $('input[name=gam]:checked', '#myForm').val();
        var data = $('input[name=gam]:checked', '#myForm').data('id');
        var price = $('input[name=gam]:checked', '#myForm').data('price');
        // console.log(data);
        $('#gban').val(price);
        $('#type').val(data);
        $('.gggg').hide();
        $('#price' + data).show();
    });

</script>

<div style="height: 25px;"></div>

<div class="row-fluid">
    <div class="span12">
        <div class="box-tab-content-detail">
            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Nội dung</a></li>
                <!--<li><a href="#homevd" data-toggle="tab">Video</a></li>-->
<!--                <li class=""><a href="#profile2" data-toggle="tab">Bình luận</a></li>-->
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <div class="">
                        <div class="ct-tt"><?php echo $detailNews['Product']['content']; ?></div>
                    </div><!--end anhien-->
                </div>
                <!--<div class="tab-pane fade" id="homevd">
                    <div class="">
                        <div class="ct-tt"><?php //echo $detailNews['Product']['video'];?></div>
                    </div>
                </div>-->
<!--                <div class="tab-pane fade" id="profile2">-->
<!--                    <div class="box-comment">-->
<!---->
<!--                        <fb:comments-->
<!--                                href="--><?php //echo DOMAIN . $detailNews['Product']['link']; ?><!--.html"-->
<!--                                numposts="5"-->
<!--                                width="100%"></fb:comments>-->
<!--                    </div><!--end box-comment-->
<!--                </div>-->
            </div>
        </div><!--end box-tab-content-detail-->
        <div class="clear-content"></div>
        <div class="clear-content"></div>
        <div class="clear-content"></div>
    </div><!--end span12-->
</div>
<div class="clear-main"></div>

<?php
/*$mbm = 0;
$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
if (preg_match("/phone|iphone|itouch|ipod|ipad|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent)){
    $mbm = 1;
}*/
?>
<?php //if(!$mbm){?>
<link href="<?php echo DOMAIN; ?>ImageZoom/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>
<script src='<?php echo DOMAIN; ?>ImageZoom/jquery.elevateZoom-3.0.8.min.js'></script>
<script src='<?php echo DOMAIN; ?>ImageZoom/jquery.fancybox.js'></script>
<script>
    $("#img_01").elevateZoom({
        gallery: 'gallery_01',
        cursor: 'pointer',
        galleryActiveClass: 'active',
        scrollZoom: true
    });

    //pass the images to Fancybox
    $("#img_01").bind("click", function (e) {
        var ez = $('#img_01').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });
</script>
<?php //}?>
<style type="text/css">
    #gallery_01 img {
        border: 1px solid #ccc;
        opacity: 0.6;
        margin-bottom: 3px;
    }

    #gallery_01 a.active img {
        border: 1px solid #ccc;
        opacity: 1;
    }

    #gallery_01 .active img {
        border: 1px solid #333 !important;
    }
</style>