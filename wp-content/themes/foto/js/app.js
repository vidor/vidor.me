

jQuery(document).ready(function($) {
    
/************************************************
*     .home image hover
*************************************************/

    $('body.home').on('mouseenter', '.home article a.post-link', function() {
    	if( $(document).width() > 600 )
         //$(this).stop().animate({boxShadow: '0px 0px 10px #52BAE1', borderLeftColor: '#52BAE1', borderRightColor: '#52BAE1', borderBottomColor: '#52BAE1', borderTopColor: '#52BAE1'});
		 $(this).find('.entry-content').show();
    });
    
    $('body.home').on('mouseleave', '.home article a.post-link', function() {
        if( $(document).width() > 600 )
            //$(this).stop().animate({boxShadow: '0 0 0 #52BAE1', borderLeftColor: '#ccc', borderRightColor: '#ccc', borderBottomColor: '#ccc', borderTopColor: '#ccc'});
			$(this).find('.entry-content').hide();
	});
 
    
/************************************************
*     .single image viewer
*************************************************/



});
