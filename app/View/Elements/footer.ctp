<footer class="footer bg-footer">
    <div class="site-footer">
        <div class="main-width">
            <div class="footer-inner padding-bottom-20">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="top-info-footer">
                            <ul class="contact-group">
                                <li class="item">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="detail">
                                        <p class="title">Hotline (24/7)</p>
                                        <p class="link">
                                            <a href="tel:<?php echo $setting['hotline']; ?>"><?php echo $setting['hotline']; ?></a>
                                        </p>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="detail">
                                        <p class="title">Chăm sóc khách hàng</p>
                                        <p class="link">
                                            <a href="tel:<?php echo $setting['telephone']; ?>"><?php echo $setting['telephone']; ?></a>
                                        </p>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="detail">
                                        <p class="title">Email hỗ trợ</p>
                                        <p class="link">
                                            <a href="mailto:<?php echo $setting['email1']; ?>"><?php echo $setting['email1']; ?></a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5">
                        <div class="footer-widget footer-contact">
                            <h3>Evo Car</h3>
                            <ul class="list-menu">
                                <li><?php echo $setting['footer']; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="footer-widget had-click">
                            <h3>Menu <span class="Collapsible__Plus"></span></h3>
                            <ul class="list-menu has-click">

                                <?php echo $app_menu; ?>

                            </ul>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="footer-widget footer-subcrible">
                            <h3>Đăng ký nhận tin</h3>
                            <p>Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều hơn nữa.</p>
                            <form action="<?php echo DOMAIN;?>register-email"
                                  method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                  class="has-validation-callback">
                                <div class="input-group">
                                    <input type="email" class="form-control" value="" placeholder="Email của bạn"
                                           name="email" id="mail">
                                    <span class="input-group-btn">
										<button class="btn btn-default" name="subscribe" id="subscribe" type="submit">Đăng ký</button>
									</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span>© Bản quyền thuộc về <b><?php echo $setting['name']; ?></b></span>
                </div>
            </div>
            <div class="back-to-top show" title="Lên đầu trang"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
        </div>
    </div>
</footer>

<?php echo $this->element('run-right'); ?>