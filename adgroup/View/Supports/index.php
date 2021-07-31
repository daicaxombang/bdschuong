<!-- Page Head -->
<!-----------------------------------
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 ------------------------------------>
 

<ul style="float: right;" class="shortcut-buttons-set">
	
	<li><a class="shortcut-button png48-add" href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/add"><span class="png_bg">
		Thêm mới
	</span></a></li>
	
	<li><a class="shortcut-button png48-info" href="#messages"><span class="png_bg">
		Trợ giúp
	</span></a></li>
	
	<li><a class="shortcut-button png48-exit" href="<?php echo DOMAINAD; ?>"><span class="png_bg">
		Đóng
	</span></a></li>

</ul><!-- End .shortcut-buttons-set -->

<div class="clear"></div> <!-- End .clear -->


<?php echo $this->Session->flash(); ?>


<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
    
    
		<h3>Hỗ trợ</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <form name="abc" onsubmit="return confirmDeleteSelected();" action="" method="POST">
			<table>
                <thead>
                        <tr>
                            <th width="5%">STT</th>
                            <th style="display: none;" width="8%">Ảnh</th>
                            <th width="16%">Name</th>
                            <th width="16%">Phone</th>
                            <th style="display: none;" width="14%">Yahoo</th>
                            <th width="14%">Skype</th>
                            <th width="14%">Email</th>
                            <th width="10%">Cập nhật</th>
                            <th width="13%">Xử lý</th>
                            <th width="7%">ID</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Support as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td style="display: none;"><img src="<?php echo IMG_URL_PRODUCT; ?><?php echo $value['Support']['images']; ?>" /></td>
                            <td><?php echo $value['Support']['name'] ?></td>
                            <td><?php echo $value['Support']['phone'] ?></td>
                            <td style="display: none;"><?php echo $value['Support']['yahoo'] ?></td>
                            <td><?php echo $value['Support']['skype'] ?></td>
                            <td><?php echo $value['Support']['email'] ?></td>
                            <td><?php echo date('d-m-Y', strtotime($value['Support']['modified'])); ?></td>
                            <td><!-- Icons --> 
                                <a href="<?php echo DOMAINAD ?>supports/edit/<?php echo $value['Support']['id'] ?>" title="Sửa mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/pencil.png" alt="Sửa" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>supports/delete/<?php echo $value['Support']['id'] ?>')" title="Xóa mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross.png" alt="Xóa" /></a>
                                <?php
                                if ($value['Support']['status'] == 0) {
                                    ?>
                                    <a href="<?php echo DOMAINAD ?>supports/active/<?php echo $value['Support']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Kích hoạt" /></a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo DOMAINAD ?>supports/close/<?php echo $value['Support']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Ngắt kích hoạt" /></a>
                                        <?php
                                    }
                                    ?>
                            </td>
                            <td align="right"><?php echo $value['Support']['id']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
			</table>
            </form>
		</div> <!-- End #tab1 -->       
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->




<ul style="float: right;" class="shortcut-buttons-set">
	
	<li><a class="shortcut-button png48-add" href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/add"><span class="png_bg">
		Thêm mới
	</span></a></li>
	
	<li><a class="shortcut-button png48-info" href="#messages"><span class="png_bg">
		Trợ giúp
	</span></a></li>
	
	<li><a class="shortcut-button png48-exit" href="<?php echo DOMAINAD; ?>"><span class="png_bg">
		Đóng
	</span></a></li>

</ul><!-- End .shortcut-buttons-set -->

<div class="clear"></div>