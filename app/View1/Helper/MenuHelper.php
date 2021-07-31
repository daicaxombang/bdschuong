<?php
class MenuHelper extends AppHelper {

    public function init($array = array()){
        $Catalogue=ClassRegistry::init('Catalogue');
        $Catproduct=ClassRegistry::init('Catproduct');
        $Page=ClassRegistry::init('Page');
        
        $y=$Catproduct->find('all',array('conditions'=>array('Catproduct.status'=>1)));
        ?>
<ul>
<?php foreach($array as $key => $value){
    if(is_array($value)&&isset($value['menu'])){
        if($value['menu']=='url'){
            ?><li><a href="<?php if(isset($value['url'])) echo $value['url'];?>"><?php if(isset($value['name'])) echo $value['name'];?></a></li><?php
        }
        else if($value['menu']=='page' && isset($value['position'])){
            $menu_pages = $Page->find('all',array('conditions'=>array('Page.status'=>1,'Page.position'=>$value['position']),'order'=>array('Page.order'=>'DESC','Page.id'=>'DESC')));
            foreach($menu_pages as $menu_page){
                ?><li><a href="<?php echo DOMAIN.'p/'.$menu_page['Page']['link'];?>"><?php echo $menu_page['Page']['name'];?></a></li><?php
            }
        }
        else if($value['menu']=='catproduct'){
            
            if(isset($value['parent_id'])) $parent_id = $value['parent_id'];
            else $parent_id = null;
            
            if(isset($value['type'])) $type = $value['type'];
            else $type = null;
            
            if(isset($value['prefix'])) $prefix = $value['prefix'];
            else $prefix = null;
            
            
            
            $y=$Catproduct->find('all',array('conditions'=>array('Catproduct.status'=>1,'Catproduct.type'=>$type,'Catproduct.parent_id'=>$parent_id)));
            
            if(isset($value['display']) && $value['display']=='many'){
                
                foreach($y as $key => $value){?>
                <li>
                    <a href="<?php echo $prefix.$value['Catproduct']['link'];?>"><?php echo $value['Catproduct']['name'];?></a>
                    <?php
                        $y2=$Catproduct->find('all',array('conditions'=>array('Catproduct.status'=>1,'Catproduct.type'=>$type,'Catproduct.parent_id'=>$value['Catproduct']['id'])));
                        if(!empty($y2)){?>
                            <ul>
                                <?php foreach($y2 as $key2 => $value2){?>
                                <li>
                                    <a href="<?php echo $prefix.$value2['Catproduct']['link'];?>"><?php echo $value2['Catproduct']['name'];?></a>
                                    <?php
                                        $y3=$Catproduct->find('all',array('conditions'=>array('Catproduct.status'=>1,'Catproduct.type'=>$type,'Catproduct.parent_id'=>$value2['Catproduct']['id'])));
                                        if(!empty($y3)){?>
                                            <ul>
                                                <?php foreach($y3 as $key3 => $value3){?>
                                                <li>
                                                    <a href="<?php echo $prefix.$value3['Catproduct']['link'];?>"><?php echo $value3['Catproduct']['name'];?></a>
                                                </li>
                                                <?php }?>
                                            </ul>
                                        <?php }
                                    ?>
                                </li>
                                <?php }?>
                            </ul>
                        <?php }
                    ?>
                </li>
                <?php }
                
            }
            else{
                ?>
                <li>
                    <a href="<?php if(isset($value['url'])) echo $value['url'];else echo '#';?>"><?php if(isset($value['name'])) echo $value['name'];?></a>
                    <ul>
                        <?php foreach($y as $key => $value){?>
                        <li>
                            <a href="<?php echo $prefix.$value['Catproduct']['link'];?>"><?php echo $value['Catproduct']['name'];?></a>
                            <?php
                                $y2=$Catproduct->find('all',array('conditions'=>array('Catproduct.status'=>1,'Catproduct.type'=>$type,'Catproduct.parent_id'=>$value['Catproduct']['id'])));
                                if(!empty($y2)){?>
                                    <ul>
                                        <?php foreach($y2 as $key2 => $value2){?>
                                        <li>
                                            <a href="<?php echo $prefix.$value2['Catproduct']['link'];?>"><?php echo $value2['Catproduct']['name'];?></a>
                                            <?php
                                                $y3=$Catproduct->find('all',array('conditions'=>array('Catproduct.status'=>1,'Catproduct.type'=>$type,'Catproduct.parent_id'=>$value2['Catproduct']['id'])));
                                                if(!empty($y3)){?>
                                                    <ul>
                                                        <?php foreach($y3 as $key3 => $value3){?>
                                                        <li>
                                                            <a href="<?php echo $prefix.$value3['Catproduct']['link'];?>"><?php echo $value3['Catproduct']['name'];?></a>
                                                        </li>
                                                        <?php }?>
                                                    </ul>
                                                <?php }
                                            ?>
                                        </li>
                                        <?php }?>
                                    </ul>
                                <?php }
                            ?>
                        </li>
                        <?php }?>
                    </ul>
                </li>
                <?php
            }
        }
        else if($value['menu']=='catalogue'){
            
            if(isset($value['parent_id'])) $parent_id = $value['parent_id'];
            else $parent_id = null;
            
            if(isset($value['type'])) $type = $value['type'];
            else $type = null;
            
            if(isset($value['prefix'])) $prefix = $value['prefix'];
            else $prefix = null;
            
            
            
            $y=$Catalogue->find('all',array('conditions'=>array('Catalogue.status'=>1,'Catalogue.type'=>$type,'Catalogue.parent_id'=>$parent_id)));
            
            if(isset($value['display']) && $value['display']=='many'){
                
                foreach($y as $key => $value){?>
                <li>
                    <a href="<?php echo $prefix.$value['Catalogue']['link'];?>"><?php echo $value['Catalogue']['name'];?></a>
                    <?php
                        $y2=$Catalogue->find('all',array('conditions'=>array('Catalogue.status'=>1,'Catalogue.type'=>$type,'Catalogue.parent_id'=>$value['Catalogue']['id'])));
                        if(!empty($y2)){?>
                            <ul>
                                <?php foreach($y2 as $key2 => $value2){?>
                                <li>
                                    <a href="<?php echo $prefix.$value2['Catalogue']['link'];?>"><?php echo $value2['Catalogue']['name'];?></a>
                                    <?php
                                        $y3=$Catalogue->find('all',array('conditions'=>array('Catalogue.status'=>1,'Catalogue.type'=>$type,'Catalogue.parent_id'=>$value2['Catalogue']['id'])));
                                        if(!empty($y3)){?>
                                            <ul>
                                                <?php foreach($y3 as $key3 => $value3){?>
                                                <li>
                                                    <a href="<?php echo $prefix.$value3['Catalogue']['link'];?>"><?php echo $value3['Catalogue']['name'];?></a>
                                                </li>
                                                <?php }?>
                                            </ul>
                                        <?php }
                                    ?>
                                </li>
                                <?php }?>
                            </ul>
                        <?php }
                    ?>
                </li>
                <?php }
                
            }
            else{
                ?>
                <li>
                    <a href="<?php if(isset($value['url'])) echo $value['url'];else echo '#';?>"><?php if(isset($value['name'])) echo $value['name'];?></a>
                    <ul>
                        <?php foreach($y as $key => $value){?>
                        <li>
                            <a href="<?php echo $prefix.$value['Catalogue']['link'];?>"><?php echo $value['Catalogue']['name'];?></a>
                            <?php
                                $y2=$Catalogue->find('all',array('conditions'=>array('Catalogue.status'=>1,'Catalogue.type'=>$type,'Catalogue.parent_id'=>$value['Catalogue']['id'])));
                                if(!empty($y2)){?>
                                    <ul>
                                        <?php foreach($y2 as $key2 => $value2){?>
                                        <li>
                                            <a href="<?php echo $prefix.$value2['Catalogue']['link'];?>"><?php echo $value2['Catalogue']['name'];?></a>
                                            <?php
                                                $y3=$Catalogue->find('all',array('conditions'=>array('Catalogue.status'=>1,'Catalogue.type'=>$type,'Catalogue.parent_id'=>$value2['Catalogue']['id'])));
                                                if(!empty($y3)){?>
                                                    <ul>
                                                        <?php foreach($y3 as $key3 => $value3){?>
                                                        <li>
                                                            <a href="<?php echo $prefix.$value3['Catalogue']['link'];?>"><?php echo $value3['Catalogue']['name'];?></a>
                                                        </li>
                                                        <?php }?>
                                                    </ul>
                                                <?php }
                                            ?>
                                        </li>
                                        <?php }?>
                                    </ul>
                                <?php }
                            ?>
                        </li>
                        <?php }?>
                    </ul>
                </li>
                <?php
            }
        }
    }
}?>
</ul>
<?php
    }
}
?>
