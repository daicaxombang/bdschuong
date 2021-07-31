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

<div class="border-content-home padding-ct">
    <div class="box-ctbar">
        <?php if(!empty($listnews)){?>    
            <?php 
                $dem = 0;
                foreach($listnews as $value){
            ?>
                <div class="b-tinhoidap">
                    <div class="nguoidatcauhoi">
                        Người gửi: <span><?php echo $value['Post']['name'];?></span>
                        <div class="clear-main"></div>
                    </div>
                    <div class="cauhoi">
                        <?php echo $value['Post']['content'];?>
                        <div class="clear-main"></div>
                    </div>
                    <div class="cauhoi">
                        Trả lời: <?php echo $value['Post']['traloi'];?>
                        <div class="clear-main"></div>
                    </div>
                    <div class="clear-main"></div>
                </div>
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

        <div class="b-datcauhoi">
            <?php echo $this->Session->flash(); ?>
            <form method="post" action="<?php echo DOMAIN;?>dat-cau-hoi">
                <fieldset>
                    <legend>Đặt câu hỏi</legend>
                    <label>Tên của bạn</label>
                    <input type="text" name="name" class="span8" placeholder="Tên của bạn" required="" />
                    <label>Email</label>
                    <input type="email" name="email" class="span8" placeholder="Email" required="" />
                    <label>Điện thoại</label>
                    <input type="text" name="phone" class="span8" placeholder="Điện thoại" required="" />
                    <label>Nội dung</label>
                    <textarea name="content" class="span12" placeholder="Nội dung" rows="6"></textarea>

                    <div class="row-fluid">
                        <div class="span1"><div style="margin: 4px 0 0 0;">Captcha</div></div>
                        <div class="span9">
                            <input type="text" name="captcha" class="span2" placeholder="captcha" required="" required=""/><img id="img_CAPTCHA_RESULT_send" style="width: 88px;" src="<?php echo DOMAIN;?>captcha" alt="" noloaderror="1" /><img id="reloadCaptcha" class="reloadCapcha" onmouseover="this.style.cursor='pointer'" onclick="img_reload();" title="Đổi mã an toàn" alt="renew capcha" src="<?php echo DOMAIN;?>images/icon-reload.png" />
                        </div>
                    </div>
                    <script type="text/javascript">
                        function img_reload(){
                            document.getElementById("img_CAPTCHA_RESULT_send").src = document.getElementById("img_CAPTCHA_RESULT_send").src.split("?")[0] + "?"+Math.random();;
                        }
                    </script> 
                    <div style="height: 10px;"></div>
                    

                    <div class="clear-main"></div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>
        </div>

    </div><!--end box-ctbar-->
</div>