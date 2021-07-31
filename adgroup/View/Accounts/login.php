<style type="text/css">
    body{
        background: url('http://ctkgroup.com.vn/images/bg-ctk-admin.png') center;
    }
</style>
<section class="main">
    <?php echo $this->Form->create(null, array('type' => 'post', 'name'=>'image', 'class' => 'form-2')); ?>
		<h1><span class="log-in">Đăng nhập</span><!-- or <span class="sign-up">sign up</span>--></h1>
		<div class="float">
			<label for="login"><i class="icon-user"></i>Username</label>
            <?php echo $this->Form->input('Account.name',array( 'label' => '', 'placeholder' => 'Username'));?>
		</div>
		<div class="float">
			<label for="password"><i class="icon-lock"></i>Password</label>
            <?php echo $this->Form->input('Account.password',array( 'label' => '','type'=>'password','class'=>'showpassword', 'placeholder' => 'Password'));?>
		</div>
		<p class="clearfix"> 
			<a href="<?php echo DOMAIN;?>" class="log-twitter">Quay lại</a>    
			<input type="submit" name="submit" value="Đăng nhập" />
		</p>
        <?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->end(); ?>
</section>