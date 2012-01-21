jQuery(document).ready(function($) {
    $('.home article a.permalink').hover(function() {
        $(this).find('.entry-overlay').animate({'top':'0px'});
    }, function() {
        $(this).find('.entry-overlay').animate({'top': '-119px'});
    });    
});

