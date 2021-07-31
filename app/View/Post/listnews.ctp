
<div class="bar-product">
    <div class="list-category-product-title-left">
        <a href="#">
            <?php if(isset($cat['Catproduct']['name'])){?>
                <h1><?php echo $cat['Catproduct']['name'];?></h1>
            <?php }else{?>
                <h1><?php echo $title_for_layout;?> <?php if($this->request->params['action'] == 'timkiem'){?><span style="text-transform: none;">(<?php if($this->Session->check('tukhoa')) echo $this->Session->read('tukhoa');?>)</span><?php }?></h1>
            <?php }?>
        </a>
    </div>
</div>

<div class="ct-tthome">
    <div class="box-ctbar">
        <?php if(!empty($listnews)){?>    
            <?php 
                $dem = 0;
                foreach($listnews as $value){
            ?>
                <div class="box-run-new">
                    <div class="position-relative box-img-new">
                        <a href="<?php echo DOMAIN.$value['Post']['link'];?>.html" title="<?php echo $value['Post']['name'];?>">
                            <img src="<?php echo DOMAIN;?>img/w220/fill!<?php echo $value['Post']['images'];?>" title="<?php echo $value['Post']['name'];?>" alt="<?php echo $value['Post']['name'];?>"/>
                        </a>
                    </div><!--end box-img-new-->
                    <a href="<?php echo DOMAIN.$value['Post']['link'];?>.html" title="<?php echo $value['Post']['name'];?>">
                        <h3><?php echo $value['Post']['name'];?></h3>
                    </a>
                    <div class="shortdes-new"><?php echo shortDesc($value['Post']['shortdes'], 300);?></div>
                    <div class="xemchitiet">
                        <a href="<?php echo DOMAIN.$value['Post']['link'];?>.html" title="<?php echo $value['Post']['name'];?>">
                            Xem chi tiết.
                        </a>    
                    </div>
                    <div class="clear-main"></div>
                </div><!--end box-run-new-->
            <?php $dem ++;}?>
        <?php }else{?>
            <div class="">
                Mục <?php echo $cat['Catproduct']['name']; ?> đang cập nhật bài viết !
            </div>
        <?php }?>
        
        <?php if($this->Paginator->numbers()){?>
            <div class="pagination">
                <?php
                    echo $this->Paginator->first('« Đầu');     
                    echo $this->Paginator->prev('« Trước', null, null, array('class' => 'disabled')); 
                    echo $this->Paginator->numbers(
                        array(
                            'before' => null,
                            'after' => null,
                            
                            'tag' => 'span',
                            'class' => 'number',
                            'modulus' => '6',
                            'separator' => null,
                            'first' => 2,
                            'last' => 2,
                            'ellipsis' => '...',
                            'currentClass' => 'current',
                            'currentTag' => null
                        )
                    );
                    echo $this->Paginator->next('Tiếp »'); 
                    echo $this->Paginator->last('Cuối »'); 
                    echo $this->Paginator->counter('Trang {:page}/{:pages}. Đang xem {:current}/{:count}.');
                ?>
            </div>
        <?php }?>
        <div class="clear-main"></div>
    </div><!--end box-ctbar-->
</div>