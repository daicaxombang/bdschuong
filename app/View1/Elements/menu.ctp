<div id="menu-display" style="display: none;">
    <i class="fa fa-bars" onclick="displaymenu();"></i>
    <div class="clear-main"></div>
    <input type="text" style="width: 0; height: 0; display: none;" id="input_tem" value="0"/>
    <div class="menu-respon">
        <div class="accordion" id="accordion2">
            <?php
                $this->Catproduct = ClassRegistry::init('Catproduct'); 
                foreach($danhmuc as $cap1){
                $dm_c2 = $this->Catproduct->find('all', array(
                    'conditions' => array(
                        'Catproduct.status' => 1,
                        'Catproduct.parent_id' => $cap1['Catproduct']['id'],
                    ),
                    'order' => 'Catproduct.order ASC'
                ));
            ?>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" <?php if(!empty($dm_c2)){?>data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $cap1['Catproduct']['id'];?>" title="<?php echo $cap1['Catproduct']['name'.LANGUAGE];?>"<?php }else{?>href="<?php if($cap1['Catproduct']['id'] == 1) echo DOMAIN; else echo DOMAIN.$cap1['Catproduct']['link'];?>"<?php }?>>
                            <?php echo $cap1['Catproduct']['name'.LANGUAGE];?>
                        </a>
                    </div>
                    <div id="collapse<?php echo $cap1['Catproduct']['id'];?>" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <?php 
                                foreach($dm_c2 as $cap2){
                                $dm_c3 = $this->Catproduct->find('all', array(
                                    'conditions' => array(
                                        'Catproduct.status' => 1,
                                        'Catproduct.parent_id' => $cap2['Catproduct']['id'],
                                    ),
                                    'order' => 'Catproduct.order ASC'
                                ));
                            ?>
                                <div class="menu-cap2">
                                    <a href="<?php echo DOMAIN.$cap2['Catproduct']['link'];?>"><?php echo $cap2['Catproduct']['name'.LANGUAGE];?></a>
                                </div>
                                <?php 
                                    if(!empty($dm_c3)){
                                    foreach($dm_c3 as $cap3){
                                ?>
                                    <div class="menu-cap2 menu-cap3">
                                        <a href="<?php echo DOMAIN.$cap3['Catproduct']['link'];?>"><?php echo $cap3['Catproduct']['name'.LANGUAGE];?></a>
                                    </div>
                                <?php }}?>
                            <?php }?>
                        </div>
                    </div>
                </div><!--end accordion-group-->
            <?php }?>
        </div>
    </div><!--end menu-respon-->
</div><!--end menu-display-->

<div class="bg-menu anmenu">
    <div class="position-relative">
        <div id="smoothmenu1" class="navhor">
            <?php echo $app_menu;?>
        </div>
    </div>
    <div class="clear-main"></div>
</div>

<script type="text/javascript">
    function displaymenu(){
        var temp = document.getElementById('input_tem').value;
        if(temp == '0'){
            $('#input_tem').val('1');
            $('.menu-respon').addClass('menu-respon-active');
        }else{
            $('.menu-respon').removeClass('menu-respon-active');
            $('#input_tem').val('0');    
        }
    }
</script>