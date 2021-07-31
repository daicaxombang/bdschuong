<div class="b-left-dm" style="padding-top: 15px;">
	<label>Hỗ trợ trực tuyến</label>
</div>
<div class="b-support">
	<?php $dem = 1; foreach($hotrotructuyen as $value){?>
		<div class="b-info-sp" <?php if($dem == count($hotrotructuyen)) echo 'style="border: 0; margin: 0;"';?>>
			<div class="b-sp-name"><?php echo $value['Support']['name'];?></div>
			<div class="b-sp-phone"><?php echo $value['Support']['phone'];?></div>
			<div class="b-sp-email"><?php echo $value['Support']['email'];?></div>
			<div class="b-sp-skype">
				<a href="skype:<?php echo $value['Support']['skype'];?>?chat">
					<img src="<?php echo DOMAIN;?>images/skype.png" width="35" border="0" title="<?php echo $value['Support']['name'];?>"/>
				</a>
			</div>
		</div>
	<?php $dem ++;}?>
</div>

<div class="b-video"><?php echo $setting['video'];?></div>

<?php foreach($quangcaophai as $value){?>
	<div class="b-quangcaophai">
		<a href="<?php echo $value['Extention']['url'];?>" title="<?php echo $value['Extention']['name'];?>" target="_blank">
			<img src="<?php echo DOMAIN;?>img/<?php echo $value['Extention']['images'];?>" title="<?php echo $value['Extention']['name'];?>" alt="<?php echo $value['Extention']['name'];?>" />
		</a>
	</div>
<?php }?>