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
    
    
		<h3>Sản phẩm</h3>
        
        
        <?php echo $this->Form->create(null, array('url' => DOMAINAD . strtolower(basename(dirname(__FILE__))). '/search', 'type' => 'post', 'name' => 'search', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
            <?php echo $this->Form->input(null,array('name'=>'search_keyword','value'=>$this->Session->read('search_keyword'),'class'=>'text-input',));?>
            <?php echo $this->Form->input(null, array('name'=>'search_cat','onchange'=>'this.form.submit();','type'=>'select', 'options'=>$list_cat, 'default'=>$this->Session->read('search_cat'), 'empty' => '---Chọn nhóm---'));?>
            <input type="submit" name="" value="Tìm kiếm" class="button" />
        <?php echo $this->Form->end(); ?>
        
        
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <?php echo $this->Form->create(null, array('onsubmit' => 'return confirmDeleteSelected();','url' => DOMAINAD . strtolower(basename(dirname(__FILE__))). '/index', 'type' => 'post', 'name' => 'abc', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
			<?php if($view){?>
            <table>
                <thead>
                        <tr>
                            <th style="width: 4%;"><input class="check-all" type="checkbox" /></th>
                            <th style="width: 5%;">STT</th>
                            <th style="width: 68px;">Ảnh</th>
                            <th style="width: 15%;">Tiêu đề</th>
                            <th>Nhóm</th>
                            <th>Thứ tự</th>
                            <!--<th style="width: 35px;">Top 1</th>-->
                            <th>Hot<br/>trong ngày</th>
                            <th>Mới<br/>trong ngày</th>
                            <th>Sự kiện<br/>hot</th>
                            <th>Tiêu đề</th>                   
                            <th>Cập nhật</th>
                            <th>User tạo</th>
                            <th>User sửa</th>
                            <th width="5%">Xử lý</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>ID</th>
                        </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($view as $key => $value) { 
                    ?>
                    <tr>
                        <td><input type="checkbox" name="check[<?php echo $value['Post']['id']; ?>]" value="1" /></td>
                        <td><?php echo $key + $this->Paginator->counter('{:start}');?></td>
                        <td><img src="<?php echo IMG_URL_AUTO; ?><?php echo $value['Post']['images']; ?>" style="height: 50px;"/></td>
                        <td><a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit/<?php echo $value['Post']['id']; ?>" title="Edit"><?php echo $value['Post']['name']; ?></a>  <?php if(date('Y-m-d', strtotime($value['Post']['modified'])) == date('Y-m-d')) { ?><img src="<?php echo DOMAINAD ?>img/lotus/icons/iconnew.gif" alt="New" /><?php } ?></td>
                        <td><?php echo $value['Catproduct']['name']; ?></a></td>
                        <td><input name="order[<?php echo $value['Post']['id'];?>]" type="number" value="<?php echo $value['Post']['order'];?>" class="text-input" style="width: 44px;" /></td>
                        <!--<td>
                            <?php if ($value['Post']['choose1'] == 0) {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Post']['id']; ?>/choose1" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Kích hoạt" /></a>
                            <?php } else {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Post']['id']; ?>/choose1" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Ngắt kích hoạt" /></a>
                            <?php }?>
                        </td>-->
                        <td>
                            <?php if ($value['Post']['choose2'] == 0) {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Post']['id']; ?>/choose2" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Kích hoạt" /></a>
                            <?php } else {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Post']['id']; ?>/choose2" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Ngắt kích hoạt" /></a>
                            <?php }?>
                        </td>
                        <td>
                            <?php if ($value['Post']['choose3'] == 0) {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Post']['id']; ?>/choose3" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Kích hoạt" /></a>
                            <?php } else {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Post']['id']; ?>/choose3" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Ngắt kích hoạt" /></a>
                            <?php }?>
                        </td>
                        <td>
                            <?php if ($value['Post']['choose4'] == 0) {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Post']['id']; ?>/choose4" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Kích hoạt" /></a>
                            <?php } else {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Post']['id']; ?>/choose4" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Ngắt kích hoạt" /></a>
                            <?php }?>
                        </td>
                        <td>
                            <?php if ($value['Post']['choose5'] == 0) {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Post']['id']; ?>/choose5" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Kích hoạt" /></a>
                            <?php } else {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Post']['id']; ?>/choose5" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Ngắt kích hoạt" /></a>
                            <?php }?>
                        </td>
                        <td><?php echo date('d-m-Y', strtotime($value['Post']['modified'])); ?></td>
                        <td><?php if(isset($value['Account']['name'])) echo $value['Account']['name']; else echo 'Không xác định';?></td>
                        <td><?php if(isset($value['Accountedit']['name'])) echo $value['Accountedit']['name']; else echo 'Không xác định';?></td>
                        <td>
                            <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/copy/<?php echo $value['Post']['id']; ?>" title="Sao chép"><img src="<?php echo DOMAINAD ?>img/lotus/icons/copy.png" alt="Sao chép" /></a>
                            <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/edit/<?php echo $value['Post']['id']; ?>" title="Sửa"><img src="<?php echo DOMAINAD ?>img/lotus/icons/pencil.png" alt="Sửa" /></a>
                            <a href="javascript:confirmDelete('<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/delete/<?php echo $value['Post']['id']; ?>')" title="Xóa"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross.png" alt="Xóa" /></a>
                        </td>
                        <td>
                            <?php if ($value['Post']['status'] == 0) {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Post']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Kích hoạt" /></a>
                            <?php } else {?>
                                <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Post']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Ngắt kích hoạt" /></a>
                            <?php }?>
                        </td>
                        <td style="color: red; font-weight: bold; text-align: right;"><?php echo $value['Post']['view']; ?></td>
                        <td align="right"><?php echo $value['Post']['id']; ?></td>
                    </tr>
                    <?php } ?>   
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="16">
                            <div class="bulk-actions align-left">
								<select id="option" name="option">
                                    <option value="order">Lưu thứ tự</option>
									<option value="active">Kích hoạt</option>
									<option value="close">Hủy kích hoạt</option>
                                    <option value="delete">Xóa</option>
                                    <option value="price">Cập nhật giá</option>
                                    <!--<option value="choose1_active">Active tin top 1</option>
                                    <option value="choose1_close">Close tin top 1</option>-->
                                    <option value="choose2_active">Active tin hot trong ngày</option>
                                    <option value="choose2_close">Close tin hot trong ngày</option>
                                    <option value="choose3_active">Active tin mới trong ngày</option>
                                    <option value="choose3_close">Close tin mới trong ngày</option>
                                    <option value="choose4_active">Active tin sự kiện hot</option>
                                    <option value="choose4_close">Close tin sự kiện hot</option>
                                    <option value="choose5_active">Active tin tiêu đề</option>
                                    <option value="choose5_close">Close tin tiêu đề</option>
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
            <?php }else{echo 'Bạn phải tìm kiếm sản phẩm';}?>
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