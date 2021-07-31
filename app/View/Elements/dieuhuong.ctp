<div class="box-dieuhuong">
	<div class="main-width">
	    <a href="<?php echo DOMAIN;?>" title="Trang chủ">Trang chủ</a>
	    <?php if(isset($cat_parent['Catproduct']['name'])){?><i class="fa fa-angle-right"></i><a href="<?php echo DOMAIN.$cat_parent['Catproduct']['link'];?>" title="<?php echo $cat_parent['Catproduct']['name'];?>"><?php echo $cat_parent['Catproduct']['name'];?></a><?php }?>
	    <?php if(isset($cat['Catproduct']['name'])){?><i class="fa fa-angle-right"></i><a href="<?php echo DOMAIN.$cat['Catproduct']['link'];?>" title="<?php echo $cat['Catproduct']['name'];?>"><?php echo $cat['Catproduct']['name'];?></a><?php }?>
	    <?php if(isset($detailNews['Catproduct']['name'])){?><i class="fa fa-angle-right"></i><a href="<?php echo DOMAIN.$detailNews['Catproduct']['link'];?>" title="<?php echo $detailNews['Catproduct']['name'];?>"><?php echo $detailNews['Catproduct']['name'];?></a><?php }?>
	    <?php if(isset($detailNews['Product']['name'])){?><i class="fa fa-angle-right"></i><a href="<?php echo DOMAIN.$detailNews['Product']['link'];?>.html" title="<?php echo $detailNews['Product']['name'];?>"><?php echo $detailNews['Product']['name'];?></a><?php }?>
	    <?php if(isset($detailNews['Post']['name'])){?><i class="fa fa-angle-right"></i><a href="<?php echo DOMAIN.$detailNews['Post']['link'];?>.html" title="<?php echo $detailNews['Post']['name'];?>"><?php echo $detailNews['Post']['name'];?></a><?php }?>
	    <?php if(isset($giohang)){?><i class="fa fa-angle-right"></i><a href="<?php echo DOMAIN.'hien-gio-hang-cua-mat-hang.html';?>" title="<?php echo $giohang;?>"><?php echo $giohang;?></a><?php }?>
    </div>
</div>