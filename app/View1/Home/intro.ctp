<section>
    <style type="text/css">
        body {
            background: url("<?php echo DOMAIN;?>images/trang-info.png") no-repeat;
            background-size: cover;
        }

        @media (max-width: 767px) {
            body{background: #ddd;}
            .wrap-menu{display: none;}

            .wrap-logo{padding: 20px 0 35px 0;}

            .wrap-dichvu{}
            .wrap-dichvu ul{overflow: hidden;}
            .wrap-dichvu ul li{list-style: none; float: left; width: 48.75%; background: #fff; margin-left: 2%; margin-bottom: 2%; text-align: center; border-radius: 25px; -moz-border-radius: 25px; -webkit-border-radius: 25px;}
            .wrap-dichvu ul li:first-child{margin-left: 0;}
            .wrap-dichvu ul li:nth-child(2n+1){margin-left: 0;}
            .wrap-dichvu ul li div{padding: 25px;}
            .wrap-dichvu ul li label{color: #d61906; text-transform: uppercase; font-weight: bold; font-size: 15px; margin: 15px 0 0 0; height: 60px; overflow: hidden;}
        }

    </style>
    <div class="wrap-logo">
        <a href="/trang-chu">
            <img src="<?php echo DOMAIN; ?>images/logo-it.png">
        </a>
    </div>
    <div class="main-width">
        <div class="wrap-dichvu">
            <ul>
                <?php foreach ($danhmucintro as $row) { ?>
                    <li>
                        <div>
                            <a href="<?php echo DOMAIN . $row['Catproduct']['link']; ?>"
                               title="<?php echo $row['Catproduct']['name']; ?>" target="_blank">
                                <img src="<?php echo DOMAIN . 'img/w108/h108/' . $row['Catproduct']['images']; ?>"
                                     title="<?php echo $row['Catproduct']['name']; ?>"
                                     alt="<?php echo $row['Catproduct']['name']; ?>"/>
                            </a>
                            <label><?php echo $row['Catproduct']['name']; ?></label>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="wrap-menu">
        <div class="main-width">
            <?php echo $app_menu;?>
            <a href="<?php echo $setting['facebook'];?>" target="_blank">
                <img src="<?php echo DOMAIN; ?>images/face.png" width="25" />
            </a>
        </div>
    </div>
</section>