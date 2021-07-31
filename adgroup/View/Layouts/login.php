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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('style'));
        echo $this->Html->script(array('jquery-1.8.3.min.js', 'modernizr.custom.63321.js'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <style>
		body {
			background: #e1c192 url(<?php echo DOMAINAD;?>img/wood_pattern.jpg);
		}
	</style>
</head>
<body>
<div class="container">
	<?php echo $this->fetch('content'); ?>
</div>
<!-- jQuery if needed -->
<script type="text/javascript">
	$(function(){
	    $(".showpassword").each(function(index,input) {
	        var $input = $(input);
	        $("<p class='opt'/>").append(
	            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
	                var change = $(this).is(":checked") ? "text" : "password";
	                var rep = $("<input placeholder='Password' type='" + change + "' />")
	                    .attr("id", $input.attr("id"))
	                    .attr("name", $input.attr("name"))
	                    .attr('class', $input.attr('class'))
	                    .val($input.val())
	                    .insertBefore($input);
	                $input.remove();
	                $input = rep;
	             })
	        ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
	    });

	    $('#showPassword').click(function(){
			if($("#showPassword").is(":checked")) {
				$('.icon-lock').addClass('icon-unlock');
				$('.icon-unlock').removeClass('icon-lock');    
			} else {
				$('.icon-unlock').addClass('icon-lock');
				$('.icon-lock').removeClass('icon-unlock');
			}
	    });
	});
</script>		
</body>
</html>