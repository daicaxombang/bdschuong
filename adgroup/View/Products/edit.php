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
<?php echo $this->Form->input('Product.id', array()); ?>

<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
    
    
		<h3>Phần chung</h3>
        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Phần chung</a></li> <!-- href must be unique and match the id of target div -->
            <li><a href="#tab3">Up thêm ảnh</a></li>
        </ul>
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <table class="input">
                <tr>
                    <td class="label">Nhóm:</td>
                    <td><?php echo $this->Form->input('Product.cat_id', array('type'=>'select', 'options'=>$list_cat, 'empty' => '---Chọn nhóm---'));?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Hãng:</td>
                    <td><?php echo $this->Form->input('Product.hang_id', array('type'=>'select', 'options'=>$list_hang, 'empty' => '---Chọn hãng---'));?></td>
                </tr>
                <tr>
                    <td class="label">Thứ tự:</td>
                    <td><?php echo $this->Form->input('Product.order', array('class' => 'text-input small-input', 'readonly' => 'readonly')); ?></td>
                </tr>
                <tr>
                    <td class="label">Hình ảnh đại diện:</td>
                    <td>
                        <div><img style="border: 1px dotted #ccc;" src="<?php echo IMG_URL; ?><?php echo $edit['Product']['images']; ?>" height="100"></div>
                        <?php echo $this->Form->input('Product.images',array('type'=>'file', 'accept'=>'image/gif,image/jpeg,image/png'));?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Tiêu đề:</td>
                    <td><?php echo $this->Form->input('Product.name',array('class'=>'text-input medium-input','maxlength' => '250'));?></td>
                </tr>
                <tr>
                    <td class="label">Mã sản phẩm:</td>
                    <td><?php echo $this->Form->input('Product.code',array('class'=>'text-input medium-input','maxlength' => '250'));?></td>
                </tr>
                <tr>
                    <td class="label">Giá bán:</td>
                    <td><?php echo $this->Form->input('Product.price',array('class'=>'text-input medium-input','maxlength' => '50'));?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Giá khuyến mại:</td>
                    <td><?php echo $this->Form->input('Product.price2',array('class'=>'text-input medium-input','maxlength' => '50'));?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Chất liệu:</td>
                    <td><?php echo $this->Form->input('Product.chatlieu',array('class'=>'text-input medium-input'));?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Hiệu:</td>
                    <td><?php echo $this->Form->input('Product.hieu',array('class'=>'text-input medium-input'));?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Thành phần (làm đẹp):</td>
                    <td><?php echo $this->Form->input('Product.thanhphan',array('class'=>'text-input medium-input'));?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Size:</td>
                    <td>
                        <ul class="mn_size_color">
                            <?php foreach($list_size as $value){?>
                                <li>
                                    <input type="checkbox" <?php if(in_array($value['Exttmp']['id'], explode(',', $this->request->data['Product']['size']))) echo 'checked';?> name="size[]" value="<?php echo $value['Exttmp']['id'];?>" />
                                    <?php echo $value['Exttmp']['name'];?>
                                    <div style="clear: both;"></div>
                                </li>
                            <?php }?>
                        </ul>
                    </td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Color:</td>
                    <td>
                        <ul class="mn_size_color">
                            <?php foreach($list_color as $value){?>
                                <li>
                                    <input type="checkbox" <?php if(in_array($value['Exttmp']['id'], explode(',', $this->request->data['Product']['mausac']))) echo 'checked';?> name="color[]" value="<?php echo $value['Exttmp']['id'];?>" />
                                    <?php echo $value['Exttmp']['name'];?>
                                    <div style="clear: both;"></div>
                                </li>
                            <?php }?>
                        </ul>
                        <style type="text/css">
                            .mn_size_color li{list-style: none; float: left; width: 120px; border: 1px dashed #ddd; margin: 0 6px 0 0;}
                        </style>
                    </td>
                </tr>
                <tr>
                    <td class="label">Tình trạng:</td>
                    <td><?php echo $this->Form->input('Product.tinhtrang',array('type'=>'radio','separator'=> '&nbsp;&nbsp;&nbsp;','options' => array('0'=>'Hết hàng', '1'=>'Còn hàng') ));?></td>
                </tr>    
                <tr>
                    <td class="label">Mô tả sản phẩm</td>
                    <td><?php  echo $this->Form->input('Product.shortdes',array('type'=>'textarea','class'=>'ckeditor-mini'));?></td>
                </tr>
               
                <tr>
                    <td class="label">Nội dung</td>
                    <td><?php  echo $this->Form->input('Product.content',array('type'=>'textarea','class'=>'ckeditor'));?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Thông số kỹ thuật</td>
                    <td><?php  echo $this->Form->input('Product.thongsokythuat',array('type'=>'textarea','class'=>'ckeditor'));?></td>
                </tr>
                <tr style="display: none;">
                    <td class="label">Video</td>
                    <td><?php  echo $this->Form->input('Product.video',array('type'=>'textarea','class'=>'text-input large-input'));?></td>
                </tr>
                <tr>
                    <td class="label">Trạng thái:</td>
                    <td><?php echo $this->Form->input('Product.status',array('type'=>'radio','separator'=> '&nbsp;&nbsp;&nbsp;','options' => array('0'=>'Chưa Active', '1'=>'Đã Active') ));?></td>
                </tr>
            </table>
            <div class="clear"></div>
		</div> <!-- End #tab1 --> 
        
        <div class="tab-content" id="tab3"> <!-- This is the target div. id must match the href of this div's tab -->
            <script>
                $(function(){
                    //$(".xoaImg").click(function(){
                    //    $(this).next().val().remove();
                    //})   
                });
            </script>
            <table class="input">
                <?php
                    $dem = 1;
                    if($edit['Product']['multiple']){
                    $img_multi = explode(",",  $edit['Product']['multiple']);
                    foreach ($img_multi as $k => $values) {
                        if($values){
                ?>
                <script>
                    function xoa<?php echo $dem;?>(){
                        $("span.luulai<?php echo $dem;?>").show();
                        $("#multipleImg<?php echo $dem;?>").remove();
                    }
                </script>
                <tr>
                    <td class="label">Hình ảnh <?php echo $dem;?></td>
                    <td>
                        
                        <img src="<?php echo IMG_URL; ?><?php echo $values; ?>" height="100"> &nbsp; <a class="xoaImg" href="#abc" onclick="xoa<?php echo $dem;?>();">Xóa ảnh</a>
                        <input type="text" readonly="" id="multipleImg<?php echo $dem;?>" style="border: 0; background: none;" value="<?php echo $values; ?>" name="img[]"/><span style="color: red; font-weight: bold; display: none;" class="luulai<?php echo $dem;?>">Bạn cần lưu lại để thay đổi.</span>
                    </td>
                </tr>
                <?php $dem ++;}}}?>
                <tr>
                    <td class="label">Chọn nhiều file ảnh:</td>
                    <td><?php echo $this->Form->input('files.', array('type' => 'file', 'multiple'));;?></td>
                </tr>
            </table>
            <div class="clear"></div>
        </div> <!-- End #tab3 -->       
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->

<script language="javascript">
    $('#website_themlannop').click(function add_html_formnoptien () {
        var html_formnhap = '<table class="input"><tr><td colspan="2"><input type="file" name="data[Product][themanh][]"><input type="text" placeholder="Nhập tiêu đề" name="tieude[]"/></td></tr></table>';
        $('#form_add').append(html_formnhap);
    });
</script>

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
                        <td><?php echo $this->Form->input('Product.title_seo',array('class'=>'text-input large-input'));?></td>
                    </tr>
                    <tr>
                        <td class="label">Meta keyword</td>
                        <td><?php echo $this->Form->input('Product.meta_key',array('class'=>'text-input large-input'));?></td>
                    </tr>
                    <tr>
                        <td class="label">Meta description</td>
                        <td><?php echo $this->Form->input('Product.meta_des',array('class'=>'text-input large-input'));?></td>
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