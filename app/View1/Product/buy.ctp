    <div class="b-bar-home">
    <?php if(isset($cat['Catproduct']['name'])){?>
        <a href="<?php echo DOMAIN.$cat['Catproduct']['link'];?>" title="<?php echo $cat['Catproduct']['name'];?>">
            <h1><?php echo $cat['Catproduct']['name'];?></h1>
        </a>
    <?php }else{?>
        <a href="#" title="<?php echo $title_for_layout;?>">
            <h1><?php echo $title_for_layout;?> <?php if($this->request->params['action'] == 'timkiem'){?><span style="text-transform: none;">(<?php if($this->Session->check('tukhoa')) echo $this->Session->read('tukhoa');?>)</span><?php }?></h1>
        </a>
    <?php }?>
</div><!--end b-bar-home-->

<div class="box-shadow">
    <div class="ct-tt">
        <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped table-bordered">
            <tr>
                <th width="90"><div class="title_giohang" align="center"><?php echo lang('hinhanh');?></div></th>
                <th width="120"><div class="title_giohang" align="center"><?php echo lang('tensanpham');?></div></th>
                <th width="80"><div class="title_giohang" align="center"><?php echo lang('gia');?></div></th>
                <th width="80"><div class="title_giohang" align="center"><?php echo lang('Size');?></div></th>
                <th width="80"><div class="title_giohang" align="center"><?php echo lang('Color');?></div></th>
                <th width="57"><div class="title_giohang" align="center"><?php echo lang('soluong');?></div></th>
                <th width="96"><div class="title_giohang" align="center"><?php echo lang('tongtien');?></div></th>
                <th width="55"><div class="title_giohang" align="center"><?php echo lang('capnhat');?></div></th>
                <th width="50"><div class="title_giohang" align="center"><?php echo lang('xuly');?></div></th>
            </tr>
            <?php $total=0; $i=0; foreach($shopingcart as $key=>$product) {?>
            <tr>
                <td><div class="nd_giohang" align="center"><img width="60" src="<?php echo $product['images']; ?>" /></div></td>
                <td><div class="nd_giohang" align="left"><?php echo $product['name'];?></div></td>
                <td><div class="nd_giohang" align="center"><?php echo number_format($product['price']);?> VNĐ</div></td>
                <td><div class="nd_giohang" align="center"><?php if(isset($product['size'])) echo $product['size'];?></div></td>
                <td><div class="nd_giohang" align="center"><?php if(isset($product['color'])) echo $product['color'];?></div></td>
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

<div class="b-bar-home ">
        <a href="#" title="<?php echo $title_for_layout;?>">
            <h1>Thông tin khách hàng</h1>
        </a>
    </div><!--end b-bar-home-->

    <div class="box-shadow">
        <form method="post" id="check_form" action="<?php echo DOMAIN; ?>dat-hang">
        <!--form luu thong tin hang gui mail-->
            <input class="contacts" type="hidden" value="<?php echo $product['images']; ?>" name="images"/>
            <input class="contacts" type="hidden" value="<?php echo $product['name']; ?>" name="product_name"/>
            <input class="contacts" type="hidden" value="<?php echo $product['price']; ?>" name="price"/>
            <input class="contacts" type="hidden" value="<?php echo $product['sl']; ?>" name="sl"/>
            <input class="contacts" type="hidden" value="<?php echo ($product['price']*$product['sl']);?>" name="tt_1sp"/>
        <!---->
            <table class="guimail">
                <tr><td><div class="title_thongtin"><?php echo lang('hoten');?>: </div></td><td><input id="input" placeholder="Name" name="name" class="validate[required]" type="text" required="" /></td></tr>
                <tr><td><div class="title_thongtin"><?php echo lang('phone');?>: </div></td><td><input id="input" placeholder="Phone" type="text" class="validate[required]" name="phone" required="" /></td></tr>
                <tr><td><div class="title_thongtin"><?php echo lang('Email');?>: </div></td><td><input id="email" type="text" placeholder="Email" class="validate[required]" name="email" required="" /></td></tr>
                <tr><td><div class="title_thongtin"><?php echo lang('diachi');?>: </div></td><td><input id="input" placeholder="Address" type="text" class="validate[required]" name="address" style="width: 500px;" required="" /></td></tr>
                <tr><td><div class="title_thongtin"><?php echo 'Yêu cầu thêm';?>: &nbsp; &nbsp;</div></td><td><textarea name="dateto" cols="150" style="width: 500px;" rows="5"></textarea><div style="height: 5px;"></div></td></tr>
                <tr>
                    <td><div class="title_thongtin"><?php echo 'Captcha';?>: &nbsp; &nbsp;</div></td>
                    <td>
                        <input type="text" name="captcha" class="span2" placeholder="captcha" required="" required=""/><img id="img_CAPTCHA_RESULT_send" style="width: 88px;" src="<?php echo DOMAIN;?>captcha" alt="" noloaderror="1" /><img id="reloadCaptcha" class="reloadCapcha" onmouseover="this.style.cursor='pointer'" onclick="img_reload();" title="Đổi mã an toàn" alt="renew capcha" src="<?php echo DOMAIN;?>images/icon-reload.png" />
                    </td>
                </tr>
                <tr><td></td><td><input type="submit" class="btn btn-small btn-danger" value=" <?php echo 'Đặt hàng';?> " style="width: 80px; height: 28px;"/>&nbsp;<input type="reset" class="btn btn-small" value=" <?php echo 'Làm lại';?> " style="width: 80px; height: 28px;"/></td></tr>
            </table>
        </form>
    </div>
    <script type="text/javascript">
        function img_reload(){
            document.getElementById("img_CAPTCHA_RESULT_send").src = document.getElementById("img_CAPTCHA_RESULT_send").src.split("?")[0] + "?"+Math.random();;
        }
    </script> 