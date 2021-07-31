    <script>
        function confirmDeleteSelected(){
            if($('#option').val()=='delete'){
                if (confirm('Bạn có chắc chắn muốn xóa các mục đã chọn không?')){
                    return true;
                }
                else return false;
            }
        }
        function selectEvent(e){
            location.href = '<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/index/' + $(e).val();
        }
    </script>
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
    
    
		<h3>Quản lý nhóm</h3>
        
        
        <?php echo $this->Form->create(null, array('url' => DOMAINAD . strtolower(basename(dirname(__FILE__))). '/search', 'type' => 'post', 'name' => 'adminFrom', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
            <?php echo $this->Form->input(null, array('onchange'=>'selectEvent(this);','name'=>'search_cat','type'=>'select', 'options'=>$list_cat, 'default'=>$this->Session->read('parent_id'), 'empty' => '---Tất cả---'));?>
        <?php echo $this->Form->end(); ?>
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <?php echo $this->Form->create(null, array('onsubmit' => 'return confirmDeleteSelected();','url' => DOMAINAD . strtolower(basename(dirname(__FILE__))). '/index', 'type' => 'post', 'name' => 'abc', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
			<table>
				<thead>
                <thead>
                    <tr>
                        <th><input class="check-all" type="checkbox" /></th>
                        <th>STT</th>
                        <th></th>
                        <th>Tên nhóm</th>
                        <th>Thứ tự</th>
                        <!--<th>Trang chủ</th>
                        <th>Cột trái</th>-->
                        <th>Cập nhật</th>
                        <th>User tạo</th>
                        <th>User sửa</th>
                        <th>Xử lý</th>
                        <th>Kích hoạt</th>
                        <th>ID</th>
                    </tr>
                </thead>
				</thead>
				<tbody>
                   <?php
                        foreach ($view as $key => $value) {
                            ?>
                            <tr>
                                <td><input type="checkbox" name="check[<?php echo $value['Catproduct']['id'];?>]" /></td>
                                <td><?php echo $key + $this->Paginator->counter('{:start}');?></td>
                                <td valign="bottom" style="text-align:center;"><?php if($value['Catproduct']['images']){ ?><img src="<?php echo DOMAIN; ?>img/<?php echo $value['Catproduct']['images']; ?>" height="60" /><?php }?></td>
                                <td><a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit/<?php echo $value['Catproduct']['id']; ?>" title="Sửa"><?php echo $value['Catproduct']['name']; ?> </a></td>
                                <td><input name="order[<?php echo $value['Catproduct']['id'];?>]" type="number" value="<?php echo $value['Catproduct']['order'];?>" class="text-input" style="width: 44px;" /></td>
                                <!--<td align="center">
                                    <?php if($value['Catproduct']['home'] == 1) { ?>
                                        <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Catproduct']['id'] ?>/home" title="Tích vào để không hiển thị mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Đã kích hoạt" /></a>
                                    <?php } else { ?>
                                        <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Catproduct']['id'] ?>/home" title="Tích vào để hiển thị mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Chưa kích hoạt" /></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php if($value['Catproduct']['home1'] == 1) { ?>
                                        <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Catproduct']['id'] ?>/home1" title="Tích vào để không hiển thị mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Đã kích hoạt" /></a>
                                    <?php } else { ?>
                                        <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Catproduct']['id'] ?>/home1" title="Tích vào để hiển thị mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Chưa kích hoạt" /></a>
                                    <?php } ?>
                                </td>-->
                                <td align="center"><?php echo date('d-m-Y h:i:s', strtotime($value['Catproduct']['modified'])); ?></td>
                                <td><?php if(isset($value['Account']['name'])) echo $value['Account']['name']; else echo 'Không xác định';?></td>
                                <td><?php if(isset($value['Accountedit']['name'])) echo $value['Accountedit']['name']; else echo 'Không xác định';?></td>
                                <td align="center"><!-- Icons --> 
                                    <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit/<?php echo $value['Catproduct']['id'] ?>" title="Sửa mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/pencil.png" alt="Sửa" /></a>
                                    <a href="javascript:confirmDelete('<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/delete/<?php echo $value['Catproduct']['id'] ?>','Xóa mục này sẽ xóa cả các mục con của nó, bạn có chắc chắn muốn xóa không?')" title="Xóa mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross.png" alt="Xóa" /></a>
                                </td>
                                <td align="center">
                                    <?php if($value['Catproduct']['status'] == 1) { ?>
                                        <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Catproduct']['id'] ?>" title="Tích vào để không hiển thị mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Đã kích hoạt" /></a>
                                    <?php } else { ?>
                                        <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Catproduct']['id'] ?>" title="Tích vào để hiển thị mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Chưa kích hoạt" /></a>
                                    <?php } ?>
                                </td>
                                <td align="right"><?php echo $value['Catproduct']['id']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="11">
							<div class="bulk-actions align-left">
								<select id="option" name="option">
                                    <option value="order">Lưu thứ tự</option>
									<option value="active">Kích hoạt</option>
									<option value="close">Hủy kích hoạt</option>
                                    <option value="delete">Xóa</option>
								</select>
								<!--<a class="button" href="#">Thực hiện</a>-->
                                <input class="button" type="submit" value="Thực hiện" />
							</div>
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