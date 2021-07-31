<footer class="footer bg-footer">
    <div class="site-footer">
        <div class="main-width">
            <div class="footer-inner padding-bottom-20">
                <!--                <div class="row-fluid">-->
                <!--                    <div class="span12">-->
                <!--                        <div class="top-info-footer">-->
                <!--                            <ul class="contact-group">-->
                <!--                                <li class="item">-->
                <!--                                    <div class="icon">-->
                <!--                                        <i class="fa fa-phone"></i>-->
                <!--                                    </div>-->
                <!--                                    <div class="detail">-->
                <!--                                        <p class="title">Hotline (24/7)</p>-->
                <!--                                        <p class="link">-->
                <!--                                            <a href="tel:-->
                <?php //echo $setting['hotline']; ?><!--">--><?php //echo $setting['hotline']; ?><!--</a>-->
                <!--                                        </p>-->
                <!--                                    </div>-->
                <!--                                </li>-->
                <!--                                <li class="item">-->
                <!--                                    <div class="icon">-->
                <!--                                        <i class="fa fa-phone"></i>-->
                <!--                                    </div>-->
                <!--                                    <div class="detail">-->
                <!--                                        <p class="title">Chăm sóc khách hàng</p>-->
                <!--                                        <p class="link">-->
                <!--                                            <a href="tel:-->
                <?php //echo $setting['telephone']; ?><!--">--><?php //echo $setting['telephone']; ?><!--</a>-->
                <!--                                        </p>-->
                <!--                                    </div>-->
                <!--                                </li>-->
                <!--                                <li class="item">-->
                <!--                                    <div class="icon">-->
                <!--                                        <i class="fa fa-envelope"></i>-->
                <!--                                    </div>-->
                <!--                                    <div class="detail">-->
                <!--                                        <p class="title">Email hỗ trợ</p>-->
                <!--                                        <p class="link">-->
                <!--                                            <a href="mailto:-->
                <?php //echo $setting['email1']; ?><!--">--><?php //echo $setting['email1']; ?><!--</a>-->
                <!--                                        </p>-->
                <!--                                    </div>-->
                <!--                                </li>-->
                <!--                            </ul>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
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
                            <p style="padding-bottom: 10px;">Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều
                                hơn nữa.</p>
                            <form action="<?php echo DOMAIN; ?>register-email"
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
        </div>
    </div>
</footer>

<?php echo $this->element('run-right'); ?>

<style>.fb-livechat, .fb-widget {
        display: none
    }

    .ctrlq.fb-button, .ctrlq.fb-close {
        position: fixed;
        left: 24px;
        cursor: pointer
    }

    .ctrlq.fb-button {
        z-index: 999;
        background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
        width: 60px;
        height: 60px;
        text-align: center;
        bottom: 30px;
        border: 0;
        outline: 0;
        border-radius: 60px;
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        -ms-border-radius: 60px;
        -o-border-radius: 60px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
        -webkit-transition: box-shadow .2s ease;
        background-size: 80%;
        transition: all .2s ease-in-out
    }

    .ctrlq.fb-button:focus, .ctrlq.fb-button:hover {
        transform: scale(1.1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)
    }

    .fb-widget {
        background: #fff;
        z-index: 1000;
        position: fixed;
        width: 360px;
        height: 435px;
        overflow: hidden;
        opacity: 0;
        bottom: 0;
        left: 24px;
        border-radius: 6px;
        -o-border-radius: 6px;
        -webkit-border-radius: 6px;
        box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
    }

    .fb-credit {
        text-align: center;
        margin-top: 8px
    }

    .fb-credit a {
        transition: none;
        color: #bec2c9;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        text-decoration: none;
        border: 0;
        font-weight: 400
    }

    .ctrlq.fb-overlay {
        z-index: 0;
        position: fixed;
        height: 100vh;
        width: 100vw;
        -webkit-transition: opacity .4s, visibility .4s;
        transition: opacity .4s, visibility .4s;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, .05);
        display: none
    }

    .ctrlq.fb-close {
        z-index: 4;
        padding: 0 6px;
        background: #365899;
        font-weight: 700;
        font-size: 11px;
        color: #fff;
        margin: 8px;
        border-radius: 3px
    }

    .ctrlq.fb-close::after {
        content: "X";
        font-family: sans-serif
    }

    .bubble {
        width: 20px;
        height: 20px;
        background: #c00;
        color: #fff;
        position: absolute;
        z-index: 999999999;
        text-align: center;
        vertical-align: middle;
        top: -2px;
        left: 45px;
        border-radius: 50%;
    }

    .bubble-msg {
        width: 120px;
        left: 70px;
        top: 5px;
        position: relative;
        background: rgba(59, 89, 152, .8);
        color: #fff;
        padding: 5px 8px;
        border-radius: 8px;
        text-align: center;
        font-size: 13px;
    }</style>
<div class="fb-livechat">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-page" data-href="<?php echo $setting['facebook']; ?>" data-tabs="messages"
             data-width="360" data-height="400" data-small-header="true" data-hide-cover="true"
             data-show-facepile="false"></div>
        <div class="fb-credit"><a href="<?php echo DOMAIN;?>" target="_blank">Powered by TT</a></div>
        <div id="fb-root"></div>
    </div>
    <a href="<?php echo $setting['linkme']; ?>" title="Gửi tin nhắn cho chúng tôi qua Facebook"
       class="ctrlq fb-button">
        <div class="bubble">1</div>
        <div class="bubble-msg">Bạn cần hỗ trợ?</div>
    </a></div>
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>jQuery(document).ready(function ($) {
        function detectmob() {
            if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                return true;
            } else {
                return false;
            }
        }

        var t = {delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")};
        setTimeout(function () {
            $("div.fb-livechat").fadeIn()
        }, 8 * t.delay);
        if (!detectmob()) {
            $(".ctrlq").on("click", function (e) {
                e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({
                    bottom: 0,
                    opacity: 0
                }, 2 * t.delay, function () {
                    $(this).hide("slow"), t.button.show()
                })) : t.button.fadeOut("medium", function () {
                    t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)
                })
            })
        }
    });</script>

<style type="text/css">
    .call-now-button {
        left: 18pt;
        bottom: 18pt;
        z-index: 9999;
        clear: both;
        margin: 0 auto;
        position: fixed;
        border-radius: 50px;
        background: #e6944d
    }

    @media screen and (max-width: 680px) {
        .call-now-button {
            left: 30px;
            top: auto;
            bottom: 80px
        }

        .call-now-button .call-text {
            display: none
        }
    }

    .call-now-button div p {
        color: #fff;
        display: table;
        padding: 10px;
        border-radius: 21px;
        height: 34px;
        line-height: 14px;
        font-size: 14px;
        margin: 8px 5px 8px 50px;
        text-transform: uppercase;
        font-weight: 400;
        text-align: center;
        text-decoration: none !important;
        box-sizing: border-box
    }

    @keyframes quick-alo-circle-anim {
        0% {
            transform: rotate(0) scale(.5) skew(1deg);
            opacity: .1
        }
        30% {
            transform: rotate(0) scale(.7) skew(1deg);
            opacity: .5
        }
        to {
            transform: rotate(0) scale(1) skew(1deg);
            opacity: .1
        }
    }

    .quick-alo-ph-circle.active {
        width: 130px;
        height: 130px;
        top: -40px;
        left: -40px;
        position: absolute;
        background-color: transparent;
        border-radius: 100%;
        border: 2px solid rgba(30, 30, 30, .4);
        opacity: 1;
        animation: quick-alo-circle-anim 1.2s infinite ease-in-out;
        transition: all .5s;
        transform-origin: 50% 50%
    }

    @keyframes quick-alo-circle-fill-anim {
        0% {
            transform: rotate(0) scale(.7) skew(1deg);
            opacity: .2
        }
        50% {
            transform: rotate(0) scale(1) skew(1deg);
            opacity: .2
        }
        to {
            transform: rotate(0) scale(.7) skew(1deg);
            opacity: .2
        }
    }

    .quick-alo-ph-circle-fill.active {
        width: 80px;
        height: 80px;
        top: -15px;
        left: -15px;
        position: absolute;
        background-color: #000;
        border-radius: 100%;
        border: 2px solid transparent;
        opacity: 1;
        animation: quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
        transition: all .5s;
        transform-origin: 50% 50%
    }

    @keyframes quick-alo-circle-img-anim {
        0% {
            transform: rotate(0) scale(1) skew(1deg)
        }
        10% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }
        20% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }
        30% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }
        40% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }
        50% {
            transform: rotate(0) scale(1) skew(1deg)
        }
        to {
            transform: rotate(0) scale(1) skew(1deg)
        }
    }

    .quick-alo-phone-img-circle.shake {
        width: 50px;
        height: 50px;
        top: 0;
        left: 0;
        position: absolute;
        border-radius: 100%;
        border: 2px solid transparent;
        opacity: 1;
        background: #ffaa61 url(../images/quick-call-button-phone.png) no-repeat 50%;
        animation: quick-alo-circle-img-anim 1s infinite ease-in-out;
        transform-origin: 50% 50%
    }

    .call-now-button.zalo-call {
        bottom: 135px;
        background: #0b83cd;
    }

    .call-now-button.zalo-call .quick-alo-phone-img-circle.shake {
        background: #0a83cc url(https://kemdakb.vn/images/icon-zalo.png) no-repeat 50%;
    }

    @media screen and (max-width: 680px) {
        .call-now-button.zalo-call {
            bottom: 160px;
        }
    }

    figcaption {
        display: none;
    }

</style>
<div class="call-now-button zalo-call">
    <div><p class="call-text">Chat Zalo</p><a targer="_blank" href="https://zalo.me/<?php echo $setting['hotline']; ?>"
                                              title="Chat Zalo">
            <div class="quick-alo-ph-circle active"></div>
            <div class="quick-alo-ph-circle-fill active"></div>
            <div class="quick-alo-phone-img-circle shake"></div>
        </a></div>
</div>
