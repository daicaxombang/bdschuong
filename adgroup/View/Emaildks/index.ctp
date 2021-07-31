    <script>
        function confirmDeleteSelected(){
            if($('#option').val()=='delete'){
                if (confirm('Bạn có chắc chắn muốn xóa các mục đã chọn không?')){
                    return true;
                }
                else return false;
            }
        }
    </script>
<!-- Page Head -->
<!-----------------------------------
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 ------------------------------------>
 

<ul style="float: right;" class="shortcut-buttons-set">
	
	
	
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
    
    
		<h3>Email</h3>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <?php echo $this->Form->create(null, array('onsubmit' => 'return confirmDeleteSelected();','url' => DOMAINAD . strtolower(basename(dirname(__FILE__))). '/index', 'type' => 'post', 'name' => 'abc', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
			<table>
                <thead>
                    <tr>
                        <th><input class="check-all" type="checkbox" /></th>
                        <th width="7%">STT</th>
                        <th width="40%">Email</th>
                        <th width="40%">Id</th>
                        <th width="10%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($view as $key => $value) {?>
                        <tr>
                            <td><input type="checkbox" name="check[<?php echo $value['Emaildk']['id'];?>]" /></td>
                            <td><?php echo $key + $this->Paginator->counter('{:start}'); ?></td>
                            <td><?php echo $value['Emaildk']['email']; ?></td>
                            <td><?php echo $value['Emaildk']['id']; ?></td>
                            <td>
                                <a href="javascript:confirmDelete('<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/delete/<?php echo $value['Emaildk']['id'] ?>')" title="Xóa mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross.png" alt="Xóa" /></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
					<tr>
						<td colspan="8">
							<!--<div class="bulk-actions align-left">
								<select id="option" name="option">
                                    <option value="order">Lưu thứ tự</option>
									<option value="active">Kích hoạt</option>
									<option value="close">Hủy kích hoạt</option>
                                    <option value="delete">Xóa</option>
								</select>
								<a class="button" href="#">Thực hiện</a>
                                <input class="button" type="submit" value="Thực hiện" />
							</div>-->
                            <?php if($this->Paginator->numbers()){?>
                            <div class="pagination">
                                <?php
                                    echo $this->Paginator->first('« Đầu');     
                                    echo $this->Paginator->prev('« Trước', null, null, array('class' => 'disabled')); 
                                    echo $this->Paginator->numbers(
                                        array(
                                            'before' => null,
                                            'after' => null,
                                            
                                			'tag' => 'span',
                                            'class' => 'number',
                                			'modulus' => '6',
                                            'separator' => null,
                                            'first' => 2,
                                            'last' => 2,
                                            'ellipsis' => '...',
                                			'currentClass' => 'current',
                                            'currentTag' => null
                                		)
                                    );
                                    echo $this->Paginator->next('Tiếp »'); 
                                    echo $this->Paginator->last('Cuối »'); 
                                    echo $this->Paginator->counter('Trang {:page}/{:pages}. Đang xem {:current}/{:count} (từ {:start} đến {:end}).');
                                ?>
                            </div>
                            <?php }?>
                            <div class="clear"></div>
						</td>
					</tr>
				</tfoot>
			</table>
            <?php echo $this->Form->end(); ?>
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