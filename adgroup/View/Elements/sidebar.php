<?php

?>
<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
	
	<h1 id="sidebar-title"><a href="#">Admin</a></h1>
  
	<!-- Logo (221px wide) -->
	<a href="<?php echo DOMAINAD;?>">
        <div style="text-align: center; vertical-align: central;">
            <img id="logo" src="http://multitemplate.com/ic/logo.png" alt="lotus Admin logo" />
        </div>
    </a>
  
	<!-- Sidebar Profile links 
	<div id="profile-links">
		Xin chào <a href="#" title="Edit your profile"><?php echo $this->Session->read('name'); ?></a>, bạn có <a href="#messages" rel="modal" title="3 Messages">3 tin nhắn.</a><br />
		<br />
		<a href="<?php echo DOMAIN; ?>" title="Xem trang chính" target="_blank">Xem trang chính</a> | <a href="<?php echo DOMAINAD ?>login/logout" title="Thoát">Thoát</a>
	</div>-->






	<ul id="main-nav">  <!-- Accordion Menu -->
		
		<li>
			<a href="<?php echo DOMAINAD; ?>" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('home');?>">
				Trang chủ
			</a>       
		</li>
        <li><a href="<?php echo DOMAINAD ?>danhmucs" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('danhmucs');?>">
        Sắp xếp menu</a></li>
        <li>
			<a href="#" class="nav-top-item <?php echo $this->Common->menu_current(array('catproducts','products', 'exttmps', 'exttmptwos'));?>">
			Quản lý sản phẩm
			</a>
			<ul>
                <li><a class="<?php echo $this->Common->menu_current('catproducts');?>"href="<?php echo DOMAINAD ?>catproducts">
                Mục lục</a></li>
                <li><a class="<?php echo $this->Common->menu_current('products');?>" href="<?php echo DOMAINAD ?>products">
                Bài viết</a></li>
                <!--<li><a class="<?php echo $this->Common->menu_current('exttmps');?>" href="<?php echo DOMAINAD ?>exttmps">
                Size</a></li>
                <li><a class="<?php echo $this->Common->menu_current('exttmptwos');?>" href="<?php echo DOMAINAD ?>exttmptwos">
                Mầu</a></li>-->
			</ul>
		</li>
        <!--<li><a href="<?php echo DOMAINAD?>hangs" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('hangs');?>">
        Hãng</a></li>-->
        
        <li>
			<a href="#" class="nav-top-item <?php echo $this->Common->menu_current(array('catnews','posts', 'catnewimgs'));?>">
                Quản lý bài viết
			</a>
			<ul>
                <li><a class="<?php echo $this->Common->menu_current('catnews');?>"href="<?php echo DOMAINAD ?>catnews">
                Mục lục</a></li>
                <li><a class="<?php echo $this->Common->menu_current('posts');?>" href="<?php echo DOMAINAD ?>posts">
                Bài viết</a></li>
			</ul>
		</li>
		<!--<li>
			<a href="#" class="nav-top-item <?php echo $this->Common->menu_current(array('catnewtwos','posttwos'));?>">
			Quản lý bài viết
			</a>
			<ul>
                <li><a class="<?php echo $this->Common->menu_current('catnewtwos');?>"href="<?php echo DOMAINAD ?>catnewtwos">
                Mục lục</a></li>
                <li><a class="<?php echo $this->Common->menu_current('posttwos');?>" href="<?php echo DOMAINAD ?>posttwos">
                Bài viết</a></li>
			</ul>
		</li>-->
		<!--<li><a href="<?php echo DOMAINAD?>posthoidaps" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('posthoidaps');?>">
        Hỏi đáp</a></li>-->
        <li>
			<a href="#" class="nav-top-item <?php echo $this->Common->menu_current(array('advones', 'advtwos', 'advthrees', 'advrightones', 'advlefts', 'advrights'));?>">
			Quản lý quảng cáo
			</a>
			<ul>
                <li><a class="<?php echo $this->Common->menu_current('advrights');?>"href="<?php echo DOMAINAD ?>advrights">
                Quảng cáo phải</a></li>
                <li><a class="<?php echo $this->Common->menu_current('advrightones');?>"href="<?php echo DOMAINAD ?>advrightones">
                Ảnh tư vấn</a></li>
                <!--<li><a class="<?php echo $this->Common->menu_current('advthrees');?>"href="<?php echo DOMAINAD ?>advthrees">
                Pop-up</a></li>-->
                <!--<li><a class="<?php echo $this->Common->menu_current('advones');?>"href="<?php echo DOMAINAD ?>advones">
                Chạy trái</a></li>  
                <li><a class="<?php echo $this->Common->menu_current('advtwos');?>"href="<?php echo DOMAINAD ?>advtwos">
                Chạy phải</a></li>-->
			</ul>
		</li>
        <li><a href="<?php echo DOMAINAD?>banners" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('banners');?>">
        Banner</a></li>
        <li><a href="<?php echo DOMAINAD?>orders" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('orders');?>">
        Đơn hàng</a></li>
        <!--<li><a href="<?php echo DOMAINAD?>logos" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('logos');?>">
        Logo</a></li>-->
        <li><a href="<?php echo DOMAINAD?>emaildks" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('emaildks');?>">
        Email đăng ký</a></li>
        <li><a href="<?php echo DOMAINAD?>slideshows" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('slideshows');?>">
        Slideshow</a></li>
        <!--<li><a href="<?php echo DOMAINAD?>advrighttwos" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('advrighttwos');?>">
        Slideshow 2</a></li>
        -->
        <!--<li><a href="<?php echo DOMAINAD?>users" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('users');?>">
        Quản lý tài khoản</a></li>-->
<!--        <li><a href="--><?php //echo DOMAINAD?><!--supports" class="nav-top-item no-submenu --><?php //echo $this->Common->menu_current('supports');?><!--">-->
<!--        Hỗ trợ</a></li>-->
        <li><a href="<?php echo DOMAINAD?>settings" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('settings');?>">
        Cấu hình</a></li>
        
        <li><a href="<?php echo DOMAINAD?>accounts" class="nav-top-item no-submenu <?php echo $this->Common->menu_current('accounts');?>">
        Tài khoản</a></li>
	</ul> <!-- End #main-nav -->
    
    
	
	<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
		
		<h3>3 Messages</h3>
	 
		<p>
			<strong>17th May 2009</strong> by Admin<br />
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
			<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
		</p>
	 
		<p>
			<strong>2nd May 2009</strong> by Jane Doe<br />
			Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
			<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
		</p>
	 
		<p>
			<strong>25th April 2009</strong> by Admin<br />
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
			<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
		</p>
		
		<form action="" method="post">
		
			<h4>New Message</h4>
			
			<fieldset>
				<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
			</fieldset>
			
			<fieldset>
			
				<select name="dropdown" class="small-input">
					<option value="option1">Send to...</option>
					<option value="option2">Everyone</option>
					<option value="option3">Admin</option>
					<option value="option4">Jane Doe</option>
				</select>
				
				<input class="button" type="submit" value="Send" />
				
			</fieldset>
			
		</form>
		
	</div> <!-- End #messages -->
	
</div>