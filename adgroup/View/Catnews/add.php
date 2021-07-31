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


<?php echo $this->Form->create(null, array('url' => DOMAINAD.strtolower(basename(dirname(__FILE__))).'/add', 'type' => 'post', 'name' => 'adminForm', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
    
    
		<h3>Thêm nhóm</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <table class="input">
                <tr>
                    <td class="label">Tên nhóm</td>
                    <td><?php echo $this->Form->input('Catproduct.name', array('class' => 'text-input medium-input', 'maxlength' => '250')); ?></td>
                </tr>
                <tr>
                    <td class="label">Thuộc nhóm</td>
                    <td><?php echo $this->Form->input('Catproduct.parent_id', array('type'=>'select', 'options'=>$list_cat, 'empty' => '---Chọn nhóm---'));?></td>
                </tr>
                <tr>
                    <td class="label">Thứ tự:</td>
                    <td><?php echo $this->Form->input('Catproduct.order', array('class' => 'text-input small-input')); ?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Hình ảnh đại diện:</td>
                    <td><?php echo $this->Form->input('Catproduct.images',array('type'=>'file', 'accept'=>'image/gif,image/jpeg,image/png'));?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Giá</td>
                    <td><?php echo $this->Form->input('Catproduct.price', array('class' => 'text-input medium-input', 'maxlength' => '250')); ?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Mô tả:</td>
                    <td>
                        <?php  echo $this->Form->input('Catproduct.content',array('type'=>'textarea','class'=>'ckeditor-mini'));?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Trạng thái:</td>
                    <td><?php echo $this->Form->input('Catproduct.status',array('type'=>'radio','separator'=> '&nbsp;&nbsp;&nbsp;','options' => array('0'=>'Chưa Active', '1'=>'Đã Active'),'default'=>'1' ));?></td>
                </tr>
                
            </table>
            <div class="clear"></div>
		</div> <!-- End #tab1 -->       
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->


<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
    
    
		<h3>Dành cho SEO</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <table class="input">
                <tr>
                    <td class="label">Tiêu đề SEO:</td>
                    <td><?php echo $this->Form->input('Catproduct.title_seo',array('class'=>'text-input large-input'));?></td>
                </tr>
                <tr>
                    <td class="label">Meta Keyword:</td>
                    <td><?php echo $this->Form->input('Catproduct.meta_key',array('class'=>'text-input large-input'));?></td>
                </tr>
                <tr>
                    <td class="label">Meta Description:</td>
                    <td><?php echo $this->Form->input('Catproduct.meta_des',array('class'=>'text-input large-input'));?></td>
                </tr>
            </table>
            <div class="clear"></div>
		</div> <!-- End #tab1 -->       
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->
<?php echo $this->Form->end(); ?>




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
