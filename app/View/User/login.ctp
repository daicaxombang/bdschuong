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
                            <label class="control-label">Mật khẩu: </label>
                            <div class="controls">
                                <input type="password" name="password" placeholder="Mật khẩu" required=""/>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" class="btn btn-primary btn-small" value="Đăng nhập" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clear-main"></div>
        </div><!--end box-content-->
    </div><!--end box-titlecat-->
</div>