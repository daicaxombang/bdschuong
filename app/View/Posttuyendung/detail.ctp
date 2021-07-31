<div class="b-bar-home uppercase">
    <h1><?php echo $detailNews['Post']['name']?></h1>
</div><!--end b-bar-home-->

<div class="border-content-home padding-ct">
    <div class="box-detail-new">
        <div class="box-like-share">
            <div class="fb-like" data-href="<?php echo DOMAIN.$detailNews['Post']['link'];?>.htm" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            
        </div><!--end box-like-share-->
        <div class="ct-tt">
            <?php echo $detailNews['Post']['content'];?>
            <div class="clear-main"></div>
        </div><!--end ct-tt-->
        <div class="time-date">
            <?php echo date('h:i:s', strtotime($detailNews['Post']['created']));?>&nbsp;&nbsp;
            <span><?php echo date('d/m/Y', strtotime($detailNews['Post']['created']));?></span>
        </div><!--end time-date--><div class="clear-content"></div>
        <div class="box-like-share">
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            <g:plusone></g:plusone> 
        </div><!--end box-like-share-->
    </div><!--end box-new-detail-->
</div>

<div class="b-bar-home uppercase">
    <h1>Tin liên quan</h1>
</div><!--end b-bar-home-->

<div class="b-fix-tab">
    <div class="border-content-home">
        <?php if(!empty($tinlienquan)){?>
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
                    <?php $i = 1; foreach($tinlienquan as $value){?>
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
            <div class="ct-tt padding-no-new">
                Đang cập nhật bài viết !
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