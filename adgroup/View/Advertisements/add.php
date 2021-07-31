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
	
	<li><a class="shortcut-button png48-cancel" href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/cancel"><span class="png_bg">
		Hủy
	</span></a></li>

</ul><!-- End .shortcut-buttons-set -->

<div class="clear"></div> <!-- End .clear -->


<?php echo $this->Session->flash(); ?>


<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
    
    
		<h3>Thêm advertisement</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <?php echo $this->Form->create(null, array('url' => DOMAINAD.strtolower(basename(dirname(__FILE__))).'/add', 'type' => 'post','enctype'=>'multipart/form-data', 'name' => 'adminForm', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
            <table class="input">
                <tr>
                    <td class="label">Link</td>
                    <td><?php echo $this->Form->input('Extention.name',array('class'=>'text-input medium-input','maxlength' => '250'));?></td>
                </tr>
                <!--<tr>
                    <td class="label">Thứ tự:</td>
                    <td><?php echo $this->Form->input('Extention.order', array('class' => 'text-input small-input')); ?></td>
                </tr>-->
                <!--<tr>
                    <td class="label">Video ifarme youtobe:</td>
                    <td><?php echo $this->Form->input('Extention.name',array('class'=>'text-input medium-input','maxlength' => '250'));?></td>
                </tr>-->
                <tr>
                    <td class="label">Chọn file:</td>
                    <td>
                        <?php echo $this->Form->input('Extention.images',array('type'=>'file', 'accept'=>'image/gif,image/jpeg,image/png,application/x-shockwave-flash'));?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Trạng thái:</td>
                    <td><?php echo $this->Form->input('Extention.status',array('type'=>'radio','separator'=> '&nbsp;&nbsp;&nbsp;','options' => array('0'=>'Chưa Active', '1'=>'Đã Active'),'default'=>'1'));?></td>
                </tr>
            </table>
            <?php echo $this->Form->end(); ?>
            <div class="clear"></div>
		</div> <!-- End #tab1 -->       
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->




<ul style="float: right;" class="shortcut-buttons-set">
	
	<li><a class="shortcut-button png48-save" href="javascript:void(0);" onclick="javascript:document.adminForm.submit();"><span class="png_bg">
		Lưu
	</span></a></li>
	
	<li><a class="shortcut-button png48-info" href="#messages"><span class="png_bg">
		Trợ giúp
	</span></a></li>
	
	<li><a class="shortcut-button png48-cancel" href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/cancel"><span class="png_bg">
		Hủy
	</span></a></li>

</ul><!-- End .shortcut-buttons-set -->

<div class="clear"></div>