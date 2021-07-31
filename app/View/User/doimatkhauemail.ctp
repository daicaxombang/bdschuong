<div class="b-cat">
    <h1><?php echo $title_for_layout;?></h1>
</div>
<div class="box-titlecat box-extent">
    <div class="box-content">
        <div class="box-user">
            <div class="row-fluid">
                <?php echo $this->Session->flash(); ?>
                <form class="form-horizontal" method="post">
                    <div class="control-group">
                        <label class="control-label">Mật khẩu: </label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Mật khẩu" required=""/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nhập lại mật khẩu: </label>
                        <div class="controls">
                            <input type="password" name="re-password" placeholder="Nhập lại mật khẩu" required=""/>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" class="btn btn-primary btn-small" value="Đổi pass" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear-main"></div>
    </div><!--end box-content-->
</div><!--end box-titlecat-->