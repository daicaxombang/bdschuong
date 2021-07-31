<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#" class="no-js" lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="image/x-icon" href="<?php echo DOMAIN ?>images/lgt.png" rel="icon">
    <link type="image/x-icon" href="<?php echo DOMAIN ?>images/lgt.png" rel="shortcut icon">
    <?php
    if (isset($keywords_for_layout)) {
        echo "<meta name='keywords' content='" . $keywords_for_layout . "' /> ";
    }
    if (isset($description_for_layout)) {
        echo "<meta name='description' content='" . $description_for_layout . "' />";
    }
    ?>
    <title>
        <?php
        if (isset($title_for_layout)) {
            echo $title_for_layout;
        }
        ?>
    </title>
    <script type="text/javascript" src="<?php echo DOMAINAD;?>datepicker-ui/js/jquery-1.10.2.js"></script>

    <?php
        $css = array(
            '/css/root/bootstrap.min',
            '/css/root/bootstrap-responsive',
            '/icon-font/css/font-awesome',
            '/css/root/pagination',
            '/css/menu/ddsmoothmenu',
            //'/css/menu/ddsmoothmenu-v',
            //'/chay2ben/fix-menu-chay',
            //'/css/animate',
            '/css/animation',
            '/carol/style',
            '/css/style',
            '/css/responsive',
            '/css/reset'
        );
        $js = array(
            '/js/root/jquery-1.7.2.min.js',
            '/js/root/bootstrap.min.js',
            '/js/root/application',
            //'/js/jquery.min',
            '/js/menu/ddsmoothmenu',
            '/carol/jquery.carouFredSel-3.1.0-packed',
            //'/chay2ben/nagging-menu',
            //'/js/wow.min',
        );
        
        echo $this->Html->css($css);
        echo $this->Html->script($js);
    ?>
    <script type="text/javascript">
        ddsmoothmenu.init({
            mainmenuid: "smoothmenu1", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'navhor', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })
        /*ddsmoothmenu.init({
            mainmenuid: "smoothmenu2", //Menu DIV id
            orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
            //customtheme: ["#804000", "#482400"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })*/
    </script>
    <script type="text/javascript" language="javascript">
        $(function() {
            $('ul#user_interaction').carouFredSel({
                circular: false,
                auto: true,
                items: 3,
                scroll: 1,
                prev: "#prev1",
                next: "#next1"
            });
        });
    </script>
    <script>
        //new WOW().init();
    </script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php echo $this->element('header');?>
<?php //echo $this->element('pup-up');?>

<div class="main-width">
    <?php echo $this->fetch('content');?>
    <div class="clear-main"></div>
</div>
<?php echo $this->element('footer');?>



<?php if(isset($trangchu)) if(isset($setting['theh1'])){?>
    <div style="position: absolute; top: -99999px;"><h1><?php echo $setting['theh1'];?></h1></div>
<?php }?>
<?php echo $setting['chenthekhac'];?>
</body>
</html>