jQuery(document).ready(function($) {
    
    /************************************************
    *     home image hover
    *************************************************/
    sleep = 0;
    $('body.home').on('mouseenter', '.home article a.permalink', function() {
        that = this; sleep = 1;
        setTimeout(function() {
            if( sleep ) $(that).find('.entry-overlay').animate({'top':'0px'});
        }, 300);
        
    });
    $('body.home').on('mouseleave', '.home article a.permalink', function() {
        sleep = 0;
        $(this).find('.entry-overlay').animate({'top':'-119px'});
    });
    /************************************************
    *     single image gallery hover
    *************************************************/
    
    sleep2 = 0;
    $('body.single').on('mouseenter', '.entry-gallery-image', function() {
        that = this, sleep2 = 1;
        setTimeout(function() {
            if( sleep2 ) $(that).find('.entry-gallery-image-title').animate({'bottom': '0px'});
        }, 300);
        
    });
    $('body.single').on('mouseleave', '.entry-gallery-image', function() {
        sleep2 = 0;
        $(this).find('.entry-gallery-image-title').animate({'bottom': '-119px'});
    }); 

});


