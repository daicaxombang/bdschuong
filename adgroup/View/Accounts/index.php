<!-- Page Head -->
<!-----------------------------------
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 ------------------------------------>

<ul style="float: right;" class="shortcut-buttons-set">
	
	<!--<li><a class="shortcut-button png48-add" href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/add"><span class="png_bg">
		Thêm tài khoản
	</span></a></li>
    
    <li><a class="shortcut-button png48-group" href="<?php echo DOMAINAD;?>groups"><span class="png_bg">
		Quản lý nhóm
	</span></a></li>
    
    <li><a class="shortcut-button png48-permision" href="<?php echo DOMAINAD;?>permisions"><span class="png_bg">
		Quản lý quyền
	</span></a></li>-->
	
	<!--<li><a class="shortcut-button png48-info" href="#messages"><span class="png_bg">
		Trợ giúp
	</span></a></li>
	
	<li><a class="shortcut-button png48-exit" href="<?php echo DOMAINAD; ?>"><span class="png_bg">
		Đóng
	</span></a></li>-->

</ul><!-- End .shortcut-buttons-set -->

<div class="clear"></div> <!-- End .clear -->


<?php echo $this->Session->flash(); ?>


<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
    
    
		<h3>Tài khoản</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
			<table>
				<thead>
					<tr>
                       <th>STT</th>
                       <th>Tên đăng nhập</th>
                       <th>Email</th>
                       <th>Nhóm</th>
                       <th>Ngày tạo</th>
                       <th>Xử lý</th>
                    </tr>
				</thead>
				<tbody>
					<?php  foreach ($users as $key =>$value){?>
                    <tr>
                        <td><?php $j=$key+1; echo $j;?></td>
                        <td><a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit_name/<?php echo $value['Account']['id'] ?>" title="Đổi tên đăng nhập"><?php echo $value['Account']['name'];?></a></td>
                        <td><a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit_mail/<?php echo $value['Account']['id'] ?>" title="Đổi email"><?php  echo $value['Account']['email'];?></a></td>
                        <td>
                            <?php if($value['Account']['id']==1){?>
                                Cơ sở
                            <?php } else{?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit_group/<?php echo $value['Account']['id'] ?>" title="Đổi nhóm">
                                    <?php if($value['Group']['name']) echo $value['Group']['name']; else echo 'Không có'?>
                                </a>
                            <?php }?>
                        </td>
                        <td><?php echo date('d-m-Y', strtotime($value['Account']['created'])); ?></td>
                        <td>
                             <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit_pass/<?php echo $value['Account']['id'] ?>" title="Đổi mật khẩu"><img src="<?php echo DOMAINAD; ?>img/lotus/icons/pencil.png" alt="Đổi mật khẩu" /></a>
                             <a href="javascript:confirmDelete('<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/delete/<?php echo $value['Account']['id'] ?>','Bạn có chắc chắn xóa tài khoản này không?')" title="Xóa"><img src="<?php echo DOMAINAD; ?>img/lotus/icons/cross.png" alt="Xóa" /></a> 
                        </td>
                    </tr>
                   <?php }?>
				</tbody>
			</table>
		</div> <!-- End #tab1 -->       
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->