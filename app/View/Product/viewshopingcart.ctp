<div class="box-shadow">
    <?php echo $this->element('dieuhuong');?>
    <div class="ct-tt">
        <table width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td width="90"><div class="title_giohang" align="center"><?php echo lang('hinhanh');?></div></td>
                <td width="120"><div class="title_giohang" align="center"><?php echo lang('tensanpham');?></div></td>
                <td width="80"><div class="title_giohang" align="center"><?php echo lang('gia');?></div></td>
                <td width="57"><div class="title_giohang" align="center"><?php echo lang('soluong');?></div></td>
                <td width="96"><div class="title_giohang" align="center"><?php echo lang('tongtien');?></div></td>
                <td width="55"><div class="title_giohang" align="center"><?php echo lang('capnhat');?></div></td>
                <td width="50"><div class="title_giohang" align="center"><?php echo lang('xuly');?></div></td>
            </tr>
            <?php $total=0; $i=0; foreach($shopingcart as $key=>$product) {?>
            <tr>
                <td><div class="nd_giohang" align="center"><img width="60" src="<?php echo $product['images']; ?>" /></div></td>
                <td><div class="nd_giohang" align="left"><?php echo $product['name'];?></div></td>
                <td><div class="nd_giohang" align="center"><?php echo number_format($product['price']);?> VNĐ</div></td>
                
                <td><div class="nd_giohang" align="center">
                <form name="view<?php echo $i; ?>" action="<?php echo DOMAIN;?>productupdate/<?php echo $key;?>" method="post">
                <input style="width:50px;" type="text" name="soluong" value="<?php echo $product['sl']; ?>"/>
                </form>
                </div></td>
                <td><div class="nd_giohang" align="center"><?php echo number_format($product['price']*$product['sl']);?> VNĐ</div></td>
                <td><div class="nd_giohang" align="center"><input onclick="document.view<?php echo $i; ?>.submit();"  type="button" class="btn btn-small" value="Edit" /></div></td>
                <td><div class="nd_giohang" align="center"><a href="<?php echo DOMAIN;?>productdelete/<?php echo $key;?>"><input type="button" class="btn btn-small" value="Delete" /></a></div></td>
            </tr>
            <?php $total +=$product['total']; $i++;}?>
        </table>
        <div class="" style="margin-top: 8px; text-align: right; margin-right: 4px;"><div class="tongtien_tt"><?php echo lang('tongtien');?>:&nbsp;<span style="color: red; font-weight: bold;"><?php echo number_format($total);?> VNĐ</span>&nbsp;&nbsp;<a href="<?php echo DOMAIN?>lien-he-mua-hang"><input type="button" class="btn btn-small" value="<?php echo lang('thanhtoan');?>" /></a></div></div>
    </div>
</div>