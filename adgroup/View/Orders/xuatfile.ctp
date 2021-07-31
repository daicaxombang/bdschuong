<style>
    table, td{font-family: arial; font-size: 12px; border: 1px solid #ddd;}
    td{padding: 5px;}
    .title-form{font-size: 13px; font-weight: bold; padding: 5px;}
    .title-form-content{font-size: 12px; padding: 5px;}
</style>
<?php 
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    header("Content-Type: application/force-download");
    header("Content-Type: application/download");
    header ("Content-Disposition: attachment; filename=\"$title_file.xls" );
    header ("Content-Description: Generated Report");
?>
<style type="text/css">
    .title_giohang{font-weight: bold; color: red; font-size: 13px;}
</style>
<table cellpadding="0" cellspacing="0"  style="width: 800px;">
    <tr>
        <td  style="width: 800px;" class="title-form">Sản phẩm</td>
    </tr>
    <?php 
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $this->Order = ClassRegistry::init('Order');
        foreach($list as $value){
    ?>
        <tr>
            <td class="title-form-content" style="width: 800px;">
                <div style="width: 230px; border: 1px solid #fff;">
                    <?php 
                        echo '<div>Name: '.$value['Infocustomer']['name'].'</div>';
                        echo '<div>Address: '.$value['Infocustomer']['address'].'</div>'; 
                        echo '<div>Phone: '.$value['Infocustomer']['phone'].'</div>'; 
                        echo '<div>Email: '.$value['Infocustomer']['email'].'</div>';
                        //echo '<li>Size: '.$value['Infocustomer']['size'].'</li>';  
                        echo '<div>Nội dung: '.$value['Infocustomer']['content'].'</div>';
                        echo '<div style="color: red;">Ngày đặt hàng: '. date('d-m-Y', strtotime($value['Infocustomer']['created'])).'</div>';
                    ?>
                </div>
                <div>&nbsp;</div>
                <?php 
                    $list_order = $this->Order->find('all', array(
                        'conditions' => array(
                            'Order.info_id' => $value['Infocustomer']['id']
                        )
                    ));
                ?>
                <div class="">
                    <table width="800px" border="1" cellspacing="0" cellpadding="0">
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
                            <td style="width: 100px; height: 60px;"><div class="nd_giohang" style="width: 100px;" align="center"><img width="60" src="<?php echo DOMAIN.'img/w80/h60/'.$anh; ?>" />&nbsp;&nbsp;&nbsp;</div></td>
                            <td><div class="nd_giohang" align="left">
                                <a href="<?php echo DOMAIN.$link;?>.html" target="_blank" title="<?php echo $name;?>"><?php echo$name;?></a>
                            </div></td>
                            <td><div class="nd_giohang" align="center"><?php echo number_format($gia);?> VNĐ</div></td>
                            
                            <td><div class="nd_giohang" align="center"><?php echo $product['Order']['slg']; ?></div></td>
                            <td><div class="nd_giohang" align="center"><?php echo number_format($gia*$product['Order']['slg']);?> VNĐ</div></td>
                        </tr>
                        <?php 
                            $total += $gia*$product['Order']['slg']; $i++;
                            }
                        ?>
                    </table>
                    <div class="" style="margin-top: 8px; text-align: right; margin-right: 4px;"><div class="tongtien_tt"><?php echo lang('tongtien');?>:&nbsp;<span style="color: red; font-weight: bold;"><?php echo number_format($total);?> VNĐ</span></div></div>
                </div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
            </td>
        </tr>
    <?php }?>
</table>