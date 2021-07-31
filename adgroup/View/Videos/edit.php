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

<?php echo $this->Form->create(null, array('url' => DOMAINAD.strtolower(basename(dirname(__FILE__))).'/edit', 'type' => 'post','enctype'=>'multipart/form-data', 'name' => 'adminForm', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
<?php echo $this->Form->input('Video.id', array()); ?>

<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
    
    
		<h3>Sửa video</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            
            <table class="input">
                <tr>
                    <td class="label">Tiêu đề:</td>
                    <td><?php echo $this->Form->input('Video.name',array('class'=>'text-input medium-input','maxlength' => '250'));?></td>
                </tr>
                <tr>
                    <td class="label">Nhóm:</td>
                    <td><?php echo $this->Form->input('Video.cat_id', array('type'=>'select', 'options'=>$list_cat, 'empty' => '---Chọn nhóm---'));?></td>
                </tr>
                <tr>
                    <td class="label">Video</td>
                    <td><?php  echo $this->Form->input('Video.video',array('type'=>'textarea'));?><span style="font-size: 11px; font-style: italic;">Nhúng iframe youtube</span></td>
                </tr>
                <tr>
                    <td class="label">Thứ tự:</td>
                    <td><?php echo $this->Form->input('Video.order', array('class' => 'text-input small-input')); ?></td>
                </tr>
                <tr>
                    <td class="label">Trạng thái:</td>
                    <td><?php echo $this->Form->input('Video.status',array('type'=>'radio','separator'=> '&nbsp;&nbsp;&nbsp;','options' => array('0'=>'Chưa Active', '1'=>'Đã Active'),'default'=>'1'));?></td>
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
		<div class="tab-content default-tab"> <!-- This is the target div. id must match the href of this div's tab -->
                <table class="input">
                    <tr>
                        <td class="label">Title Seo</td>
                        <td><?php echo $this->Form->input('Video.title_seo',array('class'=>'text-input large-input','maxlength' => '250'));?></td>
                    </tr>
                    <tr>
                        <td class="label">Meta keyword</td>
                        <td><?php echo $this->Form->input('Video.meta_key',array('class'=>'text-input large-input'));?></td>
                    </tr>
                    <tr>
                        <td class="label">Meta description</td>
                        <td><?php echo $this->Form->input('Video.meta_des',array('class'=>'text-input large-input'));?></td>
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