<?php if(isset($imgpupup)){?>
<script type="text/javascript" src="<?php echo DOMAIN ?>popup/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN ?>popup/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN ?>popup/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
	$(document).ready(function() {

		$("a[rel=example_group]").fancybox({
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'titlePosition' 	: 'over',
			'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
				return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
			}
		});

	});
</script>
 
<?php //if($this->Session->read('activepopup') != 2){if(!empty($popup)){ ?>
    <script type="text/javascript">
    		$(document).ready(function(){
    		var message = $('#message').css('display','block');
    		$.fancybox({content:message}); 
    		})
    		
    		function fancybox1234(){
    			//$("#fancybox1234").click(function(){
    				$('#fancybox-loading').hide();
    				$('#fancybox-overlay').hide();
    				$('#fancybox-wrap').hide();
    			//});
    		}
    </script>
    <div id="message" style="display:none; border-radius: 6px;">
        
            <a href="<?php //echo $advthree['Extention']['url'];?>" title="<?php //echo $advthree['Extention']['name'];?>">
                <img src="<?php echo DOMAIN;?>img/<?php echo $imgpupup;?>"/>
            </a>
        
    </div>
<?php //}}?>
<?php }?>