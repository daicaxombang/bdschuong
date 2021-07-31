function goToByScroll(id){
    if($("#"+id).length) {
    	$('html,body').animate({scrollTop: $("#"+id).offset().top-40},'slow');
    }
}