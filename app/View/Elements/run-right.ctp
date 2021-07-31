<style type="text/css">
    .fix-icon-right{
        position: fixed;
        right: 10px;
        bottom: 35px;
        display: none;
        z-index: 9999999;
    }
    .fix-icon-right img{
        margin-bottom: 5px;
    }
</style>

<div class="fix-icon-right" id="fixedmenu">
    <div class="row-fluid">
        <ul class="unstyled">
            <li>
                <a href="" title="Top"><img src="<?php echo DOMAIN;?>images/gotop.gif" class="scrollup" alt="Top" title="Top"/></a>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(document).scroll(function(){
        var curPos = $(document).scrollTop();
        if(curPos >= 350) {
            $('#fixedmenu').show(10);
        } else {
            $('#fixedmenu').hide(10);
        }
    });
    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
</script>