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

<?php echo $this->Form->create(null, array('url' => DOMAINAD.strtolower(basename(dirname(__FILE__))), 'type' => 'post', 'name' => 'adminForm', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
<?php echo $this->Form->input('Setting.id', array()); ?>
<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
    
    
		<h3>Cấu hình</h3>
        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Cấu hình chung</a></li> <!-- href must be unique and match the id of target div -->
            <li style="display: none;"><a href="#tab4">Cấu hình thông tin trang chủ</a></li>
            <li style="display: none;"><a href="#tab2">Cấu hình mầu</a></li>
            <li style="display: none;"><a href="#tab3">Cấu hình phương pháp điều trị</a></li>
        </ul>
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            
            <table width="100%" class="input">
                <tr>
                    <td width="120" class="label">Tên công ty:</td>
                    <td><?php echo $this->Form->input('Setting.name', array('class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                	<td class="label">Tiêu đề website:</td>
                	<td> <?php echo $this->Form->input('Setting.title', array('class' => 'text-input medium-input')); ?></td>
               	</tr>
                <tr>
                    <td class="label">Email:</td>
                    <td> <?php echo $this->Form->input('Setting.email', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
<!--                <tr>-->
<!--                    <td class="label">Hợp tác:</td>-->
<!--                    <td> --><?php //echo $this->Form->input('Setting.email1', array('class' => 'text-input medium-input')); ?><!-- </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="label">Bộ phận kinh doanh:</td>-->
<!--                    <td> --><?php //echo $this->Form->input('Setting.email2', array('class' => 'text-input medium-input')); ?><!-- </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="label">Chăm sóc khách hàng:</td>-->
<!--                    <td> --><?php //echo $this->Form->input('Setting.email3', array('class' => 'text-input medium-input')); ?><!-- </td>-->
<!--                </tr>-->
                <tr>
                    <td class="label">Hotline:</td>
                    <td> <?php echo $this->Form->input('Setting.hotline', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
<!--                <tr>-->
<!--                    <td class="label">Khiếu nại, phản hồi:</td>-->
<!--                    <td> --><?php //echo $this->Form->input('Setting.telephone', array('class' => 'text-input medium-input')); ?><!-- </td>-->
<!--                </tr>-->
                <tr>
                    <td class="label">Chat fb link:</td>
                    <td> <?php echo $this->Form->input('Setting.linkme', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
                <tr>
                    <td class="label">Face:</td>
                    <td> <?php echo $this->Form->input('Setting.facebook', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
                <tr>
                    <td class="label">Tiwter:</td>
                    <td> <?php echo $this->Form->input('Setting.tiwter', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
                <tr>
                    <td class="label">Pinterest:</td>
                    <td> <?php echo $this->Form->input('Setting.printerest', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
                <!--<tr>
                    <td class="label">Gooogle cộng:</td>
                    <td> <?php echo $this->Form->input('Setting.google', array('class' => 'text-input medium-input')); ?> </td>
                </tr>

                <tr>
                    <td class="label">Youtobe:</td>
                    <td> <?php echo $this->Form->input('Setting.youtobe', array('class' => 'text-input medium-input')); ?> </td>
                </tr>-->

                <!--<tr>
                    <td class="label">Text danh mục trang chủ:</td>
                    <td> <?php echo $this->Form->input('Setting.text1', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
                <tr>
                    <td class="label">Text bên cạnh danh mục trang chủ:</td>
                    <td> <?php echo $this->Form->input('Setting.text2', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
                
                
                <tr>
                    <td class="label">Địa chỉ:</td>
                    <td> <?php echo $this->Form->input('Setting.address', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
                -->
                <!--
                <tr>
                    <td class="label">V:</td>
                    <td> <?php //echo $this->Form->input('Setting.v', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
                
                <tr>
                    <td class="label">in:</td>
                    <td> <?php //echo $this->Form->input('Setting.in', array('class' => 'text-input medium-input')); ?> </td>
                </tr>
                <tr>
                    <td class="label">cau:</td>
                    <td> <?php //echo $this->Form->input('Setting.cau', array('class' => 'text-input medium-input')); ?> </td>
                </tr>-->
<!--                <tr>-->
<!--                    <td class="label">Video:</td>-->
<!--                    <td>--><?php // echo $this->Form->input('Setting.video',array('class'=>'text-input large-input'));?><!--</td>-->
<!--                    <td></td>-->
<!--                </tr>-->
                <tr>
                    <td class="label">Cấu hình Footer:</td>
                    <td><?php  echo $this->Form->input('Setting.footer',array('class'=>'ckeditor'));?></td>
                    <td></td>
                </tr>
<!--                <tr>-->
<!--                    <td class="label">ƯU ĐÃI KHỦNG KÈM THEO:</td>-->
<!--                    <td>--><?php // echo $this->Form->input('Setting.uudai1',array('class'=>'ckeditor'));?><!--</td>-->
<!--                    <td></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="label">CHẾ ĐỘ BẢO HÀNH CHO SẢN PHẨM:</td>-->
<!--                    <td>--><?php // echo $this->Form->input('Setting.uudai2',array('class'=>'ckeditor'));?><!--</td>-->
<!--                    <td></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="label">CAM KẾT SẢN PHẨM:</td>-->
<!--                    <td>--><?php // echo $this->Form->input('Setting.uudai3',array('class'=>'ckeditor'));?><!--</td>-->
<!--                    <td></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="label">Thông tin liên hệ:</td>-->
<!--                    <td>--><?php // echo $this->Form->input('Setting.contactinfo',array('class'=>'ckeditor'));?><!--</td>-->
<!--                    <td></td>-->
<!--                </tr>-->
                <tr>
                    <td class="label">Bản đồ:</td>
                    <td><?php  echo $this->Form->input('Setting.googlemap',array('class'=>'ckeditor'));?></td>
                    <td></td>
                </tr>
                <!--<tr>
                    <td class="label">Thông tin hỗ trợ footer:</td>
                    <td><?php  echo $this->Form->input('Setting.thongtinhotro',array('class'=>'ckeditor'));?></td>
                    <td></td>
                </tr>-->
                <tr>
                    <td class="label">Thẻ h1 trang chủ</td>
                    <td>
                        <?php echo $this->Form->input('Setting.theh1', array('class'=>'text-input large-input')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Thẻ link khác (subiz, google anlantic, adv):</td>
                    <td>
                        <?php echo $this->Form->input('Setting.chenthekhac', array('class'=>'text-input large-input')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Từ khóa (SEO):</td>
                    <td>
                        <?php echo $this->Form->input('Setting.meta_key', array('class'=>'text-input large-input')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Mô tả (SEO):</td>
                    <td>
                        <?php echo $this->Form->input('Setting.meta_des', array('class'=>'text-input large-input')); ?>
                    </td>
                </tr>
            </table>
            
            <div class="clear"></div>
		</div> <!-- End #tab1 -->
        <div style="display: none;" class="tab-content" id="tab2">
            <table>
                <script type="text/javascript" src="<?php echo DOMAINAD;?>jscolor/jscolor.js"></script>
                <tr>
                    <td class="label">Mầu nền menu:</td>
                    <td><?php echo $this->Form->input('Setting.mau1',array('class' => 'text-input medium-input color','maxlength' => '11', 'readonly'));?></td>
                </tr>
                <tr>
                    <td class="label">Mầu nền footer:</td>
                    <td><?php echo $this->Form->input('Setting.mau2',array('class' => 'text-input medium-input color','maxlength' => '11', 'readonly'));?></td>
                </tr>
                <tr>
                    <td class="label">Mầu nền thanh công cụ:</td>
                    <td><?php echo $this->Form->input('Setting.mau3',array('class' => 'text-input medium-input color','maxlength' => '11', 'readonly'));?></td>
                </tr>
            </table>
            <div class="clear"></div>
        </div><!--end tab3-->
        <div style="display: none;" class="tab-content" id="tab3">
            <table>
                <tr>
                    <td class="label">Giới thiệu trái:</td>
                    <td>
                        <?php echo $this->Form->input('Setting.gt1', array('class'=>'ckeditor-mini')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Giới thiệu phải:</td>
                    <td>
                        <?php echo $this->Form->input('Setting.gt2', array('class'=>'ckeditor-mini')); ?>
                    </td>
                </tr>
            </table>
            <div class="clear"></div>
        </div><!--end tab3-->
        <div class="tab-content" id="tab4">
            <table>
                <tr>
                    <td width="120" class="label">Tiêu đề trang chủ:</td>
                    <td><?php echo $this->Form->input('Setting.ns1', array('class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td class="label">Nội dung trang chủ:</td>
                    <td>
                        <?php echo $this->Form->input('Setting.thongbao_h', array('class'=>'ckeditor')); ?>
                    </td>
                </tr>
                <tr>
                    <td width="120" class="label">Tiêu đề trang chủ 2:</td>
                    <td><?php echo $this->Form->input('Setting.ns2', array('class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td class="label">Nội dung trang chủ 2:</td>
                    <td>
                        <?php echo $this->Form->input('Setting.quyche_h', array('class'=>'ckeditor')); ?>
                    </td>
                </tr>
                <!--<tr>
                    <td width="120" class="label">Tiêu đề địa chỉ nhận hàng:</td>
                    <td><?php echo $this->Form->input('Setting.ns3', array('class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td class="label">Địa chỉ nhận hàng:</td>
                    <td>
                        <?php echo $this->Form->input('Setting.diachi_h', array('class'=>'ckeditor')); ?>
                    </td>
                </tr>-->
            </table>
            <div class="clear"></div>
        </div><!--end tab4-->

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
	
	<li><a class="shortcut-button png48-cancel" href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>"><span class="png_bg">
		Hủy
	</span></a></li>

</ul><!-- End .shortcut-buttons-set -->

<div class="clear"></div>