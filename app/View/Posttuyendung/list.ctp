<div class="b-bar-home">
    <?php if(isset($cat['Catproduct']['name'])){?>
        <a href="<?php echo DOMAIN.$cat['Catproduct']['link'];?>" title="<?php echo $cat['Catproduct']['name'];?>">
            <h1><?php echo $cat['Catproduct']['name'];?></h1>
        </a>
    <?php }else{?>
        <a href="#" title="<?php echo $title_for_layout;?>">
            <h1><?php echo $title_for_layout;?> <?php if($this->request->params['action'] == 'timkiem'){?><span style="text-transform: none;">(<?php if($this->Session->check('tukhoa')) echo $this->Session->read('tukhoa');?>)</span><?php }?></h1>
        </a>
    <?php }?>
</div><!--end b-bar-home-->

<div class="b-fix-tab">
    <div class="border-content-home">
        <?php if(!empty($listnews)){?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="title-table-tab" style="width: 50px;"><div class="padd-stt">STT</div></th>
                        <th class="title-table-tab">Tiêu đề</th>
                        <th class="title-table-tab" style="width: 90px;">Địa điểm<br/>làm việc</th>
                        <th class="title-table-tab" style="width: 70px;">Mức<br/>lương</th>
                        <th class="title-table-tab" style="width: 80px;">Thời gian<br/>thi tuyển</th>
                        <th class="title-table-tab" style="width: 80px;">Hạn nộp<br/>hồ sơ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($listnews as $value){?>
                    <tr>
                        <td><div class="padd-stt"><?php echo $i;?></div></td>
                        <td><a href="<?php echo DOMAIN.$value['Post']['link'];?>.html" title="<?php echo $value['Post']['name'];?>"><h3><?php echo $value['Post']['name']; ?></h3></a></td>
                        <td><?php echo $value['Post']['diadiem']; ?></td>
                        <td><?php echo $value['Post']['mucluong']; ?></td>
                        <td><?php echo $value['Post']['thoigianthituyen']; ?></td>
                        <td><?php echo $value['Post']['hannophoso']; ?></td>
                    </tr>
                    <?php $i ++;}?>
                </tbody>
            </table>
        <?php }else{?>
            <div class="padding-ct">
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
    </div><!--end border-content-home-->
</div><!--end b-fix-tab-->