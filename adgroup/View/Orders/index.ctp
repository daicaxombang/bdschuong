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

<link rel="stylesheet" type="text/css" href="<?php echo DOMAINAD;?>datepicker-ui/css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo DOMAINAD;?>datepicker-ui/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo DOMAINAD;?>datepicker-ui/js/jquery-ui.js"></script>
<script>
    $(function() {
        $( ".dated" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
        $( ".dated_loc" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $( "#date2" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    });
</script>

<div class="content-box"><!-- Start Content Box -->
    <div class="content-box-header">
    
    
        <h3>Đơn hàng</h3>
        
        
        <div class="clear"></div>
    </div> <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <form method="post" action="<?php echo DOMAINAD;?>orders/xuatfile">
                <table>
                    <tr>
                        <td style="width: 100px; font-weight: bold;"><label>Từ ngày:</label></td>
                        <td  style="width: 180px;"><input type="text" class="dated_loc text-input" name="tungay" placeholder="Từ ngày"/></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 100px; font-weight: bold;"><label>Tới ngày:</label></td>
                        <td><input type="text" class="dated_loc text-input" name="toingay" placeholder="Tới ngày"/></td>
                        <td><input type="submit" value="Xuất file exel"/></td>
                    </tr>
                </table>
            </form>
            <?php echo $this->Form->create(null, array('onsubmit' => 'return confirmDeleteSelected();','url' => DOMAINAD . strtolower(basename(dirname(__FILE__))). '/index', 'type' => 'post', 'name' => 'abc', 'inputDefaults' => array('label' => false, 'div' => false, 'legend'=> false))); ?>
            <table>
                <thead>
                    <tr>
                        <th width="3%"><input class="check-all" type="checkbox" /></th>
                        <th width="3%">STT</th>
                        <th style="width: 230px;">Thông tin</th>
                        <th>Đơn hàng</th>
                        <th width="2%">Id</th>
                        <th width="3%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $this->Order = ClassRegistry::init('Order');
                        foreach ($view as $key => $value){
                    ?>
                        <tr>
                            <td><input type="checkbox" name="check[<?php echo $value['Infocustomer']['id'];?>]" /></td>
                            <td><?php echo $key + $this->Paginator->counter('{:start}'); ?></td>
                            <td>
                                <ul style="width: 230px; border: 1px solid #fff;">
                                    <?php 
                                        echo '<li>Name: '.$value['Infocustomer']['name'].'</li>';
                                        echo '<li>Address: '.$value['Infocustomer']['address'].'</li>'; 
                                        echo '<li>Phone: '.$value['Infocustomer']['phone'].'</li>'; 
                                        echo '<li>Email: '.$value['Infocustomer']['email'].'</li>';
                                        //echo '<li>Size: '.$value['Infocustomer']['size'].'</li>';  
                                        echo '<li>Nội dung: '.$value['Infocustomer']['content'].'</li>';
                                        echo '<li style="color: red;">Ngày đặt hàng: '. date('d-m-Y', strtotime($value['Infocustomer']['created'])).'</li>';
                                    ?>
                                </ul>
                            </td>
                            <td>
                                <?php 
                                    $list_order = $this->Order->find('all', array(
                                        'conditions' => array(
                                            'Order.info_id' => $value['Infocustomer']['id']
                                        )
                                    ));
                                ?>
                                <div class="">
                                    <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="90"><div class="title_giohang" align="center"><?php echo lang('hinhanh');?></div></td>
                                            <td width="120"><div class="title_giohang" align="center"><?php echo lang('tensanpham');?></div></td>
                                            <td width="80"><div class="title_giohang" align="center"><?php echo lang('gia');?></div></td>
                                            <td width="57"><div class="title_giohang" align="center"><?php echo lang('soluong');?></div></td>
                                            <td width="96"><div class="title_giohang" align="center"><?php echo lang('tongtien');?></div></td>
                                        </tr>
                                        <?php 
                                            $total=0; $i=0; foreach($list_order as $key=>$product) {
                                            $anh = null; $link = null; $name = null; $gia = null;
                                            if(isset($product['Product']['id'])){
                                                $anh = $product['Product']['images']; 
                                                $link = $product['Product']['link']; 
                                                $name = $product['Product']['name']; 
                                                $gia = $product['Product']['price'];
                                            }
                                        ?>
                                        <tr>
                                            <td><div class="nd_giohang" align="center"><img width="60" src="<?php echo DOMAIN.'img/w80/h60/'.$anh; ?>" /></div></td>
                                            <td><div class="nd_giohang" align="left">
                                                <a href="<?php echo DOMAIN.$link;?>.html" target="_blank" title="<?php echo $name;?>"><?php echo$name;?></a>
                                            </div></td>
                                            <td><div class="nd_giohang" align="center"><?php echo number_format($gia);?> VNĐ</div></td>
                                            
                                            <td><div class="nd_giohang" align="center"><?php echo $product['Order']['slg']; ?></td>
                                            <td><div class="nd_giohang" align="center"><?php echo number_format($gia*$product['Order']['slg']);?> VNĐ</div></td>
                                        </tr>
                                        <?php 
                                            $total += $gia*$product['Order']['slg']; $i++;
                                            }
                                        ?>
                                    </table>
                                    <div class="" style="margin-top: 8px; text-align: right; margin-right: 4px;"><div class="tongtien_tt"><?php echo lang('tongtien');?>:&nbsp;<span style="color: red; font-weight: bold;"><?php echo number_format($total);?> VNĐ</span></div></div>
                                </div>
                            </td>
                            <td><?php echo $value['Infocustomer']['id']; ?></td>
                            <td>
                                <a href="javascript:confirmDelete('<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/delete/<?php echo $value['Infocustomer']['id'] ?>')" title="Xóa mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross.png" alt="Xóa" /></a>
                                <?php if($value['Infocustomer']['status'] == 1) { ?>
                                        <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/close/<?php echo $value['Infocustomer']['id'] ?>" title="Tích vào để không hiển thị mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/tick_circle.png" alt="Đã kích hoạt" /></a>
                                    <?php } else { ?>
                                        <a href="<?php echo DOMAINAD.strtolower(basename(dirname(__FILE__)));?>/active/<?php echo $value['Infocustomer']['id'] ?>" title="Tích vào để hiển thị mục này"><img src="<?php echo DOMAINAD ?>img/lotus/icons/cross_circle.png" alt="Chưa kích hoạt" /></a>
                                    <?php } ?>
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
<style type="text/css">
    .title_giohang{font-weight: bold; color: red; font-size: 13px;}
</style>




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