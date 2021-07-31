<!-- Page Head -->
<!-----------------------------------
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 ------------------------------------>

 
<ul style="float: right;" class="shortcut-buttons-set">
	
	<li><a class="shortcut-button png48-save" href="javascript:void(0);" onclick="javascript:document.adminForm.submit();"><span class="png_bg">
		Lưu
	</span></a></li>
	
	<li><a class="shortcut-button png48-info" href="#messages"><span class="png_bg">
		Trợ giúp
	</span></a></li>
	
	<li><a class="shortcut-button png48-cancel" href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>"><span class="png_bg">
		Hủy
	</span></a></li>

</ul><!-- End .shortcut-buttons-set -->

<div class="clear"></div> <!-- End .clear -->


<?php echo $this->Session->flash(); ?>


<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
    
    
		<h3>Thêm tài khoản</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <?php echo $this->Form->create(null, array('url' => DOMAINAD . strtolower(basename(dirname(__FILE__))).'/add', 'type' => 'post','enctype'=>'multipart/form-data', 'name' => 'adminForm', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
            <table class="input">
               	<tr>
                   	<td class="label">Tên đăng nhập:</td>
                    <td>
                        <?php echo $this->Form->input('Account.name', array('label' => '', 'class' => 'text-input medium-input datepicker', 'maxlength' => '250', 'id' => 'name')); ?>
                    </td>
                </tr>
                <tr>
                   	<td class="label">Email:</td>
                    <td>
                        <?php echo $this->Form->input('Account.email', array('label' => '', 'class' => 'text-input medium-input datepicker', 'maxlength' => '250', 'id' => 'email')); ?>
                    </td>
                </tr>
                <tr>
                   	<td class="label">Mật khẩu:</td>
                    <td>
                        <?php echo $this->Form->input('Account.password', array('label' => '', 'class' => 'text-input medium-input datepicker', 'type' => 'password', 'maxlength' => '250', 'id' => 'pass1')); ?>
                    </td>
                </tr>
                <tr>
                   	<td class="label">Nhập lại mật khẩu:</td>
                    <td>
                        <?php echo $this->Form->input('Account.repassword', array('label' => '', 'class' => 'text-input medium-input datepicker', 'type' => 'password', 'maxlength' => '250', 'id' => 'pass2')); ?>
                    </td>
                </tr>
            </table>
            <?php echo $this->Form->end(); ?>
            <div class="clear"></div>
		</div> <!-- End #tab1 -->      
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->