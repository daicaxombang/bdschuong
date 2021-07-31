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
    
    
		<h3>Thêm sản phẩm</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <?php echo $this->Form->create(null, array('url' => DOMAINAD.strtolower(basename(dirname(__FILE__))).'/add', 'type' => 'post','enctype'=>'multipart/form-data', 'name' => 'adminForm', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
                <table class="input">
                    <tr>
                        <td class="label">Name</td>
                        <td><?php echo $this->Form->input('Support.name',array('class'=>'text-input medium-input'));?></td>
                    </tr>
                    <tr>
                        <td class="label">Phone</td>
                        <td><?php echo $this->Form->input('Support.phone',array('class'=>'text-input medium-input'));?></td>
                    </tr>
                    <tr style="display: none;">
                        <td class="label">Yahoo hỗ trợ</td>
                        <td><?php echo $this->Form->input('Support.yahoo',array('class'=>'text-input medium-input'));?></td>
                    </tr>
                    <tr>
                        <td class="label">Skype hỗ trợ</td>
                        <td><?php echo $this->Form->input('Support.skype',array('class'=>'text-input medium-input'));?></td>
                    </tr>
                    <tr>
                        <td class="label">Email hỗ trợ</td>
                        <td><?php echo $this->Form->input('Support.email',array('class'=>'text-input medium-input'));?></td>
                    </tr>
                    <tr style="display: none;">
	                    <td class="label">Hình ảnh đại diện:</td>
	                    <td><?php echo $this->Form->input('Support.images',array('type'=>'file', 'accept'=>'image/gif,image/jpeg,image/png'));?></td>
	                </tr>
                    <tr>
                        <td class="label">Trạng thái:</td>
                        <td><?php echo $this->Form->input('Support.status',array('type'=>'radio','separator'=> '&nbsp;&nbsp;&nbsp;','options' => array('0'=>'Chưa Active', '1'=>'Đã Active'),'default'=>'1' ));?></td>
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
	
	<li><a class="shortcut-button png48-cancel" href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>"><span class="png_bg">
		Hủy
	</span></a></li>

</ul><!-- End .shortcut-buttons-set -->

<div class="clear"></div>