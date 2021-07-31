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
    
    
		<h3>Advertisement</h3>
        
        
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
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Thứ tự</th>
                        <th width="15%">Cập nhật</th>
                        <th width="13%">Xử lý</th>
                        <th width="13%">Trạng thái</th>
                        <th width="3%">ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($view as $key => $value) {?>
                        <tr>
                            <td><input type="checkbox" name="check[<?php echo $value['Extention']['id'];?>]" /></td>
                            <td><?php echo $key + $this->Paginator->counter('{:start}'); ?></td>
                            <td><?php echo $value['Extention']['name'];?></td>
                            <td>
                                <?php if(get_extension($value['Extention']['images']) == "swf") { ?>
                                    <embed src="<?php echo SWF_URL.$value['Extention']['images']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="200" height="150" scale="ExactFit"> </embed>
                                <?php } else { ?>
                                    <img src="<?php echo IMG_URL_ADMIN.$value['Extention']['images']; ?>" width="100" />
                                <?php } ?>
                            </td>
                            <td><input name="order[<?php echo $value['Extention']['id'];?>]" type="number" value="<?php echo $value['Extention']['order'];?>" class="text-input" style="width: 44px;" /></td>
                            <td><?php echo date('d-m-Y', strtotime($value['Extention']['modified'])); ?></td>
                            <td>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit/<?php echo $value['Extention']['id'] ?>" title="Sửa mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/pencil.png" alt="Sửa" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/delete/<?php echo $value['Extention']['id'] ?>')" title="Xóa mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross.png" alt="Xóa" /></a>
                            </td>
                            <td>
                                <?php if ($value['Extention']['status'] == 0) {?>
                                    <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Extention']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Kích hoạt" /></a>
                                <?php } else {?>
                                    <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Extention']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Ngắt kích hoạt" /></a>
                                <?php }?>
                            </td>
                            <td><?php echo $value['Extention']['id']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
					<tr>
						<td colspan="8">
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