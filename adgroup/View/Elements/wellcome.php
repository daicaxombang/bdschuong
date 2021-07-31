<h2>Xin chào <?php echo $this->Session->read('name'); ?></h2>
    <p id="page-intro">Chọn giao diện 
    
<?php
$images = glob(ROOT.DS.ADMIN_DIR.DS.WEBROOT_DIR.DS.'theme'.DS.'*.png');

foreach($images as $image)
{
    $file_name = basename($image);
    $name = substr($file_name, 0, -4);
    ?>
<a href="<?php echo DOMAINAD;?>accounts/theme/<?php echo $name;?>"><img src="<?php echo DOMAINAD.'theme/'.$file_name;?>" style="width: 16px;height: 16px;" /></a>
<?php }?>

</p>

<div>
<a href="<?php echo DOMAIN; ?>" title="Xem trang chính" target="_blank">Xem trang chính</a> | <a href="<?php echo DOMAINAD ?>accounts/logout" title="Thoát">Thoát</a>
</div>
<br />