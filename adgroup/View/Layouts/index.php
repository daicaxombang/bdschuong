<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
        Admin
		<?php //echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        //giao diện chính
		echo $this->Html->css(array('lotus/reset', 'lotus/style', 'lotus/invalid', 'lotus/icon')); 
        echo $this->Html->script(array('jquery-1.8.3.min', 'lotus/simpla.jquery.configuration'));

        //tùy chỉnh
        echo $this->Html->script(array('function'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
        if($theme) echo '<link rel="stylesheet" type="text/css" href="'.DOMAINAD.'/theme/'.$theme.'/style.css" />';
	?>
    
    <?php echo $this->Html->script('ckeditor/ckeditor'); ?>
    <script type="text/javascript">
    CKEDITOR.editorConfig = function( config ) {
    	// Define changes to default configuration here. For example:
    	config.language = 'vi';
    	//config.uiColor = '#AADC6E';
    	config.skin='kama';
    	//config.enterMode = CKEDITOR.ENTER_BR;
        config.height = 300;
    
    	config.filebrowserBrowseUrl 		= '<?php echo DOMAINAD;?>js/ckfinder/ckfinder.html';
    	config.filebrowserImageBrowseUrl 	= '<?php echo DOMAINAD;?>js/ckfinder/ckfinder.html?type=Images';
    	config.filebrowserFlashBrowseUrl 	= '<?php echo DOMAINAD;?>js/ckfinder/ckfinder.html?type=Flash';
    	config.filebrowserUploadUrl 		= '<?php echo DOMAINAD;?>js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    	config.filebrowserImageUploadUrl 	= '<?php echo DOMAINAD;?>js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    	config.filebrowserFlashUploadUrl 	= '<?php echo DOMAINAD;?>js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
    };
    </script>
</head>
<body>
<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
	
	<div id="sidebar">
        <?php echo $this->element('sidebar');?>
    </div> <!-- End #sidebar -->
	
	<div id="main-content"> <!-- Main Content Section with everything -->
		
		<noscript> <!-- Show a notification if the user has disabled javascript -->
			<div class="notification error png_bg">
				<div>
					Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
				</div>
			</div>
		</noscript>
		<?php //echo $this->element('header'); ?>

        <?php //echo $this->Session->flash(); ?>
        
        <div style="float: left;"><?php echo $this->element('wellcome');?></div>

		<?php echo $this->fetch('content'); ?>
		
		<div id="footer">
			<small>
                <?php echo $this->element('footer');?>
			</small>
		</div><!-- End #footer -->
		
	</div> <!-- End #main-content -->
	
</div>
	<?php //echo $this->element('sql_dump'); ?>
<script type="text/javascript">
$('.ckeditor-mini').each(function(){
    CKEDITOR.replace($(this).attr('name'), {'toolbar': [
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source'] },
    	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
    	'/',
    	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
    ] });
});
</script>
</body>
</html>
