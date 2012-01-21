/**
 * @preserve Galleria Classic Theme 2011-08-01
 * http://galleria.aino.se
 *
 * Copyright (c) 2011, Aino
 * Licensed under the MIT license.
 */

/*global jQuery, Galleria */

Galleria.requires(1.25, 'This version of Classic theme requires Galleria 1.2.5 or later');

(function($) {

Galleria.addTheme({
    name: 'classic',
    author: 'Galleria',
    defaults: {
        transition: 'slide',
        thumbCrop:  'height',

        // set this to false if you want to show the caption all the time:
        _toggleInfo: true
    },
    init: function(options) {

        // add some elements
        this.addElement('info-link','info-close');
        this.append({
            'info' : ['info-link','info-close']
        });
        
        //radius corner
        $('#galleria, #ie6 #content, #ie7 #content').append('<div id="ltc" class="galleria-corner"></div><div id="rtc" class="galleria-corner"></div><div id="blc" class="galleria-corner"></div><div id="brc" class="galleria-corner"></div>');
        
        // prev and next arrow
        $('#wrap').append('<div id="prev-slide" class="slide-arrow"><a href="#"></a></div><div id="next-slide" class="slide-arrow"><a href="#"></a></div>');
        var that = this;
        $('#prev-slide').click(function() {that.prev();return false;});
        $('#next-slide').click(function() {that.next();return false;});
        
        this.$('info').append('<div class="galleria-thumbnail-icon"><a href="#"></a></div><div class="galleria-fullscreen"><a href="#"></a></div>');
        
        // fullscreen
        $('.galleria-fullscreen a').toggle(function() {
        	$('.galleria-image').hide();
        	
        	$('#galleria').css('background-position', 'center -1000px');
        	
        	$('#wrap, #galleria, .galleria-container, .galleria-stage').addClass('fullscreen-mode');
        	$('#header').hide();
        	$('.galleria-corner').hide();
        	$('#top-bar').animate({'top': '-31px'});
        	$(this).addClass('fs');        	
        	$('#ie6 .fullscreen .galleria-thumbnails-list, #ie6 .fullscreen .galleria-thumbnails-container').width(($(window).width() - 40));
        	that.enterFullscreen(function() {
        		$('.galleria-image').fadeIn();
        	});
        	//

        }, function() {
        	$('#galleria').css('background-position', 'center top');
        	that.exitFullscreen();
        	$('#wrap, #galleria, .galleria-container, .galleria-stage').removeClass('fullscreen-mode');
        	$('#header').show();
        	$('.galleria-corner').show();
        	$('#top-bar').animate({'top': '0px'}); 
        	$(this).removeClass('fs');       	

			$('#ie6 .galleria-thumbnails-list, #ie6 .galleria-thumbnails-container').width(760);        	
        });
        
        //thumbnail
        
        $('.galleria-thumbnail-icon a').toggle(function() {
        	$(this).addClass('show');
        	$('.galleria-info, .galleria-thumbnails-container').animate({'bottom': '+=40'});
        },function() {
        	$(this).removeClass('show');
        	$('.galleria-info, .galleria-thumbnails-container').animate({'bottom': '-=40'});
        });
        
        //content toggle
        $('#content-toggle').toggle(function() {
        	var that = this;
        	$('#content').show().animate({'top': '80px', 'right': '34px', 'width': '800px', 'height': '531px'}, function() {$('#content #content-inner').show();$(that).addClass('close-content');});        	
        }, function() {
        	$('#content-inner').hide();
        	$(this).removeClass('close-content');
        	$('#content').animate({'top': '45px', 'right': '90px', 'width': '18px', 'height': '20px'}, function() {$('#content').hide();});
        	
        });
        
        // cache some stuff
        var info = this.$('info-link,info-close,info-text'),
            touch = Galleria.TOUCH,
            click = touch ? 'touchstart' : 'click';

        // show loader & counter with opacity
        this.$('loader,counter').show().css('opacity', 1);

        // some stuff for non-touch browsers
        if (! touch ) {
            //this.addIdleState( this.get('image-nav-left'), { left:-50 });
            //this.addIdleState( this.get('image-nav-right'), { right:-50 });
            //this.addIdleState( this.get('counter'), { opacity:0 });
        }

        // toggle info
        /*
        if ( options._toggleInfo === true ) {
            info.bind( click, function() {
                info.toggle();
            });
        } else {
            info.show();
            this.$('info-link, info-close').hide();
        }*/

        // bind some stuff
        this.bind('thumbnail', function(e) {

            if (! touch ) {
                // fade thumbnails
                $(e.thumbTarget).css('opacity', 0.6).parent().hover(function() {
                    $(this).not('.active').children().stop().fadeTo(100, 1);
                }, function() {
                    $(this).not('.active').children().stop().fadeTo(400, 0.6);
                });

                if ( e.index === this.getIndex() ) {
                    $(e.thumbTarget).css('opacity',1);
                }
            } else {
                $(e.thumbTarget).css('opacity', this.getIndex() ? 1 : 0.6);
            }
        });

        this.bind('loadstart', function(e) {
            if (!e.cached) {
                this.$('loader').show().fadeTo(200, 0.4);
            }

            this.$('info').toggle( this.hasInfo() );

            $(e.thumbTarget).css('opacity',1).parent().siblings().children().css('opacity', 0.6);
        });

        this.bind('loadfinish', function(e) {
            this.$('loader').fadeOut(200);
        });
        
        //this.enterFullscreen();
    }
});

}(jQuery));
