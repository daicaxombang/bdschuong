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
    
    
		<h3>Cập nhật tài khoản</h3>


		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <?php echo $this->Form->create(null, array('url' => DOMAINAD . strtolower(basename(dirname(__FILE__))).'/edit_pass', 'type' => 'post', 'name' => 'adminForm', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
            <?php echo $this->Form->input('Account.id', array()); ?>
            <table class="input">
                <?php 
                $user_id = $this->Session->read("id");
                if($user_id != 1 || $user_id==$this->request->data['Account']['id']){?>
                <tr>
                   	<td class="label">Mật khẩu hiện tại:</td>
                    <td>
                        <?php echo $this->Form->input('Account.confirm_password', array('class' => 'text-input medium-input', 'type' => 'password')); ?>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                   	<td class="label">Mật khẩu mới:</td>
                    <td>
                        <?php echo $this->Form->input('Account.password_new', array('class' => 'text-input medium-input', 'type' => 'password')); ?>
                    </td>
                </tr>
                <tr>
                   	<td class="label">Nhập lại mật khẩu mới:</td>
                    <td>
                        <?php echo $this->Form->input('Account.repassword_new', array('class' => 'text-input medium-input', 'type' => 'password', 'maxlength' => '250', 'id' => 'pass3')); ?>
                    </td>
                </tr>
            </table>
            <?php echo $this->Form->end(); ?>
            <div class="clear"></div>
		</div> <!-- End #tab1 -->       
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->