<div class="contact margin-bottom-20 page-contact margin-top-30">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-login">

                    <h2 class="title-head text-center">Gửi thông tin</h2>

                    <span class="text-contact block text-center">Bạn hãy điền nội dung tin nhắn vào form dưới đây và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn sau khi nhận được.</span>
                    <form accept-charset="UTF-8" action="<?php echo DOMAIN; ?>contact/send" id="check_form" method="post" class="has-validation-callback">
                        <div class="form-signup clearfix">
                            <div class="row-fluid">
                                <div class="span6">
                                    <fieldset class="form-group">
                                        <label>Họ và tên<span class="required">*</span></label>
                                        <input placeholder="Nhập họ và tên" type="text" name="name" id="name" class="form-control  form-control-lg" data-validation-error-msg="Không được để trống" data-validation="required" required="">
                                    </fieldset>
                                </div>
                                <div class="span6">
                                    <fieldset class="form-group">
                                        <label>Email<span class="required">*</span></label>
                                        <input placeholder="Nhập địa chỉ Email" type="email" name="email" data-validation="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" data-validation-error-msg="Email sai định dạng" id="email" class="form-control form-control-lg" required="">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row-fluid form1">
                                <div class="span12">
                                    <fieldset class="form-group">
                                        <label>Điện thoại<span class="required">*</span></label>
                                        <input placeholder="Nhập số điện thoại" type="tel" name="phone" data-validation="tel" data-validation-error-msg="Không được để trống" id="tel" class="number-sidebar form-control form-control-lg" required="">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row-fluid form1">
                                <div class="span12">
                                    <fieldset class="form-group">
                                        <label>Nội dung<span class="required">*</span></label>
                                        <textarea placeholder="Nội dung liên hệ" name="content" id="comment" class="form-control form-control-lg" rows="5" data-validation-error-msg="Không được để trống" data-validation="required" required=""></textarea>
                                    </fieldset>
                                    <div class="pull-xs-left" style="margin-top:20px;">
                                        <button type="submit" class="btn btn-blues btn-style btn-style-active smf">Gửi tin nhắn</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-map">
                    <div class="page-login text-center">
                        <h3 class="title-head">Bản đồ</h3>
                    </div>
                    <div class="box-maps margin-bottom-10 googlemap">
                        <?php echo $setting['googlemap'];?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>