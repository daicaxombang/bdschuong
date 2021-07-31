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
                    <form class="form-horizontal" method="post">
                        <div class="control-group">
                            <label class="control-label">Tên đăng nhập: </label>
                            <div class="controls">
                                <input type="text" name="username" placeholder="Tên đăng nhập" required=""/>
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
                                <input type="submit" class="btn btn-primary btn-small" value="Gửi xác nhận" />
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