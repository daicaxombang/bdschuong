<div class="b-bar-home">
    <a href="#" title="<?php echo $title_for_layout;?>">
        <h1><?php echo $title_for_layout;?></h1>
    </a>
</div>

<div class="border-content-home padding-ct">
    <div class="box-titlecat box-extent">
        <div class="box-content">
            <div class="box-user">
                <div class="row-fluid">
                    <?php echo $this->Session->flash(); ?>
                    <form class="form-horizontal" method="post" action="">
                        <div class="control-group">
                            <label class="control-label">Tên đầy đủ</label>
                            <div class="controls">
                                <input type="text" value="<?php if($this->request->data['User']['fullname']) echo $this->request->data['User']['fullname'];?>" class="span6" name="fullname" placeholder="Tên đầy đủ" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input type="email" value="<?php if($this->request->data['User']['email']) echo $this->request->data['User']['email'];?>" class="span6" name="email" placeholder="Email" required="" /> <span style="color: red; font-weight: bold;">*</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Địa chỉ</label>
                            <div class="controls">
                                <input type="text" value="<?php if($this->request->data['User']['address']) echo $this->request->data['User']['address'];?>" class="span6" name="address" placeholder="Địa chỉ" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Điện thoại</label>
                            <div class="controls">
                                <input type="text" value="<?php if($this->request->data['User']['phone']) echo $this->request->data['User']['phone'];?>" class="span6" name="phone" placeholder="Điện thoại" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Mobile</label>
                            <div class="controls">
                                <input type="text" value="<?php if($this->request->data['User']['telephone']) echo $this->request->data['User']['telephone'];?>" class="span6" name="telephone" placeholder="Mobile" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Captcha: </label>
                            <div class="controls">
                                <input type="text" name="captcha" id="inputPassword" class="span2" placeholder="captcha" required="" /><img id="img_CAPTCHA_RESULT_send" style="width: 150px;" src="<?php echo DOMAIN;?>captcha" alt="" noloaderror="1" /><img id="reloadCaptcha" class="reloadCapcha" onmouseover="this.style.cursor='pointer'" onclick="img_reload();" title="Đổi mã an toàn" alt="renew capcha" src="<?php echo DOMAIN;?>images/icon-reload.png" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" class="btn btn-primary btn-small" value="Đổi thông tin" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clear-main"></div>
        </div><!--end box-content-->
    </div><!--end box-titlecat-->
</div>

<script type="text/javascript">
    function img_reload(){
    	document.getElementById("img_CAPTCHA_RESULT_send").src = document.getElementById("img_CAPTCHA_RESULT_send").src.split("?")[0] + "?"+Math.random();;
    }
</script> 