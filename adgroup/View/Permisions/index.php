<!-- Page Head -->
<!-----------------------------------
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 ------------------------------------>
 

<ul style="float: right;" class="shortcut-buttons-set">
	
	<li><a class="shortcut-button png48-add" href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/add"><span class="png_bg">
		Thêm quyền
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
    
    
		<h3>Bảng phân quyền</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
			<table>
				<thead>
					<tr>
                       <th>STT</th>
                       <th>Tên</th>
                       <th>Quyền truy cập</th>
                       <th>Ngày tạo</th>
                       <th>Xử lý</th>
                    </tr>
				</thead>
				<tbody>
					<?php  foreach ($Permisions as $key =>$value){?>
                    <tr>
                        <td><?php $j=$key+1; echo $j;?></td>
                        <td><a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit/<?php echo $value['Permision']['id'] ?>" title="Edit"><?php echo $value['Permision']['name'];?></a></td>
                        <td><a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit/<?php echo $value['Permision']['id'] ?>" title="Edit"><?php echo $value['Permision']['allow'];?></a></td>
                        <td><?php echo date('d-m-Y', strtotime($value['Permision']['created'])); ?></td>
                        <td>
                             <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit/<?php echo $value['Permision']['id'] ?>" title="Edit"><img src="<?php echo DOMAINAD; ?>img/lotus/icons/pencil.png" alt="Edit" /></a>
                             <a href="javascript:confirmDelete('<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/delete/<?php echo $value['Permision']['id'] ?>')" title="Delete"><img src="<?php echo DOMAINAD; ?>img/lotus/icons/cross.png" alt="Delete" /></a> 
                        </td>
                    </tr>
                   <?php }?>
				</tbody>
			</table>
            <div class="clear"></div>
		</div> <!-- End #tab1 -->       
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->